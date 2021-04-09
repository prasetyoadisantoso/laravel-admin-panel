<?php

namespace App\Repositories;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use App\Models\Setting;

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


        /**
         * From Settings
         *
         * @return site_logo, copyright
         */

        /* Site Logo */
        view()->share('site_logo', Setting::where('id', 1)->pluck('value')->first());

        /* Site Favicon */
        view()->share('favicon', Setting::where('id', 2)->pluck('value')->first());

        /* Site Name */
        view()->share('site_name', Setting::where('id', 3)->pluck('value')->first());

        /* Site Copyright */
        view()->share('copyright', Setting::where('id', 13)->pluck('value')->first());

    }

}
