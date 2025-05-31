<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProviderDetail;
use App\Models\Country;
use App\Models\Category;
use Carbon\Carbon;

class ListingController extends Controller
{
 public function index(Request $request)
{
    $countries = Country::all();
    $categories = Category::all();
    $today = Carbon::today(); // Current date

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
        }  // only fecth perticuler subservices
    ])
    ->whereHas('portServiceDetails', function ($q) use ($request) {
        $q->where('country_id', $request->country)
          ->where('port_id', $request->ports_services)
          ->where('category_id', $request->service_type);
        //  ->whereJsonContains('sub_services', (string) $request->sub_service_type);
    })
    ->whereHas('user.subscriptions', function ($q) use ($today) {
        $q->whereDate('end_date', '>=', $today) // Only non-expired
         ->where('plan_id', '!=', 1);  // Exclude users with plan_id = 1
    })
    ->whereHas('companyDetail')
    ->whereHas('contactDetail')
    ->whereHas('socialMediaDetails');

    
    // === Separate Listing (only plan_id = 1) ===
    $plan1Providers = $this->getPlan1Providers($request);

    $products = $query->paginate(15)->appends($request->all());
   // dd($products);
    // if ($request->ajax()) {
    //     return view('partials.product_item', compact('products'))->render();
    // }

    return view('product_listing', compact('products','plan1Providers' ,'countries', 'categories'));
}

    private function getPlan1Providers(Request $request)
    {
        $today = Carbon::today();

        return ServiceProviderDetail::with([
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
        ->whereHas('portServiceDetails', function ($q) use ($request) {
            $q->where('country_id', $request->country)
            ->where('port_id', $request->ports_services)
            ->where('category_id', $request->service_type)
            ->whereJsonContains('sub_services', (string) $request->sub_service_type);
        })
        ->whereHas('user.subscriptions', function ($q) use ($today) {
        $q->whereDate('end_date', '>=', $today)
          ->where('plan_id', 1);
        })
        ->whereHas('companyDetail')
        ->whereHas('contactDetail')
        ->whereHas('socialMediaDetails')
        ->get();
    }



    public function detail(){
    
    }
}
