<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Category;
use App\Models\Blog;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $blogs = Blog::where('status', 'published')
                 ->latest()
                 ->take(10)
                 ->get();

        // Filter only the 5 categories by name
        $selectedCategories = Category::whereIn('name', [
            'Survey & Inspection',
            'Ship Services, Repairs and Maintenance',
            'Supplies & Chandlery & Spares',
            'Management & Operations',
            'Port & Marine Services'
        ])
        ->withCount('portServiceDetails') // relationship with category model
        ->orderBy('name')
        ->get();  
        
        // Get Top Rated Service Providers (only users with 'service_provider' type)
        $topProviders = User::where('user_type', 'service_provider')
        ->with([
            'reviews', // For count & avg
            'serviceProviderDetail'
        ])
        ->withCount('reviews')
        ->withAvg('reviews', 'rating')
        ->orderByDesc('reviews_avg_rating')
        ->orderByDesc('reviews_count')
        ->take(10)
        ->get();

        return view('index',compact('countries','categories','blogs','selectedCategories','topProviders'));
    }
}
