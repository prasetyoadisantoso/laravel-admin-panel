<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //Insert to table model_has_roles for connect user with roles
        DB::table('legals')->insert([

            [
                'id' => 1,
                'type' => 'privacy-policy',
                'description' => '<h1>Privacy Policy Title</h1><p>This is Privacy & Policy</p>'
            ],

            [
                'id' => 2,
                'type' => 'terms-conditions',
                'description' => '<h1>Terms & Conditions Title</h1><p>This is Terms & Conditions</p>'
            ],

            [
                'id' => 3,
                'type' => 'disclaimer',
                'description' => '<h1>Disclaimer Title</h1><p>This is Disclaimer</p>'
            ],

        ]);
    }
}
