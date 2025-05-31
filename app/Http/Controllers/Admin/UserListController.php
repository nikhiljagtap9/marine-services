<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceProviderDetail;
use App\Models\Plan;
use Carbon\Carbon;
use App\Models\Subscription;



class UserListController extends Controller
{
    public function index(Request $request)
    {
        $planId = $request->input('plan');

         // Get the selected plan name
        $plan = Plan::find($planId);
        $today = Carbon::today(); // Current date


        // Fetch service providers that match the given plan_id
        $providers = ServiceProviderDetail::with([
            'companyDetail',
            'contactDetail',
            'portServiceDetails',   
            'socialMediaDetails',
            'user.subscriptions' // Include user and subscriptions for efficiency
        ])
        ->whereHas('companyDetail')
        ->whereHas('contactDetail')
        ->whereHas('socialMediaDetails')
        ->whereHas('subscriptions', function ($q) use ($planId, $today) {
            $q->where('plan_id', $planId)
              ->whereDate('end_date', '>=', $today); // Only non-expired
        })
        ->get();

        // Attach the active subscription (filtered in model method)
        foreach ($providers as $provider) {
            $provider->active_subscription = $provider->user->getActiveSubscriptionForPlan($planId);
        }

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

        return view('admin.users.detail', compact('provider', 'subscription'));
    }
}
