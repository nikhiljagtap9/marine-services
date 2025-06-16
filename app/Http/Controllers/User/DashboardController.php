<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Quote;
use App\Models\Category;
use App\Models\ServiceReview;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Check if the logged-in user is a service provider
        if ($user && $user->user_type === 'client') {
            
            // Get additional user details
           // $user = User::where('user_id', $user->id)->first();

           // Total quote requests
            $totalQuotes = Quote::where('requested_by', $user->id)->count();

            // Total Review
            $totalReview = ServiceReview::where('user_id', $user->id)->count();

            $quotes = Quote::where('requested_by', $user->id)
                        ->latest()
                        ->get();

            // Fetch all category IDs used in these quotes
            $allCategoryIds = $quotes->pluck('category_id')->flatten()->unique()->toArray();

            // Fetch category names by IDs
            $categories = Category::whereIn('id', $allCategoryIds)->pluck('name', 'id');

            return view('user.dashboard.index', compact('user','totalQuotes','totalReview','quotes', 'categories'));
        }

        // Not a service provider
        abort(403, 'Unauthorized access');
    }

}
