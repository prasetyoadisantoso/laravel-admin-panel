<?php

namespace App\Repositories;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;

class GlobalFunction

{

    /**
     * Global function for render data to front-end
     *
     * @return global
     */
    public static function global()
    {
        /* Localization */
        view()->share('current_locale', LaravelLocalization::getCurrentLocale());

        /* Route Name */
        view()->share('route_name', Route::currentRouteName());

        /* Member Verified */
        view()->share('member_verified', Carbon::now()->isoFormat('Y MMMM D') );
    }

}
