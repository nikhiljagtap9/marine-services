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
use Illuminate\Support\Facades\Auth;
use App\Models\ContactDetail;
use App\Models\SocialMediaDetail;
use App\Models\CompanyDetail;
use App\Models\PortServiceDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class ServiceProviderDetailController extends Controller
{
    // Show the create form
    public function create()
    {
        $countries = Country::all();
        $ports = Port::with('country')->get();
        $categories = Category::all();
        return view('service-provider.create',compact('countries','ports','categories'));
    }

     // Store submitted data
    public function store(Request $request)
    {
        
        $request->validate([
             // User credentials
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',

             // Company details
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'company_description' => 'nullable|string',
            'contact_person_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'office_address' => 'required|string',
            'ports_services' => 'required|string',
            'service_type' => 'required|string',
            'sub_service_type' => 'required|string',
            'contact_number' => 'nullable|string|max:20',
        ]);

       // dd($request);

        // 1. Create User
        $user = User::create([
            'name' => $request->contact_person_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'service_provider'
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
            'phone' => $request->phone,
           // 'email' => $request->email,
            'country' => $request->country,
            'city' => $request->city,
            'office_address' => $request->office_address,
            'ports_services' => $request->ports_services,
            'service_type' => $request->service_type,
            'sub_service_type' => $request->sub_service_type,
            'contact_number' => $request->contact_number,
        ]);

        session(['registration_success' => true]);
        // Log the user in after registration
        Auth::login($user);
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

    public function getCities($country_id) {
       $cities = City::where('country_id', $country_id)->get();
       return response()->json($cities);
    }

    public function getSubService($service_id){
       $subCategories = SubCategory::where('category_id', $service_id)->get();
       return response()->json($subCategories);
    }

    public function membership() {

        $userId = auth()->id();

        $contact = ContactDetail::where('user_id', $userId)->first();
        $social = SocialMediaDetail::where('user_id', $userId)->first();
        $company = CompanyDetail::where('user_id', $userId)->first();
        $countries = Country::all();
        $ports = Port::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();

        // Fetch existing service detail records for this user
        $portServiceDetails = PortServiceDetail::where('user_id', $userId)->get();

         // Group by country_id and port_id as key
        $groupedServiceDetails = $portServiceDetails->groupBy(function ($item) {
            return $item->country_id . '_' . $item->port_id;
        });

        // Organize IDs into a nested array for hidden input mapping
        $existingIds = [];
        // foreach ($portServiceDetails as $i => $detail) {
        //     // You must calculate block & service index based on your logic
        //     $blockIndex = 0;
        //     $serviceIndex = $i;
        //     $existingIds[$blockIndex][$serviceIndex] = $detail->id;
        // }

        foreach ($groupedServiceDetails as $blockIndex => $serviceGroup) {
            foreach ($serviceGroup as $serviceIndex => $service) {
                $existingIds[$blockIndex][$serviceIndex] = $service->id;
            }
        }

        // Ensure at least one empty section if no data exists
        if ($groupedServiceDetails->isEmpty()) {
            $groupedServiceDetails = collect([
                '0_0' => [null] // null = placeholder for a single empty service
            ]);
        }

        return view('service-provider.membership', compact('contact', 'social', 'company','countries','ports','categories','subCategories','groupedServiceDetails','existingIds'));
        
    }

    // save membership form with direct method
    public function membershipForm(Request $request)
    {
        $userId = auth()->id();

        // get company details first
        $companyDetail = CompanyDetail::where('user_id', $userId)->first();

        $hasPhotos = $companyDetail && !empty(json_decode($companyDetail->photos, true));

        // Validate all inputs
        $request->validate([
            // Contact
            'alternative_email' => 'nullable|email',
            'office_telephone' => 'required|regex:/^[0-9]+$/|max:20',
            'mobile_number'    => 'required|regex:/^[0-9]+$/|max:20',
            'whatsapp_number'  => 'nullable|regex:/^[0-9]+$/|max:20',
            'has_emergency_contact' => 'required|boolean',
            'emergency_contact_number' => 'nullable|required_if:has_emergency_contact,1',
            
            // Social
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',

            // Company
            'slogan' => 'required|string|max:255',
            'about' => 'required|string|max:500',
            'brands' => 'nullable|string',
            'reference_shipowners' => 'nullable|string',

            'certificates' => 'nullable|array',
            'certificates.*' => 'file|mimes:pdf,jpeg,png,jpg|max:1024',

            'photos' => [
                $hasPhotos ? 'nullable' : 'required',
                'array',
                'min:3',
            ],
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:1024',

            // Port Services
            'country.*' => 'required|string',
            'port.*' => 'required|string',
            'service_category.*.*' => 'required|integer',
            'sub_services.*.*' => 'nullable|array',
            'sub_services.*.*.*' => 'integer',
            'additional_info.*.*' => 'nullable|string',
        ],[
            'emergency_contact_number.required_if' => 'Please enter an emergency contact number if you selected Yes.',
        ]);

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

        // Save Company Details (with files)
        $certPaths = [];
        if ($request->hasFile('certificates')) {

            // Delete old certificates if they exist
            if ($companyDetail && $companyDetail->certificates) {
                foreach (json_decode($companyDetail->certificates) as $oldCert) {
                    Storage::disk('public')->delete($oldCert);
                }
            }

            // Save new ones
            foreach ($request->file('certificates') as $cert) {
                $certPaths[] = $cert->store('certificates', 'public');
            }
        }else {
            // Preserve existing photos
            $certPaths = $companyDetail ? json_decode($companyDetail->certificates, true) : [];
        }

        $photoPaths = [];
        if ($request->hasFile('photos')) {
            // Delete old photos if they exist
            if ($companyDetail && $companyDetail->photos) {
                foreach (json_decode($companyDetail->photos) as $oldPhoto) {
                    Storage::disk('public')->delete($oldPhoto);
                }
            }
             // Save new ones
            foreach ($request->file('photos') as $photo) {
                $photoPaths[] = $photo->store('photos', 'public');
            }
        }else {
            // Preserve existing photos
            $photoPaths = $companyDetail ? json_decode($companyDetail->photos, true) : [];
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
            foreach ($request->country as $blockIndex => $country) {
                $port = $request->port[$blockIndex] ?? null;
                $serviceCategories = $request->service_category[$blockIndex] ?? [];

                foreach ($serviceCategories as $serviceIndex => $categoryId) {
                    $subServices = isset($request->sub_services[$blockIndex][$serviceIndex])
                        ? json_encode($request->sub_services[$blockIndex][$serviceIndex])
                        : json_encode([]);

                    $additionalInfo = $request->additional_info[$blockIndex][$serviceIndex] ?? null;
                    $detailId = $request->port_service_detail_id[$blockIndex][$serviceIndex] ?? null;

                    if ($detailId) {
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
        }

        return redirect()->back()->with('success', 'Membership form saved successfully!');
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
                    'office_telephone' => 'required|regex:/^[0-9]+$/|max:20',
                    'mobile_number'    => 'required|regex:/^[0-9]+$/|max:20',
                    'whatsapp_number'  => 'nullable|regex:/^[0-9]+$/|max:20',
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
                    'slogan' => 'required|string|max:255',
                    'about' => 'required|string|max:500',
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
