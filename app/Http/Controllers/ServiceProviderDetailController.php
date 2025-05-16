<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceProviderDetailController extends Controller
{
    // Show the create form
    public function create()
    {
        return view('service-provider.create'); // Make sure this Blade file exists
    }

     // Store submitted data
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'company_description' => 'nullable|string',
            'contact_person_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'office_address' => 'required|string',
            'ports_services' => 'required|string',
            'service_type' => 'required|string',
            'sub_service_type' => 'required|string',
            'contact_number' => 'required|string|max:20',
        ]);

        $logoPath = null;
        if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('logos', 'public');
        }

        ServiceProviderDetail::create([
            'user_id' => Auth::id(),
            'company_name' => $request->company_name,
            'company_logo' => $logoPath,
            'company_description' => $request->company_description,
            'contact_person_name' => $request->contact_person_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'city' => $request->city,
            'office_address' => $request->office_address,
            'ports_services' => $request->ports_services,
            'service_type' => $request->service_type,
            'sub_service_type' => $request->sub_service_type,
            'contact_number' => $request->contact_number,
        ]);

        return redirect()->route('dashboard')->with('success', 'Service provider details submitted successfully.');
    }
}
