<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceProviderDetail;
use App\Models\Plan;
use Carbon\Carbon;
use App\Models\Subscription;
use App\Models\ContactClick;
use App\Models\User;


class UserListController extends Controller
{
    // public function index(Request $request)
    // {
    //     $planId = $request->input('plan');
    //     $today = Carbon::today(); // Current date

    //     // Fetch service providers that match the given plan_id
    //     $query = ServiceProviderDetail::with([
    //         'companyDetail',
    //         'contactDetail',
    //         'portServiceDetails',   
    //         'socialMediaDetails',
    //         'user.subscriptions' // Include user and subscriptions for efficiency
    //     ])
    //     ->whereHas('companyDetail')
    //     ->whereHas('contactDetail')
    //     ->whereHas('socialMediaDetails');

    //     // Filter by plan if provided
    //     if(!empty($planId)){
    //        $query->whereHas('subscriptions', function ($q) use ($planId, $today) {
    //             $q->where('plan_id', $planId)
    //             ->whereDate('end_date', '>=', $today); // Only non-expired
    //         });
    //     }else{
    //         // Only apply end_date check if no specific plan is selected
    //         $query->whereHas('subscriptions', function($q) use ($today){
    //             $q->whereDate('end_date', '>=', $today);
    //         });
    //     }
        
    //      // Fetch providers
    //     $providers = $query->get()
    //     ->sortByDesc(function ($provider) use ($planId, $today) {
    //         // Sort by subscription created_at
    //         return $planId
    //             ? optional($provider->user->getActiveSubscriptionForPlan($planId))->created_at
    //             : optional($provider->user->subscriptions()->whereDate('end_date', '>=', $today)->latest()->first())->created_at;
    //     })
    //     ->values(); // Reset keys after desc sorting

    //     // Attach the active subscription (filtered in model method)
    //     foreach ($providers as $provider) {
    //         $provider->active_subscription = $planId
    //     ? $provider->user->getActiveSubscriptionForPlan($planId)
    //     : $provider->user->subscriptions()->whereDate('end_date', '>=', $today)->latest()->first(); // fallback
    //     }
    //     // Get the selected plan name
    //     $plan = !empty($planId) ? Plan::find($planId) :null;

    //     return view('admin.users.index', compact('providers', 'planId', 'plan'));
    // }

    public function index(Request $request)
    {
        $planId = $request->input('plan');
        $today = Carbon::today(); // Current date

        // Base query: only those providers who have related details and at least one subscription
        $query = ServiceProviderDetail::with([
            'companyDetail',
            'contactDetail',
            'portServiceDetails',
            'socialMediaDetails',
            'user.subscriptions'
        ])
        ->whereHas('companyDetail')
        ->whereHas('contactDetail')
        ->whereHas('socialMediaDetails')
        ->whereHas('user.subscriptions', function($q) use ($planId) {
            if (!empty($planId)) {
                $q->where('plan_id', $planId);
            }
        });

        // Get all providers
        $providers = $query->get()
            ->sortByDesc(function ($provider) use ($planId) {
                return $planId
                    ? optional($provider->user->getLatestSubscriptionForPlan($planId))->created_at
                    : optional($provider->user->subscriptions()->latest()->first())->created_at;
            })
            ->values(); // Reset keys

        // Attach subscription status (active or expired)
        foreach ($providers as $provider) {
            $subscription = $planId
                ? $provider->user->getLatestSubscriptionForPlan($planId)
                : $provider->user->subscriptions()->latest()->first();

            $provider->active_subscription = $subscription;
            $provider->subscription_status = $subscription && $subscription->end_date >= $today
                ? 'active'
                : 'expired';
        }

        $plan = !empty($planId) ? Plan::find($planId) : null;

        return view('admin.users.index', compact('providers', 'planId', 'plan'));
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

        // fecth click counts grouped by type
        $clickCounts = ContactClick::where('subscription_id', $subscriptionId)
           ->select('click_type', \DB::raw('count(*) as total'))
           ->groupBy('click_type')
           ->pluck('total', 'click_type')
           ->toArray();

        return view('admin.users.detail', compact('provider', 'subscription', 'clickCounts'));
    }

    public function getClients()
    {
        // Fetch users where user_type is 'client'
        $clients = User::where('user_type','client')->latest()->get();
        return view('admin.users.client', compact('clients'));
    }
}
