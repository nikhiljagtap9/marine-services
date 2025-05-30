<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProviderDetail;
use App\Models\Country;
use App\Models\Category;

class ListingController extends Controller
{
 public function index(Request $request)
{
    $countries = Country::all();
    $categories = Category::all();

    $query = ServiceProviderDetail::with([
        'companyDetail',
        'contactDetail',
        'portServiceDetails',
        'socialMediaDetails',
    ])
    ->whereHas('portServiceDetails', function ($q) use ($request) {
        $q->where('country_id', $request->country)
          ->where('port_id', $request->ports_services)
          ->where('category_id', $request->service_type)
          ->whereJsonContains('sub_services', (string) $request->sub_service_type);
    })
    ->whereHas('companyDetail')
    ->whereHas('contactDetail')
    ->whereHas('socialMediaDetails')

    // Exclude users with plan_id = 1
    ->whereHas('subscriptions', function ($q) {
        $q->where('plan_id', '!=', 1);
    });

    // === Separate Listing (only plan_id = 1) ===
    $plan1Providers = $this->getPlan1Providers($request);

    $products = $query->paginate(15)->appends($request->all());

    // if ($request->ajax()) {
    //     return view('partials.product_item', compact('products'))->render();
    // }

    return view('product_listing', compact('products','plan1Providers' ,'countries', 'categories'));
}

    private function getPlan1Providers(Request $request)
    {
        return ServiceProviderDetail::with([
            'companyDetail',
            'contactDetail',
            'portServiceDetails',
            'socialMediaDetails',
        ])
        ->whereHas('portServiceDetails', function ($q) use ($request) {
            $q->where('country_id', $request->country)
            ->where('port_id', $request->ports_services)
            ->where('category_id', $request->service_type)
            ->whereJsonContains('sub_services', (string) $request->sub_service_type);
        })
        ->whereHas('companyDetail')
        ->whereHas('contactDetail')
        ->whereHas('socialMediaDetails')
        ->whereHas('user.subscriptions', function ($q) {
            $q->where('plan_id', '=', 1);
        })
        ->paginate(10)
        ->appends($request->all());
    }



    public function detail(){
        
    }
}
