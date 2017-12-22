<?php

namespace Pool\Ride;

use Illuminate\Support\ServiceProvider;

class RideServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'ride');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
       include __DIR__ . '/routes.php';
    }
}
