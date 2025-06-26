<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceProviderDetail;
use App\Models\Quote;
use App\Models\Enquiry;
use App\Models\ServiceReview;
use App\Models\ContactClick;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;

class ServiceProviderDashboardController extends Controller
{
   
    public function index()
    {
        $user = Auth::user();

        // Check if the logged-in user is a service provider
        if ($user && $user->user_type === 'service_provider') {
            
            // Get active subscription
            $subscription = Subscription::where('user_id', $user->id)->latest()->first();
            $subscriptionId = $subscription?->id;

            // Get additional service provider details (if needed)
            $providerDetail = ServiceProviderDetail::with([
                'companyDetail',
                'contactDetail',
                'portServiceDetails.country',
                'portServiceDetails.port',
                'portServiceDetails.category',
                'socialMediaDetails'
            ])->where('user_id', $user->id)->first();

            // Total quote requests
            $totalQuotes = Quote::where('service_user_id', $user->id)->count();

            // Total enquiries
            $totalEnquiries = Enquiry::where('service_user_id', $user->id)->count();

            // Total Review
            $totalReview = ServiceReview::where('service_provider_id', $user->id)->count();

            // Contact Click Count
            $counts = ContactClick::select('click_type', DB::raw('count(*) as total'))
            ->where('subscription_id', $subscriptionId)
            ->groupBy('click_type')
            ->pluck('total', 'click_type');

            return view('service-provider.dashboard.index', compact('user', 'providerDetail','totalQuotes','totalEnquiries','totalReview','counts'));
        }

        // Not a service provider
        abort(403, 'Unauthorized access');
    }

}
