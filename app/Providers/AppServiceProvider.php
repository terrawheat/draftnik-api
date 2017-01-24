<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $request = app('request');

        // ALLOW OPTIONS METHOD
        if ($request->getMethod() === 'OPTIONS') {
            app()->options($request->path(), function () {
                return response('OK', 200)
                    ->header('Access-Control-Allow-Origin', '*')
                    ->header('Access-Control-Allow-Methods', 'OPTIONS, GET, POST, PUT, DELETE')
                    ->header('Access-Control-Allow-Headers', 'Content-Type, Origin');
            });
        }
    }
}
