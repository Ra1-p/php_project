<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return $this->handleAuthenticated($request);
        }

        return $next($request);
    }

    public function handleAuthenticated($request)
    {
        if ($request->is('/') || $request->is('login')){
            return redirect()->route('profile', Auth::id());
        }
        return redirect('login');
    }
}
