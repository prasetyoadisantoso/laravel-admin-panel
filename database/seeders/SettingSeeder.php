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
                'value' => 'assets/Image/Brand/laravel-logo.png'
            ],

            [
                'id' => '2',
                'name' => 'Site Favicon',
                'value' => 'assets/Image/Brand/laravel-logo.png'
            ],

            [
                'id' => '3',
                'name' => 'Site Name',
                'value' => 'Laravel Administrator Panel'
            ],

            [
                'id' => '4',
                'name' => 'Site Description',
                'value' => 'Administrator panel made with vanilla Laravel & AdminLTE. Feel free to using this panel.'
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
                'value' => '<i class="bi bi-facebook text-primary"></i> https://facebook.com/laravel-admin'
            ],

            [
                'id' => '12',
                'name' => 'Social Instagram',
                'value' => '<i class="bi bi-instagram text-danger"></i> https://instagram.com/laravel-admin'
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
                'value' => '<h1>FAQ</h1><p>Omnis libero debitis vitae. Labore quo sint illum facilis esse vitae rerum praesentium. Rerum saepe doloribus voluptatem quisquam. Esse ut voluptatum. Ipsum eos veniam quaerat est provident nihil fuga cum.</p>'
            ],

            [
                'id' => '15',
                'name' => 'About Us',
                'value' => '<h1>About Us</h1><p>Placeat ad consequuntur. Illo rem aliquid est et laboriosam perspiciatis corrupti voluptatem. Eveniet amet voluptate eum consequatur vel non iste modi. Voluptates eaque nisi in reiciendis. Eum sint autem qui at rem. Est aut eum sit aspernatur ea corrupti.</p>'
            ],

            [
                'id' => '16',
                'name' => 'Cookies Concern',
                'value' => 'Illum aut consequatur et assumenda temporibus quos.'
            ],
            /* End Additional Page */

            /* SEO */
            [
                'id' => '17',
                'name' => 'Meta Description',
                'value' => 'Author: A.N. Author, Description: This is description for SEO, Category: Website Development'
            ],
            [
                'id' => '18',
                'name' => 'Google Site Verification',
                'value' => '+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34='
            ],
            /* End SEO */



        ]);
    }
}
