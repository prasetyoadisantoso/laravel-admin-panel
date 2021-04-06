<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insert to table model_has_roles for connect user with roles
        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_type' => 'App\Models\User',
                'model_id' => '0c7c66496-32cf-476b-a5b4-d47d9723d9'
            ],

            [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => '1ba52599d-0049-4921-9715-7ae411f188'
            ],

        ]);
    }
}
