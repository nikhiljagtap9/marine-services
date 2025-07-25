<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ServiceProviderDetail;
use App\Models\Country;
use App\Models\Category;
use App\Models\Subscription;
use App\Models\Enquiry;
use App\Models\ServiceReview;
use App\Models\Favourite;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Mail\EnquirySubmitted;
use Illuminate\Support\Facades\Mail;

class ListingController extends Controller
{

    public function indexOld(Request $request)
    {
        $countries = Country::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $today = Carbon::today(); // Current date

        // this is compulsory fields for search engine
        $hasFilters = $request->filled(['country', 'ports_services']);

        $query = ServiceProviderDetail::with([
            'companyDetail',
            'contactDetail',
        //  'portServiceDetails',
            'socialMediaDetails',
            'user.subscriptions.plan',
            'portServiceDetails' => function ($q) use ($request) {
                // Always eager load portServiceDetails
                $q->when($request->sub_service_type, function ($q2) use ($request) {
                    $q2->whereJsonContains('sub_services', (string) $request->sub_service_type);
                });
            },  // only fecth perticuler subservices
            'portServiceDetails.port',
            'portServiceDetails.country',
            'portServiceDetails.category'
        ])
        ->whereHas('user.subscriptions', function ($q) use ($today) {
            $q->whereDate('end_date', '>=', $today) // Only non-expired
            ->where('plan_id', '!=', 1);  // Exclude users with plan_id = 1
        })
        ->whereHas('companyDetail')
        ->whereHas('contactDetail')
        ->whereHas('socialMediaDetails');

        if ($hasFilters) {
            $query->whereHas('portServiceDetails', function ($q) use ($request) {
                if ($request->filled('country')) {
                    $q->where('country_id', $request->country);
                }

                if ($request->filled('ports_services')) {
                    $q->where('port_id', $request->ports_services);
                }

                if ($request->filled('service_type')) {
                    $q->where('category_id', $request->service_type);
                }

                if ($request->filled('sub_service_type')) {
                    $q->whereJsonContains('sub_services', (string) $request->sub_service_type);
                }
            });
        } else {
            $query->orderByDesc('id'); // Or use 'created_at' if needed
        }

        
        // === Separate Listing (only plan_id = 1) ===
        $plan1Providers = $this->getPlan1Providers($request,$hasFilters);

        $products = $query->paginate(15)->appends($request->all());

        foreach ($products as $product) {
            if ($product->user) {
                $product->active_subscription = $product->user->getActiveSubscription(); // Not filtering by plan
            }
        }
        //dd($products);
        // if ($request->ajax()) {
        //     return view('partials.product_item', compact('products'))->render();
        // }

        return view('product_listing', compact('products','plan1Providers' ,'countries', 'categories'));
    }

    public function indexNEW(Request $request)
    {
        $countries = Country::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $today = Carbon::today();
        $hasFilters = $request->filled(['country', 'ports_services']);

        $query = ServiceProviderDetail::with([
            'companyDetail',
            'contactDetail',
            'socialMediaDetails',
            'user.subscriptions.plan',
            'portServiceDetails' => function ($q) use ($request) {
                $q->when($request->sub_service_type, function ($q2) use ($request) {
                    $q2->whereJsonContains('sub_services', (string) $request->sub_service_type);
                });
            },
            'portServiceDetails.port',
            'portServiceDetails.country',
            'portServiceDetails.category'
        ])
        ->whereHas('user.subscriptions', function ($q) use ($today) {
            $q->whereDate('end_date', '>=', $today)
            ->where('plan_id', '!=', 1)
            ->whereIn('status', ['active']);
        })
        ->whereHas('companyDetail')
        ->whereHas('contactDetail')
        ->whereHas('socialMediaDetails');

        // If filters applied, add those to the query
        if ($hasFilters) {
            $query->whereHas('portServiceDetails', function ($q) use ($request) {
                $q->where('country_id', $request->country)
                ->where('port_id', $request->ports_services);

                if ($request->filled('service_type')) {
                    $q->where('category_id', $request->service_type);
                }

                if ($request->filled('sub_service_type')) {
                    $q->whereJsonContains('sub_services', (string) $request->sub_service_type);
                }
            });
        }

         // Rating filter using service_reviews average
        if ($request->filled('rating')) {
            // $query->whereHas('user.serviceReviews', function ($q) use ($request) {
            //     $q->select('service_provider_id')
            //     ->groupBy('service_provider_id')
            //     ->havingRaw('AVG(rating) >= ', [(int)$request->rating]);
            // });
            $query->whereHas('user.serviceReviews', function ($q) use ($request) {
                $q->where('rating', (int) $request->rating);
            });
        }

        // Always paginate
        $products = $query->paginate(15)->appends($request->all());

        // Attach active subscription if user exists
        foreach ($products as $product) {
            if ($product->user) {
                $product->active_subscription = $product->user->getActiveSubscription();
            }
        }

        // Plan 1 providers
        $plan1Providers = $this->getPlan1Providers($request, $hasFilters);
        return view('product_listing', compact('products', 'plan1Providers', 'countries', 'categories', 'hasFilters'));
    }

