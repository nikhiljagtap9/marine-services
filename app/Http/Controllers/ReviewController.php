<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Port;
use App\Models\Category;
use App\Models\ServiceReview;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceReviewSubmitted;

class ReviewController extends Controller
{
    // Show review form
    public function showForm($encryptedId,$subscriptionId)
    {
        // Check if user is logged in
        // if (!Auth::check()) {
        //     $redirectUrl = url()->full(); // current page URL (encrypted ID included)
        //     return redirect()->route('login', ['redirect' => $redirectUrl]);
        // }
        
        try {
            $id = Crypt::decrypt($encryptedId); // decrypt the ID
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(403, 'Invalid or tampered link.');
        }
        $provider = User::with('serviceProviderDetail')
                    ->where('id', $id)
                    ->where('user_type', 'service_provider')
                    ->firstOrFail();
        $ports = Port::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('review', compact('provider','subscriptionId','ports','categories'));
    }

    // Save review form
    public function storeReview(Request $request, $id)
    {
        $validated = $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
            'vessel_company_name' => 'required|string|max:255',
            'vessel_company_email' => 'required|email',
            'port_id' => 'required|exists:ports,id',
            'service_date' => 'required|date',
            'service_category_id' => 'required|exists:categories,id',
            'invoice_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:1024',
            'comment' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5',
        ],[
            'vessel_company_name.required' => 'Please enter the vessel or company name.',
            'vessel_company_email.required' => 'Please enter a valid email address.',
            'port_id.required' => 'Please select a port.',
            'port_id.exists' => 'The selected port is invalid.',
            'service_date.required' => 'Please provide the date of service.',
            'service_date.date' => 'The service date must be a valid date.',
            'service_category_id.required' => 'Please select the type of service received.',
            'service_category_id.exists' => 'The selected service category is invalid.',
        ]);
        

        $path = null;
        if ($request->hasFile('invoice_document')) {
            $path = $request->file('invoice_document')->store('rating_doc', 'public');
        }
       // $user = Auth::user();
        
        $review = ServiceReview::with(['port', 'category'])->create([
          //  'user_id' => $user->id, // rating submit user id
            'service_provider_id' => $id, // service provider user id
            'subscription_id' =>  $request->subscription_id,
            'vessel_company_name'    => $request->vessel_company_name,
            'vessel_company_email'   => $request->vessel_company_email,
            'port_id' => $request->port_id,
            'service_date' => $request->service_date,
            'service_category_id' => $request->service_category_id,
            'invoice_document' => $path,
            'rating'  => $request->rating,
            'comment' => $request->comment,
        ]);

        // Send email to service provider
        $provider = User::find($id);
        if ($provider && $provider->email) {
          //  Mail::to($provider->email)->send(new ServiceReviewSubmitted($review));
            Mail::to('niksjagtap9@gmail.com')->send(new ServiceReviewSubmitted($review));
            
        }

        return back()->with('success', 'Thank you for your review!');
    }

    // get review By Service user
    public function reviewByServiceUser(){
        $user = Auth::user();

        $provider = User::with('serviceProviderDetail')->findOrFail($user->id);

        $reviews = ServiceReview::where('service_provider_id', $user->id)
                   // ->with(['port', 'category']) // Optional: if you need related data
                    ->latest()
                    ->get();

        return view('service-provider.dashboard.review', compact('provider', 'reviews'));
    }

    // get review By user
    public function reviewByUser(){
        $user = Auth::user();

        // Get the service provider(s) that the user has reviewed
        $providerIds = ServiceReview::where('user_id', $user->id)
                    ->pluck('service_provider_id')
                    ->unique();

        $providers = User::with('serviceProviderDetail')
                    ->whereIn('id', $providerIds)
                    ->where('user_type', 'service_provider')
                    ->get();

        $reviews = ServiceReview::where('user_id', $user->id)
                    ->latest()
                    ->get();

        return view('user.dashboard.review', compact('providers', 'reviews'));
    }

}
