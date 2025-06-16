<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceProviderDetail;
use App\Models\Quote;
use App\Models\Enquiry;
use App\Models\ServiceReview;

class ServiceProviderDashboardController extends Controller
{
   
    public function index()
    {
        $user = Auth::user();

        // Check if the logged-in user is a service provider
        if ($user && $user->user_type === 'service_provider') {
            
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

            return view('service-provider.dashboard.index', compact('user', 'providerDetail','totalQuotes','totalEnquiries','totalReview'));
        }

        // Not a service provider
        abort(403, 'Unauthorized access');
    }

}
