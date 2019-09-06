<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->loadViewsFrom(__DIR__.'/../Site/Resources/views', 'site');

        // this is a fix specific to cloudflare, when site loaded via https with cloudflare,
        // Laravel can't detect https & all the asset & url helper function calls fails to
        // automatically convert the link/url to https
        // note: HTTP_X_FORWARDED_PROTO field in $_SERVER is added by cloudflare
        if(array_key_exists('HTTP_X_FORWARDED_PROTO', $_SERVER) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
