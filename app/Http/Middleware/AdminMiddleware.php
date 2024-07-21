<?php

// Create a new middleware using the following command:
// php artisan make:middleware AdminMiddleware

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'Admin') {
            return $next($request);
        }

        return redirect()->route('dashboard.index');
    }
}

