<?php

namespace Laraviet\LaravelBook;

use Illuminate\Support\ServiceProvider;
use Laraviet\DDDBook\DDDBookServiceProvider;
use Laraviet\LaravelBook\Providers\RouteServiceProvider as BookRouteServiceProvider;

class LaravelBookServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $package_name = 'laravel-book';

        //routes
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        //view
        $this->loadViewsFrom(__DIR__.'/resources/views', 'laravel-book');
        $this->publishes([
                __DIR__.'/resources/views' => resource_path('views/vendor/laravel-book'),
            ]);

        //migrations
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        /*
        |--------------------------------------------------------------------------
        | Route Providers need on boot() method, others can be in register() method
        |--------------------------------------------------------------------------
        */
        $this->app->register(BookRouteServiceProvider::class);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        /*
        |--------------------------------------------------------------------------
        | 3rd Service Providers
        |--------------------------------------------------------------------------
        */
        $this->app->register(DDDBookServiceProvider::class);
    }
}