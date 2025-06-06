<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Port;
use App\Models\Country;

class PortController extends Controller
{
    public function index()
    {
        $ports = Port::with('country')->orderBy('name')->get();
        $countries = Country::orderBy('name')->get();
        $googleMapsKey = config('services.google_maps.key');
        return view('admin.ports.index', compact('ports','countries','googleMapsKey'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

         $port = Port::create($request->all());

        
        return response()->json([
            'status' => true,
            'message' => 'Port added successfully',
            'port' => $port
        ]);
    }

    public function getPorts()
    {
        $ports = Port::with('country')->latest()->get();

        return response()->json([
            'data' => $ports
        ]);
    }
}
