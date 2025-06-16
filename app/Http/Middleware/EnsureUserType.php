<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserType
{
    public function handle(Request $request, Closure $next, $type)
    {
        if (!Auth::check() || Auth::user()->user_type !== $type) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}

