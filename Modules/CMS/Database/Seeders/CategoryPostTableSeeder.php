<?php

namespace Modules\CMS\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('category_posts')->insert([

            [
                'post_id' => 'd2bff68f-f90a-41a5-9180-be492c139921',
                'category_id' => '12bff68f-a90a-a1a5-a180-be492c139921',
            ],

            [
                'post_id' => 'd2bff68f-f90a-41a5-9180-be492c139921',
                'category_id' => 'a2cff68l-190a-11a2-1180-fe492c519923',
            ],

            [
                'post_id' => 'b2bff68l-g90a-41a2-9180-ce492c139923',
                'category_id' => 'a2cff68l-190a-11a2-1180-fe492c519923',
            ],

        ]);
    }
}
