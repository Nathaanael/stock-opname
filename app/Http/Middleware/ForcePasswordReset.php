<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ForcePasswordReset
{
    /**
     * Handle an incoming request.
     * Redirect users who must reset their password.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->must_reset_password) {
            // Allow access to password reset and logout routes
            if (!$request->routeIs('password.reset', 'password.update', 'logout')) {
                return redirect()->route('password.reset');
            }
        }

        return $next($request);
    }
}
