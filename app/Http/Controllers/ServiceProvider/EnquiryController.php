<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Auth;

class EnquiryController extends Controller
{
    /**
     * Show enquiries submitted to a specific service provider user.
     */
    public function enquiriesByServiceUser()
    {
        $user = Auth::user();
        // Check if user is a service provider
        if ($user && $user->user_type === 'service_provider') {
            $enquiries = Enquiry::where('service_user_id', $user->id)
                                ->latest()
                                ->get();

            return view('service-provider.dashboard.enquiry', compact('enquiries'));
        }

        // Redirect or abort if not service_provider
        abort(403, 'Unauthorized action.');
    }
}
