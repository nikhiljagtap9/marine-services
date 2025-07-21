<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProviderDetail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Port;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactDetail;
use App\Models\SocialMediaDetail;
use App\Models\CompanyDetail;
use App\Models\PortServiceDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ServiceProviderRegistered;



class ServiceProviderDetailController extends Controller
{
    // Show the create form
    public function create()
    {
        $countries = Country::orderBy('name')->get();
        $ports = Port::with('country')->orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $googleMapsKey = config('services.google_maps.key');
        return view('service-provider.create',compact('countries','ports','categories','googleMapsKey'));
    }

    // Store submitted data
    // public function storeOld(Request $request)
    // {   
    //     $validator = Validator::make($request->all(), [
    //         // Your validation rules
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|string|confirmed|min:6',
    //         'company_name' => 'required|string|max:255',
    //         'company_logo' => 'nullable|image|mimes:jpg,png,jpeg|max:1024',
    //         'company_description' => 'nullable|string',
    //         'contact_person_name' => 'required|string|max:255',
    //         'phone' => 'required|string|max:20',
    //         'country' => 'required|string|max:100',
    //         'city' => 'nullable|string|max:100',
    //         'office_address' => 'required|string',
    //         'port_id' => 'required|string',
    //         'service_type' => 'required|string',
    //         'sub_service_type' => 'required|string',
    //         'contact_number' => 'nullable|string|max:20',
    //     ]);

    //     if ($validator->fails()) {
    //         return back()
    //             ->withErrors($validator)
    //             ->withInput()
    //             ->with('current_step', $request->input('current_step', 1));
    //     }

    //    // dd($request);

    //     // 1. Create User
    //     $user = User::create([
    //         'name' => $request->contact_person_name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'user_type' => 'service_provider'
    //     ]);

    //     // 2. Handle logo upload
    //     $logoPath = null;
    //     if ($request->hasFile('company_logo')) {
    //         $logoPath = $request->file('company_logo')->store('logos', 'public');
    //     }

        

    //      // 3. Save service provider details
    //     ServiceProviderDetail::create([
    //         'user_id' => $user->id,
    //         'company_name' => $request->company_name,
    //         'company_logo' => $logoPath,
    //         'company_description' => $request->company_description,
    //         'contact_person_name' => $request->contact_person_name,
    //         'phone' => $request->phone,
    //        // 'email' => $request->email,
    //         'country' => $request->country,
    //         'city' => $request->city,
    //         'office_address' => $request->office_address,
    //         'lat' => $request->lat,
    //         'lng' => $request->lng,
    //         'port_id' => $request->port_id,
    //         'service_type' => $request->service_type,
    //         'sub_service_type' => $request->sub_service_type,
    //         'contact_number' => $request->contact_number,
    //     ]);

    //     session(['registration_success' => true]);
    //     // Log the user in after registration
    //     Auth::login($user);
    //         return redirect()->route('service-provider.confirm');
    // }


