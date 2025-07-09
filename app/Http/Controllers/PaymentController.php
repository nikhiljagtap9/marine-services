<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\IyzicoService;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\CheckoutFormInitialize;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;
use Iyzipay\Model\CheckoutForm;
use Iyzipay\Request\RetrieveCheckoutFormRequest;
use Iyzipay\Model\Address;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentSuccess;
use App\Mail\PaymentFailed;


class PaymentController extends Controller
{
    public function redirectToIyzico(Request $request)
    {
        // Optional: Validate incoming request
        $request->validate([
            'product_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'category' => 'required|string|max:255',
        ]);
        $planId = decrypt($request->plan_id);
        $user = auth()->user();
        $payload = Crypt::encrypt([
            'user_id' => $user->id,
            'plan_id' => $planId,
        ]);
        
        $options = IyzicoService::getOptions();

        $price = number_format($request->amount, 2, '.', '');
        
        $service_provider = \App\Models\ServiceProviderDetail::with('cityRelation')
                            ->where('user_id', auth()->id())
                            ->first();
        
        if($service_provider->countryRelation->name == 'Turkey') {
            $price = $price + ($price * 0.2);
        }
        $price = '0.01';
        $iyzicoRequest = new CreateCheckoutFormInitializeRequest();
        $iyzicoRequest->setLocale(Locale::EN);
        $iyzicoRequest->setConversationId('user_' . $user->id); // Dynamic ID
        $iyzicoRequest->setPrice($price);
        $iyzicoRequest->setPaidPrice($price);
        $iyzicoRequest->setCurrency(Currency::TL);
        $iyzicoRequest->setPaymentGroup(PaymentGroup::SUBSCRIPTION);
        $iyzicoRequest->setCallbackUrl(route('iyzico.callback',  ['payload' => $payload]));

        $buyer = new Buyer();
        $buyer->setId($user->id ?? 'guest_' . time());
        $buyer->setName($user->name);
        $buyer->setSurname('TestLastName+'); // Optional: Split name if needed
        $buyer->setEmail($user->email);
        $buyer->setIdentityNumber("fail-test");
        $buyer->setGsmNumber("+91".$user->phone);
        $buyer->setRegistrationAddress("Online Subscription");
        $buyer->setIp($request->ip());
        $buyer->setCity($service_provider->cityRelation->name);
        $buyer->setCountry($service_provider->countryRelation->name);
        $iyzicoRequest->setBuyer($buyer);

         // REQUIRED even for virtual: Billing address
        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName($buyer->getName() . ' ' . $buyer->getSurname());
        $billingAddress->setCity($service_provider->cityRelation->name);
        $billingAddress->setCountry($service_provider->countryRelation->name);
        $billingAddress->setAddress("Billing Address for Subscription");
        //$billingAddress->setZipCode("34000");
        $iyzicoRequest->setBillingAddress($billingAddress);

        // Basket Item (virtual product)
        $basketItem = new BasketItem();
        $basketItem->setId("BASKET_" . uniqid());
        $basketItem->setName($request->product_name);
        $basketItem->setCategory1($request->category);
        $basketItem->setItemType(BasketItemType::VIRTUAL); // virtual product
        $basketItem->setPrice($price);
        $iyzicoRequest->setBasketItems([$basketItem]);

        $checkoutForm = CheckoutFormInitialize::create($iyzicoRequest, $options);
        Log::info('Conversation ID sent to Iyzico: ' . $iyzicoRequest->getConversationId());

        if ($checkoutForm->getStatus() === 'success') {
            return redirect()->away($checkoutForm->getPaymentPageUrl());
        }

        return redirect()->back()->with('error', $checkoutForm->getErrorMessage());
    }

