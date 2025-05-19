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
        $countries = Country::all();
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

    public function getCities()
    {
        $cities = City::with('country')->latest()->get();

        return response()->json([
            'data' => $cities
        ]);
    }
}
