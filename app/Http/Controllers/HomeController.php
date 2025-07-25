<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;
use App\Models\Blog;
use App\Models\User;
use App\Models\TermsCondition;
use App\Models\PrivacyPolicy;
use App\Models\ConsentStatement;
use App\Models\DataProcessingPolicy;
use App\Models\DistanceSalesAgreement;

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

    public function contactPageSend(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:20',
            'user_message' => 'required|string',
            'consent' => 'accepted',
        ]);

        $toEmail = config('mail.contact_receiver'); // or env('CONTACT_RECEIVER_EMAIL')
        // Send email
        Mail::send('emails.contact', $validated, function ($message) use ($validated,$toEmail) {
            $message->to($toEmail)
                    ->subject('New Contact Form Submission from ' . $validated['name']);
        });

         return back()->with('success', 'Thank you! Our team will contact you shortly.');
    }

    public function showTerms()
    {
        $terms = TermsCondition::where('status', 'published')->get();

        return view('t&c', compact('terms'));
    }

    public function showPrivacy()
    {
        $privacies = PrivacyPolicy::where('status', 'published')->get();

        return view('privacy', compact('privacies'));
    }

    public function showConsent()
    {
        $consents = ConsentStatement::where('status', 'published')->get();

        return view('consent', compact('consents'));
    }

    public function showDataProcessing()
    {
        $datas = DataProcessingPolicy::where('status', 'published')->get();

        return view('data_processing', compact('datas'));
    }

    public function showDistanceSalesAgreement()
    {
        $sales = DistanceSalesAgreement::where('status', 'published')->get();

        return view('distance_sales_agreement', compact('sales'));
    }

}
