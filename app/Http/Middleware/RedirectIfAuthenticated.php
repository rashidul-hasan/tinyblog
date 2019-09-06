<?php

namespace App\Http\Middleware;

use App\Models\User;
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
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->check()) {
            switch (Auth::guard($guard)->user()->role) {
                case User::ADMIN:
                    return redirect()->route('admin.dashboard');
                    break;
                default:
                    return redirect('/');
                    break;
            }
        }



        return $next($request);
    }
}
