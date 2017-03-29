<?php

namespace Laraviet\LaravelBook\Providers;

use Illuminate\Support\Facades\Route;
use Laraviet\DDDCore\App\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'Laraviet\LaravelBook\Http\Controllers';
    protected $dir = __DIR__;
}
