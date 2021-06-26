<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Client\ClientGlobalFunction;
use App\Repositories\Client\ClientLanguage;

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
            'language' => $language
        ]);
    }
}