    // Store submitted data
    public function store(Request $request)
    {
        $turkeyId = Country::where('name', 'Turkey')->value('id');

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpg,png,jpeg|max:1024',
            'company_description' => 'nullable|string',
            'contact_person_name' => 'required|string|max:255',
            'contact_person_last_name' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^\d+$/', 'max:20'],
            'country' => 'required|string|max:100',
            'city' => 'nullable|string|max:100',
            'office_address' => 'required|string',
            'port_id' => 'required|string',
            'service_type' => 'required|string',
            'sub_service_type' => 'required|string',
            'contact_number' => 'nullable|string|max:20',
        ]);

        // Conditionally add identity_number if Turkey is selected
        if ((int)$request->country === (int)$turkeyId) {
            $rules['identity_number'] = 'required|digits:11';
        } else {
            $rules['identity_number'] = 'nullable|string';
        }

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                ], 422);
            }
        }

        // 1. Create User
        $user = User::create([
            'name' => $request->contact_person_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'service_provider',
        ]);

        // 2. Handle logo upload
        $logoPath = null;
        if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('logos', 'public');
        }

        // 3. Save service provider details
        ServiceProviderDetail::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'company_logo' => $logoPath,
            'company_description' => $request->company_description,
            'contact_person_name' => $request->contact_person_name,
            'contact_person_last_name' => $request->contact_person_last_name,
            'phone' => $request->phone,
            'identity_number' => $request->identity_number,
            'country' => $request->country,
            'city' => $request->city,
            'office_address' => $request->office_address,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'port_id' => $request->port_id,
            'service_type' => $request->service_type,
            'sub_service_type' => $request->sub_service_type,
            'contact_number' => $request->contact_number,
        ]);

        session(['registration_success' => true]);
        // Log the user in after registration
        Auth::login($user);

        /* ─────────────  TRY / CATCH around the mail  ───────────── */
        try {
            Mail::to($user->email)->send(new ServiceProviderRegistered($user));
        } catch (\Throwable $e) {                            
            Log::error('Service‑provider welcome mail failed: '.$e->getMessage(), [
                'user_id' => $user->id,
                'email'   => $user->email,
            ]);
        }
        /* ────────────────────────────────────────────────────────── */

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'redirect_url' => route('service-provider.confirm'),
            ]);
        }

        return redirect()->route('service-provider.confirm');
    }


    public function confirm()
    {
        if (!session('registration_success')) {
            return redirect()->route('service-provider.create'); // redirect to home
        }
        // Clear session after first access
     //   session()->forget('registration_success');

        return view('service-provider.confirm');
    }

    public function confirmTemp()
    {
        return view('service-provider.temp_confirm');
    }

    public function getCities($country_id) {
       $cities = City::where('country_id', $country_id)->orderBy('name')->get();
       return response()->json($cities);
    }

    public function getPorts($country_id) {
       $ports = Port::where('country_id', $country_id)->orderBy('name')->get();
       return response()->json($ports);
    }

    public function getSubService($service_id){
       $subCategories = SubCategory::where('category_id', $service_id)->orderBy('name')->get();
       return response()->json($subCategories);
    }

    public function membership(Request $request) 
    {
        // session()->forget('uploaded_certificates');
        if (!auth()->check()) {
            // Store info in session that user tried to access membership
            session()->put('show_provider_register', true);
            return redirect()->route('login');
        }

        $userId = auth()->id();
        $planId = $request->id; // get plan id using url
        $decryptPlanId = decrypt($request->id);

        $contact = ContactDetail::where('user_id', $userId)->first();
        $social = SocialMediaDetail::where('user_id', $userId)->first();
        $company = CompanyDetail::where('user_id', $userId)->first();
        $countries = Country::orderBy('name')->get();
        $ports = Port::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $subCategories = SubCategory::orderBy('name')->get();

        // Now you can use $planId to fetch the selected plan
        $selectedPlan = Plan::find($decryptPlanId);

        // Fetch subscription ID for user & selected plan
        $subscription = Subscription::where('user_id', $userId)
        ->where('plan_id', $decryptPlanId)
        ->first();

        $subscriptionId = $subscription->id ?? null;

        // Fetch port service details only for this subscription
        $portServiceDetails = collect(); // default empty

        if ($subscriptionId) {
            $portServiceDetails = PortServiceDetail::where('user_id', $userId)
                ->where('subscription_id', $subscriptionId)
                ->get();
        }

         // Group by country_id and port_id as key
        $groupedServiceDetails = $portServiceDetails->groupBy(function ($item) {
            return $item->country_id . '_' . $item->port_id;
        });

        // Organize IDs into a nested array for hidden input mapping
        $existingIds = [];
        foreach ($groupedServiceDetails as $blockIndex => $serviceGroup) {
            foreach ($serviceGroup as $serviceIndex => $service) {
                $existingIds[$blockIndex][$serviceIndex] = $service->id;
            }
        }

        // Add one empty group if nothing exists
        if ($groupedServiceDetails->isEmpty()) {
            $groupedServiceDetails = collect([
                '0_0' => [null]
            ]);
        }

        /*
        1. Check if subscription is active (payment made and not expired)
        2. Show/hide payment button accordingly
        We'll add:
        $subscriptionExpired boolean
        $showPaymentButton boolean flag to be used in the Blade view
        */
        $subscriptionExpired = true;
        $showPaymentButton = true;

        if ($subscription) {
            $subscriptionExpired = Carbon::parse($subscription->end_date)->isPast();

            // Check if status is inactive (string comparison)
            $isInactiveStatus = in_array($subscription->status, ['pending','cancelled', 'expired']);

            $showPaymentButton = $isInactiveStatus || $subscriptionExpired;
        }


        return view('service-provider.membership', compact(
            'contact',
            'social',
            'company',
            'countries',
            'ports',
            'categories',
            'subCategories',
            'groupedServiceDetails',
            'existingIds',
            'planId',
            'selectedPlan',
            'showPaymentButton'
        ));
        
    }

    public function membershipFormBK(Request $request)
    {
        $userId = auth()->id();
        $planId = decrypt($request->plan_id);
        $plan = Plan::find($planId); // Assuming you have a Plan model
        $isBasic = strtolower($plan->id ?? '') === '1'; // or use $plan->id === 1;

        // get company details first
        $companyDetail = CompanyDetail::where('user_id', $userId)->first();

        $hasPhotos = $companyDetail && !empty(json_decode($companyDetail->photos, true));

        // Validate all inputs
        $request->validate([
            // Contact
            'alternative_email' => 'nullable|email',
            'office_telephone' => 'required|regex:/^[0-9 +]+$/|max:20',
            'mobile_number'    => 'required|regex:/^[0-9 +]+$/|max:20',
            'whatsapp_number'  => 'nullable|regex:/^[0-9 +]+$/|max:20',

            'has_emergency_contact' => 'required|boolean',
            'emergency_contact_number' => 'nullable|required_if:has_emergency_contact,1',
            
            // Social
            'linkedin' => 'nullable|url|regex:/^https?:\/\/(www\.)?linkedin\.com\/.*$/i',
            'instagram' => 'nullable|url|regex:/^https?:\/\/(www\.)?instagram\.com\/.*$/i',
            'twitter' => 'nullable|url|regex:/^https?:\/\/(www\.)?x\.com\/.*$/i',

            // Company
            'slogan' => $isBasic ? 'nullable|string' : 'required|string',
            'about' => $isBasic ? 'nullable|string' : 'required|string',
            'brands' => 'nullable|string',
            'reference_shipowners' => 'nullable|string',

            'certificates' => 'nullable|array',
            'certificates.*' => 'file|mimes:pdf,jpeg,png,jpg',

            'photos' => [
                $isBasic || $hasPhotos ? 'nullable' : 'required',
                'array',
            ],
            'photos.*' => 'image|mimes:jpeg,png,jpg',

            // Port Services
            'country.0' => 'required|string',
            'port.0' => 'required|string',
            'service_category.0.0' => 'required|integer',
            // All others optional
            'country.*' => 'nullable|string',
            'port.*' => 'nullable|string',
            'service_category.*.*' => 'nullable|integer',
            'sub_services.*.*' => 'nullable|array',
            'sub_services.*.*.*' => 'integer',
            'additional_info.*.*' => 'nullable|string',
        ],[
            'emergency_contact_number.required_if' => 'Please enter an emergency contact number if you selected Yes.',
            'country.0.required' => 'Please select country.',
            'port.0.required' => 'Please select port.',
            'service_category.0.0.required' => 'Please select at least one service category in the first group.',
            'linkedin.regex' => 'Please enter a valid link like https://linkedin.com/in/yourcompany',
            'instagram.regex' => 'Please enter a valid link like https://instagram.com/yourcompany',
            'twitter.regex' => 'Please enter a valid link like https://x.com/yourcompany',
        ]);

        // Start ----- Add manual check CERTIFICATE condition
        $totalUploadedCerts = count($request->file('certificates', []));
        $existingCertsCount = count($request->input('existing_cert', []));
        $totalCerts = $totalUploadedCerts + $existingCertsCount;

        if ($totalCerts > 20) {
            return response()->json([
                'errors' => ['certificates' => ['You can upload a maximum of 20 certificates']]
            ], 422);
        }
        // End ---- Add manual check CERTIFICATE condition

        //Start ----- Add manual check PHOTO condition
        $totalUploadedPhotos = count($request->file('photos', []));
        $existingPhotosCount = count($request->input('existing_photos', []));
        $totalPhotos = $totalUploadedPhotos + $existingPhotosCount;

        if (!$isBasic && $totalPhotos < 3) {
            return response()->json([
                'errors' => ['photos' => ['Please upload at least 3 photos.']]
            ], 422);
        }

        if ($totalPhotos > 20) {
            return response()->json([
                'errors' => ['photos' => ['You can upload a maximum of 20 photos']]
            ], 422);
        }
        //End ---- Add manual check PHOTO condition
        
        //  Custom Conditional Validation Logic (after validate())
        $allCategories = $request->input('service_category', []);
        $allCountries = $request->input('country', []);
        $allPorts = $request->input('port', []);
        $errors = [];

        foreach ($allCategories as $groupIndex => $categoryGroup) {
            if ($groupIndex == 0) continue; // Skip the first group — already validated

            $hasAnyCategory = collect($categoryGroup)->filter()->isNotEmpty();
            
            if ($hasAnyCategory) {
                $country = $allCountries[$groupIndex] ?? null;
                $port = $allPorts[$groupIndex] ?? null;

                if (empty($country)) {
                    $errors["country.$groupIndex"] = "Please select country.";
                }

                if (empty($port)) {
                    $errors["port.$groupIndex"] = "Please select port.";
                }
                
            }
        }

        if (!empty($errors)) {
            // Return custom validation errors to the frontend
            return response()->json(['errors' => $errors], 422);
        }

        //************** */ Save or update subscription table  FIRST ****************************************/
        // Try to find an existing active subscription for the same plan against user id
        $activeSubscription = Subscription::where('user_id', $userId)
            ->where('plan_id', $planId)
            ->where('end_date', '>', Carbon::now())
            ->latest('created_at')
            ->first();

        if ($activeSubscription) {
            $subscriptionId = $activeSubscription->id; // Use existing active subscription
        } else {
            // No active subscription found, create a new one
            $startDate = Carbon::now();
            $octFirst = Carbon::create($startDate->year, 10, 1);
            if ($planId == 2 && $startDate->lt($octFirst)) {
                // If plan is 2 and current date is before Oct 1, set end date to Oct 1
                $endDate = $startDate->lt($octFirst) ? $octFirst : $startDate->copy()->addYear();
            } else {
                $endDate = $startDate->copy()->addYear();
            }

            $newSubscription = Subscription::create([
                'user_id' => $userId,
                'plan_id' => $planId,
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);
            $subscriptionId = $newSubscription->id;
        }
        //*******************************************/

        // Save Contact Details
        ContactDetail::updateOrCreate(
            ['user_id' => $userId],
            $request->only(['alternative_email', 'office_telephone', 'mobile_number', 'whatsapp_number','has_emergency_contact','emergency_contact_number'])
        );

        // Save Social Media
        SocialMediaDetail::updateOrCreate(
            ['user_id' => $userId],
            $request->only(['linkedin', 'instagram', 'twitter'])
        );

        /**************** Save certificates ***************/
        // Step 1: Decode existing stored certificates
        $existingCertsInDb = $companyDetail && $companyDetail->certificates
            ? json_decode($companyDetail->certificates, true)
            : [];

        // Step 2: Get user-submitted retained certificates
        $retainedCerts = $request->input('existing_cert', []);

        // Step 3: Delete certificates that are no longer retained
        $certsToDelete = array_diff($existingCertsInDb, $retainedCerts);
        foreach ($certsToDelete as $file) {
            Storage::disk('public')->delete($file);
        }

        // Step 4: Initialize certPaths with retained certificates
        $certPaths = $retainedCerts;

        // Step 5: Add newly uploaded certificates
        if ($request->hasFile('certificates')) {
            foreach ($request->file('certificates') as $cert) {
                if ($cert->isValid()) {
                    $path = $cert->store("certificates/{$userId}", 'public');
                    $certPaths[] = $path;
                }
            }
        }

        /********* Save photo ********/
        // Step 1: Decode existing stored photos
        $existingFilesInDb = $companyDetail && $companyDetail->photos
            ? json_decode($companyDetail->photos, true)
            : [];

        // Step 2: Get user-submitted retained photos
        $retainedPhotos = $request->input('existing_photos', []);

        // Step 3: Delete files that are no longer retained
        $filesToDelete = array_diff($existingFilesInDb, $retainedPhotos);
        foreach ($filesToDelete as $file) {
            Storage::disk('public')->delete($file);
        }

        // Step 4: Initialize photoPaths with retained photos
        $photoPaths = $retainedPhotos;

        // Step 5: Add newly uploaded photos
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                if ($file->isValid()) {
                    $path = $file->store("photos/{$userId}", 'public');
                    $photoPaths[] = $path;
                }
            }
        }



        CompanyDetail::updateOrCreate(
            ['user_id' => $userId],
            [
                'slogan' => $request->slogan,
                'about' => $request->about,
                'brands' => $request->brands,
                'reference_shipowners' => $request->reference_shipowners,
                'certificates' => json_encode($certPaths),
                'photos' => json_encode($photoPaths),
            ]
        );

        // Save Port-Service Details
        if ($request->has('country') && is_array($request->country)) {
            $portCategoryCount = []; // Track how many new categories are being added per port

            // Check if user has an active subscription
            $activeSubscription = Subscription::where('user_id', $userId)
                ->where('end_date', '>=', now())
                ->first();

            foreach ($request->country as $blockIndex => $country) {
                $port = $request->port[$blockIndex] ?? null;
                $serviceCategories = $request->service_category[$blockIndex] ?? [];

                foreach ($serviceCategories as $serviceIndex => $categoryId) {

                    // Skip saving if required fields are missing
                    if (empty($country) || empty($port) || empty($categoryId)) {
                        continue;
                    }

                    // Get ID if it’s an update
                    $detailId = $request->port_service_detail_id[$blockIndex][$serviceIndex] ?? null;

                    // Count how many existing categories already saved in DB for this port 
                    // Count current entries only if the subscription is active
                    $existingCount = 0;
                    if ($activeSubscription) {
                        $existingCount = PortServiceDetail::where('user_id', $userId)
                            ->where('port_id', $port)
                            ->when($detailId, function ($query) use ($detailId) {
                                return $query->where('id', '!=', $detailId); // skip updating record
                            })
                            ->count();
                    }

                    // Track how many new ones we're adding in this request
                    $portCategoryCount[$port] = isset($portCategoryCount[$port])
                        ? $portCategoryCount[$port] + 1
                        : 1;

                    // Total count = existing DB + this request
                    if (($existingCount + $portCategoryCount[$port]) > 15) {
                        return response()->json([
                            'errors' => ["port.$blockIndex" => "Only 15 service categories are allowed per port."]
                        ], 422);
                    }    

                    $subServices = $request->sub_services[$blockIndex][$serviceIndex] ?? [];

                    $additionalInfo = $request->additional_info[$blockIndex][$serviceIndex] ?? null;
                    


                    if ($detailId) {
                        PortServiceDetail::where('id', $detailId)
                            ->where('user_id', $userId)
                            ->update([
                                'country_id' => $country,
                                'port_id' => $port,
                                'category_id' => $categoryId,
                                'sub_services' => $subServices,
                                'additional_info' => $additionalInfo,
                                'subscription_id' => $subscriptionId,
                                'updated_at' => now(),
                            ]);
                    } else {
                        PortServiceDetail::create([
                            'user_id' => $userId,
                            'country_id' => $country,
                            'port_id' => $port,
                            'category_id' => $categoryId,
                            'sub_services' => $subServices,
                            'additional_info' => $additionalInfo,
                            'subscription_id' => $subscriptionId,
                        ]);
                    }
                }
            }
        }

        return redirect()->back()->with('success', 'Membership form saved successfully!');
    }

    public function membershipForm(Request $request)
    {
        $userId = auth()->id();
        $planId = decrypt($request->plan_id);
        $plan = Plan::find($planId); // Assuming you have a Plan model
        $isBasic = strtolower($plan->id ?? '') === '1'; // or use $plan->id === 1;

        // get company details first
        $companyDetail = CompanyDetail::where('user_id', $userId)->first();

        $hasPhotos = $companyDetail && !empty(json_decode($companyDetail->photos, true));


        // Validate all inputs
        $request->validate([
            // Contact
            'alternative_email' => 'nullable|email',
            'office_telephone' => 'required|regex:/^[0-9 +]+$/|max:20',
            'mobile_number'    => 'required|regex:/^[0-9 +]+$/|max:20',
            'whatsapp_number'  => 'nullable|regex:/^[0-9 +]+$/|max:20',

            'has_emergency_contact' => 'required|boolean',
            'emergency_contact_number' => 'nullable|required_if:has_emergency_contact,1',
            
            // Social
            'linkedin' => 'nullable|url|regex:/^https?:\/\/(www\.)?linkedin\.com\/.*$/i',
            'instagram' => 'nullable|url|regex:/^https?:\/\/(www\.)?instagram\.com\/.*$/i',
            'twitter' => 'nullable|url|regex:/^https?:\/\/(www\.)?x\.com\/.*$/i',

            // Company
            'slogan' => $isBasic ? 'nullable|string' : 'required|string',
            'about' => $isBasic ? 'nullable|string' : 'required|string',
            'brands' => 'nullable|string',
            'reference_shipowners' => 'nullable|string',

            // 'certificates' => 'nullable|array',
            // 'certificates.*' => 'file|mimes:pdf,jpeg,png,jpg',

            // 'photos' => [
            //     $isBasic || $hasPhotos ? 'nullable' : 'required',
            //     'array',
            // ],
          //  'photos.*' => 'image|mimes:jpeg,png,jpg',

            // Port Services
            'country.0' => 'required|string',
            'port.0' => 'required|string',
            'service_category.0.0' => 'required|integer',
            // All others optional
            'country.*' => 'nullable|string',
            'port.*' => 'nullable|string',
            'service_category.*.*' => 'nullable|integer',
            'sub_services.*.*' => 'nullable|array',
            'sub_services.*.*.*' => 'integer',
            'additional_info.*.*' => 'nullable|string',
        ],[
            'emergency_contact_number.required_if' => 'Please enter an emergency contact number if you selected Yes.',
            'country.0.required' => 'Please select country.',
            'port.0.required' => 'Please select port.',
            'service_category.0.0.required' => 'Please select at least one service category in the first group.',
            'linkedin.regex' => 'Please enter a valid link like https://linkedin.com/in/yourcompany',
            'instagram.regex' => 'Please enter a valid link like https://instagram.com/yourcompany',
            'twitter.regex' => 'Please enter a valid link like https://x.com/yourcompany',
        ]);

        // Start ----- Add manual check CERTIFICATE condition
        $totalUploadedCerts = count($request->file('certificates', []));
        $existingCertsCount = count($request->input('existing_cert', []));
        $sessionCerts = session('uploaded_certificates', []);
        $totalCerts = $totalUploadedCerts + $existingCertsCount + count($sessionCerts);

        if ($totalCerts > 20) {
            return response()->json([
                'errors' => ['certificates' => ['You can upload a maximum of 20 certificates']]
            ], 422);
        }
        // End ---- Add manual check CERTIFICATE condition

        //Start ----- Add manual check PHOTO condition
        $totalUploadedPhotos = count($request->file('photos', []));
        $existingPhotosCount = count($request->input('existing_photos', []));
        $sessionPhotos = session('uploaded_photos', []);
        $totalPhotos = $totalUploadedPhotos + $existingPhotosCount + count($sessionPhotos);
       
        if (!$isBasic && $totalPhotos < 3) {
            return response()->json([
                'errors' => ['photos' => ['Please upload at least 3 photos.']]
            ], 422);
        }

        if ($totalPhotos > 20) {
            return response()->json([
                'errors' => ['photos' => ['You can upload a maximum of 20 photos']]
            ], 422);
        }
        //End ---- Add manual check PHOTO condition
        
        //  Custom Conditional Validation Logic (after validate())
        $allCategories = $request->input('service_category', []);
        $allCountries = $request->input('country', []);
        $allPorts = $request->input('port', []);
        $errors = [];

        foreach ($allCategories as $groupIndex => $categoryGroup) {
            if ($groupIndex == 0) continue; // Skip the first group — already validated

            $hasAnyCategory = collect($categoryGroup)->filter()->isNotEmpty();
            
            if ($hasAnyCategory) {
                $country = $allCountries[$groupIndex] ?? null;
                $port = $allPorts[$groupIndex] ?? null;

                if (empty($country)) {
                    $errors["country.$groupIndex"] = "Please select country.";
                }

                if (empty($port)) {
                    $errors["port.$groupIndex"] = "Please select port.";
                }
                
            }
        }

        if (!empty($errors)) {
            // Return custom validation errors to the frontend
            return response()->json(['errors' => $errors], 422);
        }

        //************** */ Save or update subscription table  FIRST ****************************************/
        // Try to find an existing active subscription for the same plan against user id
        $activeSubscription = Subscription::where('user_id', $userId)
            ->where('plan_id', $planId)
            ->where('end_date', '>', Carbon::now())
            ->latest('created_at')
            ->first();

        if ($activeSubscription) {
            $subscriptionId = $activeSubscription->id; // Use existing active subscription
        } else {
            // No active subscription found, create a new one
            $startDate = Carbon::now();
            $octFirst = Carbon::create($startDate->year, 10, 1);
            if ($planId == 2 && $startDate->lt($octFirst)) {
                // If plan is 2 and current date is before Oct 1, set end date to Oct 1
                $endDate = $startDate->lt($octFirst) ? $octFirst : $startDate->copy()->addYear();
            } else {
                $endDate = $startDate->copy()->addYear();
            }

            $newSubscription = Subscription::create([
                'user_id' => $userId,
                'plan_id' => $planId,
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);
            $subscriptionId = $newSubscription->id;
        }
        //*******************************************/

        // Save Contact Details
        ContactDetail::updateOrCreate(
            ['user_id' => $userId],
            $request->only(['alternative_email', 'office_telephone', 'mobile_number', 'whatsapp_number','has_emergency_contact','emergency_contact_number'])
        );

        // Save Social Media
        SocialMediaDetail::updateOrCreate(
            ['user_id' => $userId],
            $request->only(['linkedin', 'instagram', 'twitter'])
        );

        /**************** Save certificates ***************/
        // Step 1: Decode existing stored certificates
        $existingCertsInDb = $companyDetail && $companyDetail->certificates
            ? json_decode($companyDetail->certificates, true)
            : [];

        // Step 2: Get user-submitted retained certificates
        $retainedCerts = $request->input('existing_cert', []);

        // Step 3: Delete certificates that are no longer retained
        $certsToDelete = array_diff($existingCertsInDb, $retainedCerts);
        foreach ($certsToDelete as $file) {
            Storage::disk('public')->delete($file);
        }

        // Step 4: Initialize certPaths with retained certificates
        $certPaths = $retainedCerts;

        // Step 5: Add newly uploaded certificates
        if ($request->hasFile('certificates')) {
            foreach ($request->file('certificates') as $cert) {
                if ($cert->isValid()) {
                    $path = $cert->store("certificates/{$userId}", 'public');
                    $certPaths[] = $path;
                }
            }
        }

        // Merge session-uploaded certificates
        $sessionCerts = session('uploaded_certificates', []);
        $certPaths = array_merge($certPaths, $sessionCerts);

        /********* Save photo ********/
        // Step 1: Decode existing stored photos
        $existingPhotosInDb = $companyDetail && $companyDetail->photos
            ? json_decode($companyDetail->photos, true)
            : [];

        // Step 2: Get user-submitted retained photos
        $retainedPhotos = $request->input('existing_photos', []);

        // Step 3: Delete files that are no longer retained
        $filesToDelete = array_diff($existingPhotosInDb, $retainedPhotos);
        foreach ($filesToDelete as $file) {
            Storage::disk('public')->delete($file);
        }

        // Step 4: Initialize photoPaths with retained photos
        $photoPaths = $retainedPhotos;

        // Step 5: Add newly uploaded photos
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                if ($file->isValid()) {
                    $path = $file->store("photos/{$userId}", 'public');
                    $photoPaths[] = $path;
                }
            }
        }

        // Merge session-uploaded photos
        $sessionPhotos = session('uploaded_photos', []);
       
        $photoPaths = array_merge($photoPaths, $sessionPhotos);

        CompanyDetail::updateOrCreate(
            ['user_id' => $userId],
            [
                'slogan' => $request->slogan,
                'about' => $request->about,
                'brands' => $request->brands,
                'reference_shipowners' => $request->reference_shipowners,
                'certificates' => json_encode($certPaths),
                'photos' => json_encode($photoPaths),
            ]
        );

        // Save Port-Service Details
        if ($request->has('country') && is_array($request->country)) {
            $portCategoryCount = []; // Track how many new categories are being added per port

            // Check if user has an active subscription
            $activeSubscription = Subscription::where('user_id', $userId)
                ->where('end_date', '>=', now())
                ->first();

            foreach ($request->country as $blockIndex => $country) {
                $port = $request->port[$blockIndex] ?? null;
                $serviceCategories = $request->service_category[$blockIndex] ?? [];

                foreach ($serviceCategories as $serviceIndex => $categoryId) {

                    // Skip saving if required fields are missing
                    if (empty($country) || empty($port) || empty($categoryId)) {
                        continue;
                    }

                    // Get ID if it’s an update
                    $detailId = $request->port_service_detail_id[$blockIndex][$serviceIndex] ?? null;

                    // Count how many existing categories already saved in DB for this port 
                    // Count current entries only if the subscription is active
                    $existingCount = 0;
                    if ($activeSubscription) {
                        $existingCount = PortServiceDetail::where('user_id', $userId)
                            ->where('port_id', $port)
                            ->when($detailId, function ($query) use ($detailId) {
                                return $query->where('id', '!=', $detailId); // skip updating record
                            })
                            ->count();
                    }

                    // Track how many new ones we're adding in this request
                    $portCategoryCount[$port] = isset($portCategoryCount[$port])
                        ? $portCategoryCount[$port] + 1
                        : 1;

                    // Total count = existing DB + this request
                    if (($existingCount + $portCategoryCount[$port]) > 15) {
                        return response()->json([
                            'errors' => ["port.$blockIndex" => "Only 15 service categories are allowed per port."]
                        ], 422);
                    }    

                    $subServices = $request->sub_services[$blockIndex][$serviceIndex] ?? [];

                    $additionalInfo = $request->additional_info[$blockIndex][$serviceIndex] ?? null;
                    


                    if ($detailId) {
                        PortServiceDetail::where('id', $detailId)
                            ->where('user_id', $userId)
                            ->update([
                                'country_id' => $country,
                                'port_id' => $port,
                                'category_id' => $categoryId,
                                'sub_services' => $subServices,
                                'additional_info' => $additionalInfo,
                                'subscription_id' => $subscriptionId,
                                'updated_at' => now(),
                            ]);
                    } else {
                        PortServiceDetail::create([
                            'user_id' => $userId,
                            'country_id' => $country,
                            'port_id' => $port,
                            'category_id' => $categoryId,
                            'sub_services' => $subServices,
                            'additional_info' => $additionalInfo,
                            'subscription_id' => $subscriptionId,
                        ]);
                    }
                }
            }
        }
        
        // ---------- CLEANUP SESSION ----------
        session()->forget('uploaded_photos');
        session()->forget('uploaded_certificates');
      
        
        return redirect()->back()->with('success', 'Membership form saved successfully!');
    }



