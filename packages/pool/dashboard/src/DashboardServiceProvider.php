<?php

namespace Pool\Dashboard;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'dashboard');
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