    public function index(Request $request)
    {
        $countries = Country::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $today = Carbon::today();

        // Check if both country and port are present
        $hasCountryAndPort = $request->filled('country') && $request->filled('ports_services');

        $query = ServiceProviderDetail::with([
            'companyDetail',
            'contactDetail',
            'socialMediaDetails',
            'user.subscriptions.plan',
            'portServiceDetails' => function ($q) use ($request) {
                $q->when($request->sub_service_type, function ($q2) use ($request) {
                    $q2->whereJsonContains('sub_services', (string) $request->sub_service_type);
                });
            },
            'portServiceDetails.port',
            'portServiceDetails.country',
            'portServiceDetails.category'
        ])
        ->whereHas('user.subscriptions', function ($q) use ($today) {
            $q->whereDate('end_date', '>=', $today)
            ->where('plan_id', '!=', 1)
            ->whereIn('status', ['active']);
        })
        ->whereHas('companyDetail')
        ->whereHas('contactDetail')
        ->whereHas('socialMediaDetails');

        // Apply filters only if both country and port are present
        if ($hasCountryAndPort) {
            $query->whereHas('portServiceDetails', function ($q) use ($request) {
                $q->where('country_id', $request->country)
                ->where('port_id', $request->ports_services);

                if ($request->filled('service_type')) {
                    $q->where('category_id', $request->service_type);
                }

                if ($request->filled('sub_service_type')) {
                    $q->whereJsonContains('sub_services', (string) $request->sub_service_type);
                }
            });
        } elseif ($request->filled('country') || $request->filled('ports_services')) {
            // If only one is present, return no records
            $query->whereRaw('1 = 0'); // Always false condition
        }

        // Rating filter
        if ($request->filled('rating')) {
            $query->whereHas('user.serviceReviews', function ($q) use ($request) {
                $q->where('rating', (int) $request->rating);
            });
        }

        // Get paginated result
        $products = $query->paginate(15)->appends($request->all());

        // Attach active subscription
        foreach ($products as $product) {
            if ($product->user) {
                $product->active_subscription = $product->user->getActiveSubscription();
            }
        }

        // Plan 1 providers
        $plan1Providers = $this->getPlan1Providers($request, $hasCountryAndPort);
        return view('product_listing', compact('products', 'plan1Providers', 'countries', 'categories', 'hasCountryAndPort'));
    }


    private function getPlan1Providers(Request $request, $hasCountryAndPort)
    {
        $today = Carbon::today();

        $query = ServiceProviderDetail::with([
            'companyDetail',
            'contactDetail',
            'socialMediaDetails',
            'user.subscriptions.plan',
            'portServiceDetails.port',
            'portServiceDetails.country',
            'portServiceDetails.category',
        ])
        ->whereHas('user.subscriptions', function ($q) use ($today) {
            $q->whereDate('end_date', '>=', $today)
            ->where('plan_id', 1)
            ->where('status', 'active');
        })
        ->whereHas('companyDetail')
        ->whereHas('contactDetail')
        ->whereHas('socialMediaDetails');

        // ✅ Apply filters only if both country and port are present
        if ($hasCountryAndPort) {
            $query->whereHas('portServiceDetails', function ($q) use ($request) {
                $q->where('country_id', $request->country)
                ->where('port_id', $request->ports_services);

                if ($request->filled('service_type')) {
                    $q->where('category_id', $request->service_type);
                }

                if ($request->filled('sub_service_type')) {
                    $q->whereJsonContains('sub_services', (string) $request->sub_service_type);
                }
            });
        } elseif ($request->filled('country') || $request->filled('ports_services')) {
            // Only one of them is present → return no results
            $query->whereRaw('1 = 0');
        }

        return $query->get();
    }

