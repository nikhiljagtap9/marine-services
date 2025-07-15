<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::orderBy('name')->get();
        return view('admin.countries.index', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:countries,name',
        ]);

        $country = Country::create(['name' => $request->name]);

        
            return response()->json([
                'status' => true,
                'message' => 'Country added successfully',
                'country' => $country
            ]);
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return response()->json($country);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:countries,name,' . $id,
        ]);

        $country = Country::findOrFail($id);
        $country->update(['name' => $request->name]);

        return response()->json(['message' => 'Country updated successfully.']);
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete(); // Soft delete
        return response()->json(['message' => 'Country deleted successfully.']);
    }


    public function getCountries()
    {
        $countries = Country::withCount('ports')->latest()->get();

        return response()->json([
            'data' => $countries
        ]);
    }
}
