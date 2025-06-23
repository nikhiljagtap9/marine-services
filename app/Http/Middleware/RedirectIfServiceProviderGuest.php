<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfServiceProviderGuest
{
    public function handle(Request $request, Closure $next)
    {
        // If not logged in and accessing the membership route
        if (!Auth::check() && $request->is('service-provider/membership')) {
            session()->put('show_provider_register', true);

            // Redirect to login and preserve intended URL
            return redirect()->guest(route('login'));
        }

        return $next($request);
    }
}



