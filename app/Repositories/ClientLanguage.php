<?php

namespace App\Repositories;

class ClientLanguage
{

    /* Place content to header section */
    public function HeaderSection()
    {
        return (object)[
            'Content' => __('client.homepage.header')
        ];
    }

    /* Place content to main content section */
    public function ContentSection()
    {
        return (object)[
            'Content' => __('client.homepage.content')
        ];
    }

    /* Place content to footer section */
    public function FooterSection()
    {
        return (object)[
            'Content' => __('client.homepage.footer')
        ];
    }


    /* Return All Language */
    public static function ReturnAllLanguage()
    {
        $value = new ClientLanguage();
        $array = (object)[
            'HeaderSection' => $value->HeaderSection(),
            'ContentSection' => $value->ContentSection(),
            'FooterSection' => $value->FooterSection(),
        ];
        return $array;
    }
}
