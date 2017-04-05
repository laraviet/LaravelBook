<?php

namespace Laraviet\LaravelBook;

use Illuminate\Support\ServiceProvider;
use Laraviet\LaravelBook\Helpers\Constants;
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
        $package_name = Constants::PACKAGE;

        //routes
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        //view
        $this->loadViewsFrom(__DIR__.'/resources/views', $package_name);
        $this->publishes([
                __DIR__.'/resources/views' => resource_path('views/vendor/' . $package_name),
            ]);

        //migrations
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        /*
        |--------------------------------------------------------------------------
        | Route Providers need on boot() method, others can be in register() method
        |--------------------------------------------------------------------------
        */
        $this->app->register(BookRouteServiceProvider::class);

        /*
        |--------------------------------------------------------------------------
        | Register menu
        |--------------------------------------------------------------------------
        */
        $frontend_menu = \Menu::get('frontend');
        $frontend_menu->add('Books', '#');
        $frontend_menu->item('books')->add('List', ['route' => 'books.index']);
        $frontend_menu->item('books')->add('Create', ['route' => 'books.create']);
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