public function uploadPhoto(Request $request)
{
    $userId = auth()->id();

    // $request->validate([
    //     'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
    // ]);

    // Load existing session & DB photos
    $sessionPhotos = session()->get('uploaded_photos', []);
    $dbPhotos = [];

    $company = CompanyDetail::where('user_id', $userId)->first();
    if ($company && $company->photos) {
        $dbPhotos = json_decode($company->photos, true);
    }

    $totalPhotos = count($sessionPhotos) + count($dbPhotos);
    if ($totalPhotos >= 20) {
        return response()->json([
            'errors' => ['photos' => ['You can upload a maximum of 20 photos.']]
        ], 422);
    }

    // Save the photo
    $file = $request->file('photo');
    $path = $file->store("photos/{$userId}", 'public');

    $sessionPhotos[] = $path;
    session()->put('uploaded_photos', $sessionPhotos);

    return response()->json([
        'status' => 'success',
        'path' => $path,
        'url' => asset('storage/' . $path)
    ]);
}

public function deletePhoto(Request $request)
{
    $photoToRemove = $request->input('photo'); // should be the path like 'photos/1/example.jpg'

    $sessionPhotos = session()->get('uploaded_photos', []);

    // Remove the selected photo from session array
    $updatedPhotos = array_filter($sessionPhotos, function ($path) use ($photoToRemove) {
        return $path != $photoToRemove;
    });

    $reindexedPhotos = array_values($updatedPhotos);
    session()->put('uploaded_photos', $reindexedPhotos);

    return response()->json(['status' => 'success']);
}




