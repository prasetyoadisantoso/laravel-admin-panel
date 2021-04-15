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
         * From Module
         *
         * @return module
         */
        $module = new GlobalFunction();
        if (!empty($module->module())) {
            view()->share('module', $module->module());
        } else {
            view()->share('module', __('sidebar.module_empty'));
        }




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

    /* Render Module to front-end */
    public function module()
    {
        /* Get Content from module file in root */
        $json = file_get_contents(base_path('modules_statuses.json'));
        $jsonLow = strtolower($json);
        $modules = json_decode($jsonLow, true);

        return $modules;
    }

}
