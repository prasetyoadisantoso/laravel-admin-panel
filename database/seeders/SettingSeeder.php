<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Setting content
        DB::table('settings')->insert([

            /* Start General */

            [
                'id' => '1',
                'name' => 'Site Logo',
                'value' => 'laravel-logo.png'
            ],

            [
                'id' => '2',
                'name' => 'Site Favicon',
                'value' => 'laravel-logo.png'
            ],

            [
                'id' => '3',
                'name' => 'Site Name',
                'value' => 'Laravel Administrator Panel'
            ],

            [
                'id' => '4',
                'name' => 'Site Description',
                'value' => 'Administrator panel made by vanilla Laravel & AdminLTE. Fell free to using this panel.'
            ],

            [
                'id' => '5',
                'name' => 'Site URL',
                'value' => 'https://example.com'
            ],

            [
                'id' => '6',
                'name' => 'Google Analytic ID',
                'value' => 'UA-123456-7'
            ],

            [
                'id' => '7',
                'name' => 'Google Tag Manager',
                'value' => 'GTM-12345'
            ],

            [
                'id' => '8',
                'name' => 'Contact Email',
                'value' => 'admin@system.io'
            ],

            [
                'id' => '9',
                'name' => 'Contact Address',
                'value' => 'Openstreet ST, 12 , Arkansas'
            ],

            [
                'id' => '10',
                'name' => 'Contact Phone',
                'value' => '+6287111223334'
            ],

            [
                'id' => '11',
                'name' => 'Social Facebook',
                'value' => 'https://facebook.com/laravel-admin'
            ],

            [
                'id' => '12',
                'name' => 'Social Instagram',
                'value' => 'https://instagram.com/laravel-admin'
            ],

            [
                'id' => '13',
                'name' => 'Copyright',
                'value' => 'Copyright &copy; Laravel Administrator Panel | 2021'
            ],

            /* End General */



            /* Start Additional Page */
            [
                'id' => '14',
                'name' => 'FAQ',
                'value' => ''
            ],

            [
                'id' => '15',
                'name' => 'About Us',
                'value' => ''
            ],

            [
                'id' => '16',
                'name' => 'Cookies Concern',
                'value' => ''
            ],
            /* End Additional Page */

        ]);
    }
}