public function uploadCertificate(Request $request)
{
    $userId = auth()->id();

    $request->validate([
        'certificate' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048'
    ]);

    $sessionCerts = session()->get('uploaded_certificates', []);
    $company = CompanyDetail::where('user_id', $userId)->first();
    $dbCerts = $company && $company->certificates ? json_decode($company->certificates, true) : [];

    if ((count($sessionCerts) + count($dbCerts)) >= 20) {
        return response()->json([
            'errors' => ['certificate' => ['You can upload a maximum of 20 certificates.']]
        ], 422);
    }

    $file = $request->file('certificate');
    $path = $file->store("certificates/{$userId}", 'public');

    $sessionCerts[] = $path;
    session()->put('uploaded_certificates', $sessionCerts);

    return response()->json([
        'status' => 'success',
        'path' => $path,
        'url' => asset('storage/' . $path)
    ]);
}

public function deleteCertificate(Request $request)
{
    $photoToRemove = $request->input('certificate');

    $sessionCerts = session()->get('uploaded_certificates', []);

    $updated = array_filter($sessionCerts, function ($path) use ($photoToRemove) {
        return $path !== $photoToRemove;
    });

    session()->put('uploaded_certificates', array_values($updated));

    return response()->json(['status' => 'success']);
}






    // save membership form with auto save
    public function autoSave(Request $request, $section)
    {
        $userId = auth()->id();
        $data = $request->except('_token');

        // Define validation rules for each section
        $rules = [];

        switch ($section) {
            case 'contact':
                $rules = [
                    'alternative_email' => 'nullable|email',
                    'office_telephone' => 'required|regex:/^[0-9 +]+$/|max:20',
                    'mobile_number'    => 'required|regex:/^[0-9 +]+$/|max:20',
                    'whatsapp_number'  => 'nullable|regex:/^[0-9 +]+$/|max:20',
                ];
                break;

            case 'social':
                $rules = [
                    'linkedin' => 'nullable|url',
                    'instagram' => 'nullable|url',
                    'twitter' => 'nullable|url',
                ];
                break;

            case 'company':
                // get company details first
                $companyDetail = CompanyDetail::where('user_id', $userId)->first();

                $hasPhotos = $companyDetail && !empty(json_decode($companyDetail->photos, true));

                $rules = [
                    'slogan' => 'required|string',
                    'about' => 'required|string',
                    'brands' => 'nullable|string',
                    'reference_shipowners' => 'nullable|string',

                    'certificates' => 'nullable|array',
                    'certificates.*' => 'file|mimes:pdf,jpeg,png,jpg|max:1024',

                    'photos' => ($hasPhotos ? 'nullable' : 'required') .'|array|min:3',
                    'photos.*' => 'image|mimes:jpeg,png,jpg|max:1024',
                ];
                break;

            case 'port':
                $rules = [
                    'country_id.*' => 'required|string',
                    'port_id.*' => 'required|string',
                    'category_id.*.*' => 'required|integer',
                    'sub_services.*.*' => 'nullable|array',
                    'sub_services.*.*.*' => 'integer',
                    'additional_info.*.*' => 'nullable|string',
                ];
                break;    

            default:
                return response()->json(['status' => 'error', 'message' => 'Invalid section'], 400);
        }

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

            switch ($section) {
                case 'contact':
                    ContactDetail::updateOrCreate(['user_id' => $userId], $data);
                    break;

                case 'social':
                    SocialMediaDetail::updateOrCreate(['user_id' => $userId], $data);
                    break;

                case 'company':
                    // Get company details first
                    $companyDetail = CompanyDetail::where('user_id', $userId)->first();

                    // Initialize placeholders
                    $photoPaths = [];
                    $certPaths = [];

                    // Handle photos
                    if ($request->hasFile('photos')) {
                        // Delete old photos
                        if ($companyDetail && $companyDetail->photos) {
                            foreach (json_decode($companyDetail->photos, true) as $oldPhoto) {
                                Storage::disk('public')->delete($oldPhoto);
                            }
                        }

                        // Save new photos
                        foreach ($request->file('photos') as $photo) {
                            $photoPaths[] = $photo->store('uploads/photos', 'public');
                        }

                        $data['photos'] = json_encode($photoPaths); // Update with new photos
                    } else {
                        // Keep existing photos
                        $data['photos'] = $companyDetail->photos ?? json_encode([]);
                    }

                    // Handle certificates
                    if ($request->hasFile('certificates')) {
                        // Delete old certificates
                        if ($companyDetail && $companyDetail->certificates) {
                            foreach (json_decode($companyDetail->certificates, true) as $oldCert) {
                                Storage::disk('public')->delete($oldCert);
                            }
                        }

                        // Save new certificates
                        foreach ($request->file('certificates') as $cert) {
                            $certPaths[] = $cert->store('uploads/certificates', 'public');
                        }

                        $data['certificates'] = json_encode($certPaths); // Update with new certs
                    } else {
                        // Keep existing certificates
                        $data['certificates'] = $companyDetail->certificates ?? json_encode([]);
                    }

                    // Finally, save or update
                    CompanyDetail::updateOrCreate(['user_id' => $userId], $data);
                    break;

                case 'port':
                    foreach ($request->country as $blockIndex => $country) {
                    $port = $request->port[$blockIndex];
                    $serviceCategories = $request->service_category[$blockIndex] ?? [];

                    foreach ($serviceCategories as $serviceIndex => $categoryId) {
                        $subServices = isset($request->sub_services[$blockIndex][$serviceIndex])
                            ? json_encode($request->sub_services[$blockIndex][$serviceIndex])
                            : json_encode([]);

                        $additionalInfo = $request->additional_info[$blockIndex][$serviceIndex] ?? null;
                        $detailId = $request->port_service_detail_id[$blockIndex][$serviceIndex] ?? null;
                        // Update if record exists, else create
                        // PortServiceDetail::updateOrCreate(
                        //     [
                        //         'user_id' => $userId,
                        //         'country_id' => $country,
                        //         'port_id' => $port,
                        //         'category_id' => $categoryId,                           
                        //     ],
                        //     [
                                
                        //         'sub_services' => $subServices,
                        //         'additional_info' => $additionalInfo,
                        //     ]
                        // );

                        if ($detailId) {
                            // Update existing
                            PortServiceDetail::where('id', $detailId)
                                ->where('user_id', $userId)
                                ->update([
                                    'country_id' => $country,
                                    'port_id' => $port,
                                    'category_id' => $categoryId,
                                    'sub_services' => $subServices,
                                    'additional_info' => $additionalInfo,
                                    'updated_at' => now(),
                                ]);
                        } else {
                            // Create new
                            PortServiceDetail::create([
                                'user_id' => $userId,
                                'country_id' => $country,
                                'port_id' => $port,
                                'category_id' => $categoryId,
                                'sub_services' => $subServices,
                                'additional_info' => $additionalInfo,
                            ]);
                        }
                    }
                }

                    break;    

            }

            return response()->json(['status' => 'success']);
    }



}
