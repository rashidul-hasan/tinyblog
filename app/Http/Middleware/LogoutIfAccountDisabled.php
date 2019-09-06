<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LogoutIfAccountDisabled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()){
            if (!Auth::user()->is_enabled) {
                Auth::logout();
                return redirect(url('login'))->with('warning', 'Your account is currently disabled. Please contact site admin');
            }
        }
        return $next($request);
    }
}
