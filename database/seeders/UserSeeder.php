<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert Inital User Here
        DB::table('users')->insert([

            // Super Admin
            [
                'id' => '0c7c66496-32cf-476b-a5b4-d47d9723d9',
                'name' => 'Super Admin',
                'image' => 'image-1.jpg',
                'email' => 'admin@system.io',
                'password' => Hash::make('123456'),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],

            // Client
            [
                'id' => '1ba52599d-0049-4921-9715-7ae411f188',
                'name' => 'Client One',
                'image' => 'image-2.jpg',
                'email' => 'client-one@system.io',
                'password' => Hash::make('123456'),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],

        ]);
    }
}
