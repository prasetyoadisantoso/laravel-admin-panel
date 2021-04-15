<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Specify roles here
        DB::table('roles')->insert([

            [
                'name' => 'Administrator',
                'guard_name' => 'web'
            ],

            [
                'name' => 'Client',
                'guard_name' => 'web'
            ],

        ]);
    }
}
