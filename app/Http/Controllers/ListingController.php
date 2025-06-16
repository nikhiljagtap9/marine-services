<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ServiceProviderDetail;
use App\Models\Country;
use App\Models\Category;
use App\Models\Subscription;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Crypt;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $today = Carbon::today(); // Current date

        // this is compulsory fields for search engine
        $hasFilters = $request->filled(['country', 'ports_services']);

        $query = ServiceProviderDetail::with([
            'companyDetail',
            'contactDetail',
        //  'portServiceDetails',
            'socialMediaDetails',
            'user.subscriptions.plan',
            'portServiceDetails' => function ($q) use ($request) {
                // Always eager load portServiceDetails
                $q->when($request->sub_service_type, function ($q2) use ($request) {
                    $q2->whereJsonContains('sub_services', (string) $request->sub_service_type);
                });
            },  // only fecth perticuler subservices
            'portServiceDetails.port',
            'portServiceDetails.country',
            'portServiceDetails.category'
        ])
        ->whereHas('user.subscriptions', function ($q) use ($today) {
            $q->whereDate('end_date', '>=', $today) // Only non-expired
            ->where('plan_id', '!=', 1);  // Exclude users with plan_id = 1
        })
        ->whereHas('companyDetail')
        ->whereHas('contactDetail')
        ->whereHas('socialMediaDetails');

        if ($hasFilters) {
            $query->whereHas('portServiceDetails', function ($q) use ($request) {
                if ($request->filled('country')) {
                    $q->where('country_id', $request->country);
                }

                if ($request->filled('ports_services')) {
                    $q->where('port_id', $request->ports_services);
                }

                if ($request->filled('service_type')) {
                    $q->where('category_id', $request->service_type);
                }

                if ($request->filled('sub_service_type')) {
                    $q->whereJsonContains('sub_services', (string) $request->sub_service_type);
                }
            });
        } else {
            $query->orderByDesc('id'); // Or use 'created_at' if needed
        }

        
        // === Separate Listing (only plan_id = 1) ===
        $plan1Providers = $this->getPlan1Providers($request,$hasFilters);

        $products = $query->paginate(15)->appends($request->all());

        foreach ($products as $product) {
            if ($product->user) {
                $product->active_subscription = $product->user->getActiveSubscription(); // Not filtering by plan
            }
        }
     //dd($products);
        // if ($request->ajax()) {
        //     return view('partials.product_item', compact('products'))->render();
        // }

        return view('product_listing', compact('products','plan1Providers' ,'countries', 'categories'));
    }

    private function getPlan1Providers(Request $request,$hasFilters)
    {
        $today = Carbon::today();

        $query = ServiceProviderDetail::with([
            'companyDetail',
            'contactDetail',
            'portServiceDetails',
            'socialMediaDetails',
            'user.subscriptions.plan',
            // 'portServiceDetails' => function ($q) use ($request) {
            //     // Always eager load portServiceDetails
            //     $q->when($request->sub_service_type, function ($q2) use ($request) {
            //         $q2->whereJsonContains('sub_services', (string) $request->sub_service_type);
            //     });
            // } // only fecth perticuler subservices
        ])
        ->whereHas('user.subscriptions', function ($q) use ($today) {
        $q->whereDate('end_date', '>=', $today)
            ->where('plan_id', 1);
        })  
        ->whereHas('companyDetail')
        ->whereHas('contactDetail')
        ->whereHas('socialMediaDetails');
        
        // Apply filters if any
        if ($hasFilters) {     
            // $query->whereHas('portServiceDetails', function ($q) use ($request) {
            //     $q->where('country_id', $request->country)
            //     ->where('port_id', $request->ports_services)
            //     ->where('category_id', $request->service_type)
            //     ->whereJsonContains('sub_services', (string) $request->sub_service_type);
            // });
            $query->whereHas('portServiceDetails', function ($q) use ($request) {
                    if ($request->filled('country')) {
                        $q->where('country_id', $request->country);
                    }

                    if ($request->filled('ports_services')) {
                        $q->where('port_id', $request->ports_services);
                    }

                    if ($request->filled('service_type')) {
                        $q->where('category_id', $request->service_type);
                    }

                    if ($request->filled('sub_service_type')) {
                        $q->whereJsonContains('sub_services', (string) $request->sub_service_type);
                    }
            });
            return $query->get();    // return all matching filtered results
        } else {
            
            return $query->latest()->take(15)->get(); // return latest 15 if no filters
        }
    }

    public function detail($subscriptionId)
    {
        $subscription = Subscription::with('user', 'plan')->findOrFail($subscriptionId);

        // encrypt the user ID in the QR code 
        $encryptedUserId = Crypt::encrypt($subscription->user_id);

        $provider = ServiceProviderDetail::with([
            'companyDetail',
            'contactDetail',
            'portServiceDetails.country',
            'portServiceDetails.port',
            'portServiceDetails.category',
            'socialMediaDetails'
        ])->where('user_id', $subscription->user_id)->firstOrFail();

        return view('detail', compact('provider', 'subscription','encryptedUserId'));
    }

    public function enquiryStore(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'your_name' => 'required|string|max:255',
            'email' => 'required|email',
            'comment' => 'required|string',
            'photo' => 'nullable|image|max:1024',
            'subscription_id' => 'required|exists:subscriptions,id',
            'service_user_id' => 'required|exists:users,id',
        ]);

        $photoPath = $request->file('photo')?->store('uploads/enquiries', 'public');

        Enquiry::create([
            'service_user_id' => $request->service_user_id,
            'subscription_id' => $request->subscription_id,
            'company_name' => $request->company_name,
            'your_name' => $request->your_name,
            'email' => $request->email,
            'comment' => $request->comment,
            'photo' => $photoPath,
        ]);

        return redirect()->back()->with('success', 'Enquiry submitted successfully.')->withFragment('enquiryForm');
    }
}
