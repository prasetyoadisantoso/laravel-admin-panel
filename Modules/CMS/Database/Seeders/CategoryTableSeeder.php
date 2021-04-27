<?php

namespace Modules\CMS\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        /* Posts */
        DB::table('categories')->insert([

            /* First Post */
            [
                'id' => '12bff68f-a90a-a1a5-a180-be492c139921',
                'title' => 'Uncategorized',
                'description' => 'Ut ratione libero ullam quaerat ut ea omnis magnam.',
                'created_at' => date("Y-m-d H:i:s"),
            ],

            /* Second Post */
            [
                'id' => 'a2cff68l-190a-11a2-1180-fe492c519923',
                'title' => 'Category 1',
                'description' => 'Rerum dolorum odio non distinctio velit aut eaque ad.',
                'created_at' => date("Y-m-d H:i:s"),
            ],

        ]);
    }
}
