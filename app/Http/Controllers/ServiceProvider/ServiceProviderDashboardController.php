<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceProviderDashboardController extends Controller
{
    public function index()
    {
        return view('service-provider.dashboard.index'); 
    }

}
