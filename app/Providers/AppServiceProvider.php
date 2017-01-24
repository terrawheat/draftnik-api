<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ITokenService;
use App\Services\TokenService;

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
        $this->app->bind(ITokenService::class, TokenService::class);
    }
}
