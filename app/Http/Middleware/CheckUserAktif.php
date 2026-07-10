<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserAktif
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Avoid infinite redirect loop
        if ($request->is('nonaktif')) {
            return $next($request);
        }

        if (Auth::check() && Auth::user()->status === 'nonaktif') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('auth.nonaktif');
        }

        return $next($request);
    }
}
