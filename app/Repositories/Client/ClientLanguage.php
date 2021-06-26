<?php

namespace App\Repositories\Client;

class ClientLanguage
{

    /* Place content to header section */
    public function HeaderSection()
    {
        return (object)[
            'Content' => (object)[
                'Home' => __('client.homepage.header.home'),
                'MyAccount' => __('client.homepage.header.my_account'),
                'TermsConditions' => __('client.homepage.header.terms_conditions'),
                'Login' => __('client.homepage.header.login'),
                'Register' => __('client.homepage.header.register'),
                'Logout' => __('client.homepage.header.logout'),
            ]
        ];
    }

    /* Place content to main content section */
    public function ContentSection()
    {
        return (object)[
            'Content' => (object)[
                'Title' => __('client.homepage.content.title'),
                'Description' => __('client.homepage.content.description'),
                'SiteLogo' => __('client.homepage.content.site_logo'),
            ]
        ];
    }

    /* Place content to footer section */
    public function FooterSection()
    {
        return (object)[
            'Content' => (object)[
                'Home' => __('client.homepage.header.home'),
                'MyAccount' => __('client.homepage.header.my_account'),
            ]
        ];
    }


    /* Return All Language */
    public static function ReturnAllLanguage()
    {
        $value = new ClientLanguage();
        $array = (object)[
            'Header' => $value->HeaderSection(),
            'MainContent' => $value->ContentSection(),
            'Footer' => $value->FooterSection(),
        ];
        return $array;
    }
}
