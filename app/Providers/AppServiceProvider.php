<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
// use Laravel\Passport\Passport;
// use Laravel\Passport\Client;
use Webpatser\Uuid\Uuid;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Mcamara\LaravelLocalization\LaravelLocalization as LaravelLocalizationLaravelLocalization;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Sanctum::ignoreMigrations;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(225);
        Blade::withoutComponentTags();
        Paginator::useBootstrap();

        // Get User Active
        $this->app['events']->listen(Authenticated::class, function ($e) {
            view()->share('user', $e->user);
        });

    }
}
