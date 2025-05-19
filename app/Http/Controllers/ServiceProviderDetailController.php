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


}
