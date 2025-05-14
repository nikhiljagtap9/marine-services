<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        // Ensure that the user is authenticated as an admin
        $this->middleware('auth:admin');
    }

    public function index()
    {
        // get details for admin using guard
        // this define in auth.php
        $user =  Auth::guard('admin')->user();

        // If user is not an admin, you can redirect them to the login page
        if (!$user || !$user->isAdmin()) {
            return redirect()->route('admin.login');
        }

        return view('admin.dashboard');
    }
}