    public function handleCallback(Request $request, $payload)
    {
        $token = $request->input('token');
        $options = IyzicoService::getOptions();

        $data = Crypt::decrypt($payload);
        $userId = $data['user_id'];
        $planId = $data['plan_id'];

        Auth::loginUsingId($userId);

        $retrieveRequest = new RetrieveCheckoutFormRequest();
        $retrieveRequest->setToken($token);

        $checkoutForm = CheckoutForm::retrieve($retrieveRequest, $options);
        Log::info('Retrieved CheckoutForm: ' . $checkoutForm->getRawResult());
       
        // echo auth()->user()->id;
        // echo '  ------------------ ';
        Log::info([
            'token' => $request->token,
            'checkout_response' => $checkoutForm->getRawResult(),
            'conversationId' => $checkoutForm->getConversationId(),
        ]);

         $payment = $this->storePayment($checkoutForm);
         $paymentId = $checkoutForm->getPaymentId(); 
           
        if ($checkoutForm->getPaymentStatus() === 'SUCCESS') {

            $activeSubscription = Subscription::where('user_id', $userId)
            ->where('plan_id', $planId)
            ->where('end_date', '>', Carbon::now())
            ->latest('created_at')
            ->first();

            $startDate = Carbon::now();
            $octFirst = Carbon::create($startDate->year, 10, 1);

            // Calculate end date
            if ($planId == 2 && $startDate->lt($octFirst)) {
                $endDate = $octFirst;
            } else {
                $endDate = $startDate->copy()->addYear();
            }

           if ($activeSubscription) {
                // Update existing active subscription
                $activeSubscription->update([
                    'payment_id' => $payment->id,
                    'start_date' => $startDate,
                    'end_date'   => $endDate,
                ]);
                $subscriptionId = $activeSubscription->id;
            } else {
                // Create new subscription
                $newSubscription = Subscription::create([
                    'user_id'    => $userId,
                    'plan_id'    => $planId,
                    'payment_id' => $payment->id,
                    'start_date' => $startDate,
                    'end_date'   => $endDate,
                ]);
                $subscriptionId = $newSubscription->id;
            }

            // Send success email
            Mail::to(auth()->user()->email)->send(new PaymentSuccess($payment, $newSubscription ?? $activeSubscription));           
            
            return redirect()->route('thankyou.page', $paymentId);
        } else {
            // Send failed email
            Mail::to(auth()->user()->email)->send(new PaymentFailed($payment));

            return redirect()->route('payment.failed.page', $paymentId);
        }
        
    }
    public function storePayment($checkoutForm) // or whatever method you're using
    {
        return Payment::create([
            'user_id'           => auth()->user()->id,
            'payment_id'        => $checkoutForm->getPaymentId(),
            'status'            => $checkoutForm->getPaymentStatus(),
            'paid_price'        => $checkoutForm->getPaidPrice(),
            'price'             => $checkoutForm->getPrice(),
            'currency'          => $checkoutForm->getCurrency(),
            'card_type'         => $checkoutForm->getCardType(),
            'card_association'  => $checkoutForm->getCardAssociation(),
            'card_family'       => $checkoutForm->getCardFamily(),
            'bin_number'        => $checkoutForm->getBinNumber(),
            'last_four_digits'  => $checkoutForm->getLastFourDigits(),
            'payment_token'     => $checkoutForm->getToken(),
            'callback_url'      => $checkoutForm->getCallbackUrl(),
            'auth_code'         => $checkoutForm->getAuthCode(),
            'raw_response'      => $checkoutForm->getRawResult(), // optional full JSON
        ]);
    }

    public function showSuccess($payment_id)
    {
        $payment = Payment::where('payment_id', $payment_id)->firstOrFail();

        return view('thankyou', compact('payment'));
    }

    public function showFailure($payment_id)
    {
        $payment = Payment::where('payment_id', $payment_id)->firstOrFail();

        return view('paymentfailed', compact('payment'));
    }

    public function listPayments()
    {
         $payments = Payment::with(['user', 'plan'])
        ->orderByDesc('created_at')
        ->get();

        return view('admin.payments.index', compact('payments'));
    }


}