    public function detail($subscriptionId, Request $request)
    {
        $subscription = Subscription::with('user', 'plan')->findOrFail($subscriptionId);

        // encrypt the user ID in the QR code 
        $encryptedUserId = Crypt::encrypt($subscription->user_id);

        $provider = ServiceProviderDetail::with([
            'companyDetail',
            'contactDetail',
            'portServiceDetails.country',
            'portServiceDetails.port',
            'portServiceDetails.category',
            'socialMediaDetails'
        ])->where('user_id', $subscription->user_id)->firstOrFail();

        // fetch favoritesCount depend on subscription_id
        $favoritesCount = Favourite::where('subscription_id', $subscriptionId)->count();

        //  fetch service review rating data using user id
        $allReviews = ServiceReview::where('service_provider_id', $subscription->user_id)->latest()->get();

         // Rating statistics
        $ratingCounts = $allReviews->groupBy(function ($item) {
            return floor($item->rating); // group by star 1-5
        })->map->count();

        $totalRatings = $allReviews->count();
        $averageRating = $totalRatings > 0 ? number_format($allReviews->avg('rating'), 1) : 0;

        // Paginated reviews with non-empty comments
        $reviews = ServiceReview::where('service_provider_id', $subscription->user_id)
            ->whereNotNull('comment')
            ->where('comment', '!=', '')
            ->latest()
            ->paginate(3); // Load 3 per request

        // If AJAX request (Load More), return only partial HTML
        if ($request->ajax()) {
            return view('partials.review_item', compact('reviews'))->render();
        } 

        return view('detail', compact(
            'provider',
            'subscription',
            'encryptedUserId',
            'reviews',
            'averageRating',
            'ratingCounts',
            'totalRatings',
            'favoritesCount'
        ));
    }

    public function freedetail($subscriptionId, Request $request)
    {
        $subscription = Subscription::with('user', 'plan')->findOrFail($subscriptionId);

        // encrypt the user ID in the QR code 
        $encryptedUserId = Crypt::encrypt($subscription->user_id);

        $provider = ServiceProviderDetail::with([
            'companyDetail',
            'contactDetail',
            'portServiceDetails.country',
            'portServiceDetails.port',
            'portServiceDetails.category',
            'socialMediaDetails'
        ])->where('user_id', $subscription->user_id)->firstOrFail();

        // fetch favoritesCount depend on subscription_id
        $favoritesCount = Favourite::where('subscription_id', $subscriptionId)->count();

        //  fetch service review rating data using user id
        $allReviews = ServiceReview::where('service_provider_id', $subscription->user_id)->latest()->get();

         // Rating statistics
        $ratingCounts = $allReviews->groupBy(function ($item) {
            return floor($item->rating); // group by star 1-5
        })->map->count();

        $totalRatings = $allReviews->count();
        $averageRating = $totalRatings > 0 ? number_format($allReviews->avg('rating'), 1) : 0;

        // Paginated reviews with non-empty comments
        $reviews = ServiceReview::where('service_provider_id', $subscription->user_id)
            ->whereNotNull('comment')
            ->where('comment', '!=', '')
            ->latest()
            ->paginate(3); // Load 3 per request

        // If AJAX request (Load More), return only partial HTML
        if ($request->ajax()) {
            return view('partials.review_item', compact('reviews'))->render();
        } 

        return view('free_detail', compact(
            'provider',
            'subscription',
            'encryptedUserId',
            'reviews',
            'averageRating',
            'ratingCounts',
            'totalRatings',
            'favoritesCount'
        ));
    }


    public function enquiryStore(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'your_name' => 'required|string|max:255',
            'email' => 'required|email',
            'comment' => 'required|string',
            'photo' => 'nullable|image|max:1024',
            'subscription_id' => 'required|exists:subscriptions,id',
            'service_user_id' => 'required|exists:users,id',
        ]);

        $photoPath = $request->file('photo')?->store('uploads/enquiries', 'public');

        $enquiry = Enquiry::create([
            'service_user_id' => $request->service_user_id,
            'subscription_id' => $request->subscription_id,
            'company_name' => $request->company_name,
            'your_name' => $request->your_name,
            'email' => $request->email,
            'comment' => $request->comment,
            'photo' => $photoPath,
        ]);

        // Fetch the subscription and its associated user
        $subscription = Subscription::with('user')->find($request->subscription_id);

        if ($subscription && $subscription->user && $subscription->user->email) {
            
            try {
               Mail::to($subscription->user->email)->send(new EnquirySubmitted($enquiry));
            } catch (\Exception $e) {
                \Log::error('Failed to send Enquiry Submitted email to provider.', [
                'email' => $subscription->user->email ?? 'N/A',
                'error' => $e->getMessage()
                ]);
            }  
        }

        return redirect()->back()->with('success', 'Enquiry submitted successfully.')->withFragment('enquiryForm');
    }
}