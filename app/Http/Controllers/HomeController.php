<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('index',compact('countries','categories'));
    }
}
