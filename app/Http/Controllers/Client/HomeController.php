<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Repositories\ClientGlobalFunction;
use App\Repositories\ClientLanguage;

class HomeController extends Controller
{
    public function __construct()
    {
        /* Client Global Function */
        $this->ClientGlobalFunction = ClientGlobalFunction::ReturnAllFunction();

        /* Client Language Function */
        $this->ClientLanguage = ClientLanguage::ReturnAllLanguage();

    }

    /* Home Page */
    public function HomePage()
    {
        $global = $this->ClientGlobalFunction;
        $language = $this->ClientLanguage;
        return view('client.content.home', [
            'global' => $global,
            'language' => $language,
        ]);
    }

    public function FaqPage()
    {
        $SiteFaq = true;
        $global = $this->ClientGlobalFunction;
        $language = $this->ClientLanguage;
        return view('client.content.page', [
            'global' => $global,
            'language' => $language,
            'faq_page' => $SiteFaq,
        ]);
    }

    public function TermsPage()
    {
        $SiteTerms = true;
        $global = $this->ClientGlobalFunction;
        $language = $this->ClientLanguage;
        return view('client.content.page', [
            'global' => $global,
            'language' => $language,
            'terms_page' => $SiteTerms,
        ]);
    }

    public function PrivacyPage()
    {
        $SitePrivacy = true;
        $global = $this->ClientGlobalFunction;
        $language = $this->ClientLanguage;
        return view('client.content.page', [
            'global' => $global,
            'language' => $language,
            'privacy_page' => $SitePrivacy,
        ]);
    }

    public function DisclaimerPage()
    {
        $SiteDisclaimer = true;
        $global = $this->ClientGlobalFunction;
        $language = $this->ClientLanguage;
        return view('client.content.page', [
            'global' => $global,
            'language' => $language,
            'disclaimer_page' => $SiteDisclaimer,
        ]);
    }
}
