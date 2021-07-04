<?php

namespace App\Repositories;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;
use App\Models\Setting;
use App\Models\Legal;


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

    /* SEO Description */
    public function MetaDescription()
    {
        return view()->share('meta_description', Setting::where('id', 17)->pluck('value')->first());
    }

    /* SEO Google Site Verification */
    public function MetaGoogleSiteVerification()
    {
        return view()->share('google_site_description', Setting::where('id', 18)->pluck('value')->first());
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

    /* Social Facebook */
    public function SocialFacebook()
    {
        return view()->share('social_facebook', Setting::where('id', 11)->pluck('value')->first());
    }

    /* Social Instagram */
    public function SocialInstagram()
    {
        return view()->share('social_instagram', Setting::where('id', 12)->pluck('value')->first());
    }

    /* Site Copyright */
    public function SiteCopyright()
    {
        return view()->share('site_copyright', Setting::where('id', 13)->pluck('value')->first());
    }

    /* Site FAQ */
    public function SiteFaq()
    {
        return view()->share('site_faq', Setting::where('id', 14)->pluck('value')->first());
    }

    /* Site Terms */
    public function SiteTerms()
    {
        return view()->share('site_terms', Legal::where('id', 2)->pluck('description')->first());
    }

    /* Privacy Policy */
    public function SitePrivacy()
    {
        return view()->share('site_privacy', Legal::where('id', 1)->pluck('description')->first());
    }

    /* Disclaimer */
    public function SiteDisclaimer()
    {
        return view()->share('site_disclaimer', Legal::where('id', 3)->pluck('description')->first());
    }

    /* About Us */
    public function SiteAboutUs()
    {
        return view()->share('site_about_us', Setting::where('id', 15)->pluck('value')->first());
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
            'MetaDescription' => $value->MetaDescription(),
            'MetaGoogleSiteVerification' => $value->MetaGoogleSiteVerification(),
            'CurrentLocale' => $value->CurrentLocale(),
            'RouteName' => $value->RouteName(),
            'SiteLogo' => $value->SiteLogo(),
            'SiteFavicon' => $value->SiteFavicon(),
            'SiteCopyright' => $value->SiteCopyright(),
            'SocialFacebook' => $value->SocialFacebook(),
            'SocialInstagram' => $value->SocialInstagram(),
            'SiteCopyright' => $value->SiteCopyright(),
            'SiteFaq' => $value->SiteFaq(),
            'SiteTerms' => $value->SiteTerms(),
            'SitePrivacy' => $value->SitePrivacy(),
            'SiteDisclaimer' => $value->SiteDisclaimer(),
            'SiteAboutUs' => $value->SiteAboutUs(),
        ];
        return $array;
    }

}
