<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::with('country')->get();
        $countries = Country::orderBy('name')->get();
        return view('admin.cities.index', compact('cities','countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

         $city = City::create($request->all());

        
        return response()->json([
            'status' => true,
            'message' => 'City added successfully',
            'city' => $city
        ]);
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return response()->json($city);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        $city = City::findOrFail($id);
        $city->update($request->only(['name', 'country_id']));

        return response()->json(['message' => 'City updated successfully.']);
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete(); // Soft delete
        return response()->json(['message' => 'City deleted successfully.']);
    }


    public function getCities()
    {
        $cities = City::with('country')->latest()->get();

        return response()->json([
            'data' => $cities
        ]);
    }
}
