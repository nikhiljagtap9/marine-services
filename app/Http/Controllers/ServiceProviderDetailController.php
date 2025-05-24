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

        $contact = \App\Models\ContactDetail::where('user_id', $userId)->first();
        $social = \App\Models\SocialMediaDetail::where('user_id', $userId)->first();
        $company = \App\Models\CompanyDetail::where('user_id', $userId)->first();

        return view('service-provider.membership', compact('contact', 'social', 'company'));
        
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
                $rules = [
                    'slogan' => 'required|string|max:255',
                    'about' => 'required|string|max:500',
                    'brands' => 'nullable|string',
                    'reference_shipowners' => 'nullable|string',

                    'certificates' => 'nullable|array',
                    'certificates.*' => 'file|mimes:pdf,jpeg,png,jpg|max:1024',

                    'photos' => 'required|array|min:3',
                    'photos.*' => 'image|mimes:jpeg,png,jpg|max:1024',
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
                    // get company details first
                    $companyDetail = CompanyDetail::where('user_id', $userId)->first();
                  //  dd($companyDetail->photos);
                    // Delete old photos if new ones are uploaded
                    if ($request->hasFile('photos') && $companyDetail && $companyDetail->photos) {
                        foreach (json_decode($companyDetail->photos) as $oldPhoto) {
                            Storage::disk('public')->delete($oldPhoto);
                        }
                    }

                    // Delete old certificates if new ones are uploaded
                    if ($request->hasFile('certificates') && $companyDetail && $companyDetail->certificates) {
                        foreach (json_decode($companyDetail->certificates) as $oldCert) {
                            Storage::disk('public')->delete($oldCert);
                        }
                    }

                    // Save new photos
                    $photoPaths = [];
                    if ($request->hasFile('photos')) {
                        foreach ($request->file('photos') as $photo) {
                            $photoPaths[] = $photo->store('uploads/photos', 'public');
                        }
                    }

                    $certPaths = [];
                    if ($request->hasFile('certificates')) {
                        foreach ($request->file('certificates') as $cert) {
                            $certPaths[] = $cert->store('uploads/certificates', 'public');
                        }
                    }

                    // Now merge file paths into data
                    $data['photos'] = json_encode($photoPaths);
                    $data['certificates'] = json_encode($certPaths);
                    
                    CompanyDetail::updateOrCreate(['user_id' => $userId], $data);
                    break;

                default:
                    return response()->json(['status' => 'error', 'message' => 'Invalid section'], 400);
            }

            return response()->json(['status' => 'success']);
    }



}
