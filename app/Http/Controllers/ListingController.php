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
        ]);

        // Apply filters if available
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        if ($request->filled('port')) {
            $query->where('port_id', $request->port);
        }

        if ($request->filled('service_type')) {
            $query->where('service_type', $request->service_type);
        }

        if ($request->filled('sub_service_type')) {
            $query->where('sub_service_type', $request->sub_service_type);
        }

        // Optional Rating Filter
        // if ($request->filled('rating')) {
        //     $query->where('rating', '>=', $request->rating);
        // }

        // Paginate results
        $products = $query->paginate(10)->appends($request->all());

        return view('product_listing', compact('products','countries','categories'));
    }
}
