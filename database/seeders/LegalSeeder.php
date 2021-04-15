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
                'description' => 'Content privacy policy'
            ],

            [
                'id' => 2,
                'type' => 'terms-conditions',
                'description' => 'Content terms & conditions'
            ],

            [
                'id' => 3,
                'type' => 'disclaimer',
                'description' => 'Content disclaimer'
            ],

        ]);
    }
}
