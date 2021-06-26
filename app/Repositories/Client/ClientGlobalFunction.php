<?php

namespace App\Repositories\Client;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;
use App\Models\Setting;


class ClientGlobalFunction{

    /* Site Name */
    public function SiteName()
    {
        return view()->share('site_name', Setting::where('id', 3)->pluck('value')->first());
    }

    /* Site Description */
    public function SiteDescription()
    {
        return view()->share('site_description', Setting::where('id', 4)->pluck('value')->first());
    }


    /* Current Locale */
    public function CurrentLocale()
    {
        return view()->share('current_locale', LaravelLocalization::getCurrentLocale());
    }

    /* Route Name */
    public function RouteName()
    {
        return view()->share('route_name', Route::currentRouteName());
    }

    /* Site Logo */
    public function SiteLogo()
    {
        return view()->share('site_logo', Setting::where('id', 1)->pluck('value')->first());
    }

    /* Site Favicon */
    public function SiteFavicon()
    {
        return view()->share('favicon', Setting::where('id', 2)->pluck('value')->first());
    }

    /* Site Copyright */
    public function SiteCopyright()
    {
        return view()->share('copyright', Setting::where('id', 13)->pluck('value')->first());
    }

    /* -------------------------------------------------------------------------- */
    /*                             Return All Function                            */
    /* -------------------------------------------------------------------------- */
    public static function ReturnAllFunction()
    {
        $value = new ClientGlobalFunction();
        $array = (object)[
            'SiteName' => $value->SiteName(),
            'SiteDescription' => $value->SiteDescription(),
            'CurrentLocale' => $value->CurrentLocale(),
            'RouteName' => $value->RouteName(),
            'SiteLogo' => $value->SiteLogo(),
            'SiteFavicon' => $value->SiteFavicon(),
            'SiteCopyright' => $value->SiteCopyright(),
        ];
        return $array;
    }

}
