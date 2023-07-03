<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request  $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect('admin/dashboard');
            } elseif ($user->role === 'doctor') {
                return redirect('doctor/home1');
            } elseif ($user->role === 'patient') {
                return redirect('patient/home');
            }
        }

        return $next($request);
    }
}
