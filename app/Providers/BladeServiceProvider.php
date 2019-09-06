<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            if (!Auth::check()) return false;
            return Auth::user()->role == User::ADMIN;
        });

        Blade::if('subscriber', function () {
            if (!Auth::check()) return false;
            return Auth::user()->role == User::SUBSCRIBER;
        });

        Blade::if('member', function () {
            if (!Auth::check()) return false;
            return Auth::user()->role == User::MEMBER;
        });

        Blade::if('guest', function () {
            return !Auth::check();
        });

        Blade::if('auth', function () {
            return Auth::check();
        });

        Blade::if('route', function ($name) {
            return Route::currentRouteName() == $name;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
