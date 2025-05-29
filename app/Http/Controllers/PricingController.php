<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan; // assuming you have a Plan model

class PricingController extends Controller
{
    public function index()
    {
        $plans = Plan::all(); // fetch all plans
        return view('pricing', compact('plans'));
    }
}
