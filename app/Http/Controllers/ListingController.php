<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ServiceProviderDetail;
use App\Models\Country;
use App\Models\Category;
use App\Models\Subscription;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::all();
        $categories = Category::all();
        $today = Carbon::today(); // Current date

        $hasFilters = $request->filled(['country', 'ports_services', 'service_type', 'sub_service_type']);

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
            $q->where('country_id', $request->country)
              ->where('port_id', $request->ports_services)
              ->where('category_id', $request->service_type);
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
            $query->whereHas('portServiceDetails', function ($q) use ($request) {
                $q->where('country_id', $request->country)
                ->where('port_id', $request->ports_services)
                ->where('category_id', $request->service_type)
                ->whereJsonContains('sub_services', (string) $request->sub_service_type);
            });
            return $query->get();    // return all matching filtered results
        } else {
            
            return $query->latest()->take(15)->get(); // return latest 15 if no filters
        }
    }

    public function detail($subscriptionId)
    {
        $subscription = Subscription::with('user', 'plan')->findOrFail($subscriptionId);

        $provider = ServiceProviderDetail::with([
            'companyDetail',
            'contactDetail',
            'portServiceDetails.country',
            'portServiceDetails.port',
            'portServiceDetails.category',
            'socialMediaDetails'
        ])->where('user_id', $subscription->user_id)->firstOrFail();

        return view('detail', compact('provider', 'subscription'));
    }
}
