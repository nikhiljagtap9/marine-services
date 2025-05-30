<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceProviderDetail;
use App\Models\Plan;
use App\Models\ContactDetail;
use App\Models\SocialMediaDetail;
use App\Models\CompanyDetail;
use App\Models\Country;
use App\Models\Port;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\PortServiceDetail;
use Carbon\Carbon;



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

        return view('admin.users.index', compact('providers', 'planId', 'plan'));
    }

    public function detail($userId)
    {
        $provider = ServiceProviderDetail::with([
            'companyDetail',
            'contactDetail',
            'portServiceDetails',
            'socialMediaDetails',
            'user.subscriptions.plan',
            'portServiceDetails.country',
            'portServiceDetails.port',
            'portServiceDetails.category'
        ])->where('user_id', $userId)->firstOrFail();    
     //   dd($provider);
        return view('admin.users.detail', compact('provider'));
    }

    //  public function detail1($id) {

    //     $userId = auth()->id();
    //     $planId = $id; // get plan id using url

    //     $contact = ContactDetail::where('user_id', $userId)->first();
    //     $social = SocialMediaDetail::where('user_id', $userId)->first();
    //     $company = CompanyDetail::where('user_id', $userId)->first();
    //     $serviceProviderDetail = ServiceProviderDetail::where('user_id', $userId)->first();
    //     $countries = Country::all();
    //     $ports = Port::all();
    //     $categories = Category::all();
    //     $subCategories = SubCategory::all();

    //     // Now you can use $planId to fetch the selected plan
    //     $selectedPlan = Plan::find($planId);


    //     // Fetch existing service detail records for this user
    //     $portServiceDetails = PortServiceDetail::where('user_id', $userId)->get();

    //      // Group by country_id and port_id as key
    //     $groupedServiceDetails = $portServiceDetails->groupBy(function ($item) {
    //         return $item->country_id . '_' . $item->port_id;
    //     });

    //     // Organize IDs into a nested array for hidden input mapping
    //     $existingIds = [];

    //     foreach ($groupedServiceDetails as $blockIndex => $serviceGroup) {
    //         foreach ($serviceGroup as $serviceIndex => $service) {
    //             $existingIds[$blockIndex][$serviceIndex] = $service->id;
    //         }
    //     }

    //     // Ensure at least one empty section if no data exists
    //     if ($groupedServiceDetails->isEmpty()) {
    //         $groupedServiceDetails = collect([
    //             '0_0' => [null] // null = placeholder for a single empty service
    //         ]);
    //     }
    //     dd($social);
    //     return view('admin.users.detail',
    //      compact('contact', 'social', 'company','countries',
    //      'ports','categories','subCategories','groupedServiceDetails',
    //      'existingIds','planId','selectedPlan','serviceProviderDetail'));
        
    // }
}
