<?php
// app/Http/Controllers/FavouriteController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favourite;
use App\Models\Subscription;
use App\Models\ServiceProviderDetail;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function toggle(Request $request)
    {
        $user = Auth::user();

        if (!$user || $user->user_type !== 'client') {
            return response()->json(['status' => 'error', 'message' => 'Only clients can save listings.'], 403);
        }

        $subscriptionId = $request->input('subscription_id');

        $existing = Favourite::where('user_id', $user->id)->where('subscription_id', $subscriptionId)->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['status' => 'removed']);
        } else {
            Favourite::create([
                'user_id' => $user->id,
                'subscription_id' => $subscriptionId,
            ]);
            return response()->json(['status' => 'added']);
        }
    }

    public function favouriteByUser()
    {
        $user = Auth::user();

        // Fetch all favourites for this user, with subscriptions and reviews
        $whishlist = Favourite::with([
            'subscription' => function ($query) {
                $query->with(['user', 'plan', 'serviceReviews']);
            }
        ])
        ->where('user_id', $user->id)
        ->latest()
        ->paginate(5); // Change 5 to however many items per page

        // Get all provider details indexed by user_id
        $providerDetails = ServiceProviderDetail::with([
            'companyDetail',
            'contactDetail',
            'portServiceDetails.country',
            'portServiceDetails.port',
            'portServiceDetails.category',
            'socialMediaDetails',
        ])
        ->whereIn('user_id', $whishlist->pluck('subscription.user_id')->filter()->unique())
        ->get()
        ->keyBy('user_id');

        return view('user.dashboard.whishlist', compact('whishlist', 'providerDetails'));
    }

}
