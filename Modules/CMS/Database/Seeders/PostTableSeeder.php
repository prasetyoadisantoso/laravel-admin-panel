<?php

namespace Modules\CMS\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
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
        DB::table('posts')->insert([

            /* First Post */
            [
                'id' => 'd2bff68f-f90a-41a5-9180-be492c139921',
                'image' => null,
                'title' => 'My First Title',
                'content' => 'Ut expedita aliquid voluptatem ut. Error consectetur iste voluptatem tempore.',
                'created_at' => date("Y-m-d H:i:s"),
            ],

            /* Second Post */
            [
                'id' => 'b2bff68l-g90a-41a2-9180-ce492c139923',
                'image' => null,
                'title' => 'My Second Title',
                'content' => 'Aliquam culpa perspiciatis earum fugit ratione et esse. Corrupti delectus est similique fugiat temporibus.',
                'created_at' => date("Y-m-d H:i:s"),
            ],


        ]);
    }
}
