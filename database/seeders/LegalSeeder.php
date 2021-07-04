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
                'description' => '<h1>Privacy Policy</h1><p>Facilis molestiae et eos provident odit numquam vero a placeat. Eius fugiat natus eius quae. Non unde aut commodi voluptatem voluptatem iste vel facilis sed. Saepe sapiente pariatur repudiandae et ipsum neque ea. Placeat enim modi in cupiditate modi quia praesentium mollitia nihil. Excepturi nobis deserunt ea amet atque. Sunt nisi doloribus. Laborum dolor odit commodi aliquid commodi qui alias repudiandae. Quod officia quos ratione culpa. Sequi nostrum nesciunt et. Dignissimos nisi sint molestiae officia veniam labore ratione. Fugiat eos numquam laudantium ut qui perferendis. Et et et voluptas voluptates neque aspernatur. Tempore neque sit quidem quidem aut est perspiciatis aut. Sint beatae animi.</p>'
            ],

            [
                'id' => 2,
                'type' => 'terms-conditions',
                'description' => '<h1>Terms & Conditions</h1><p>Nihil repellendus aut dolores facere voluptatibus eius est maxime dolores. Molestiae ut dolore doloribus. Incidunt et nostrum quod et qui sunt nesciunt harum architecto. Earum eveniet iure sunt possimus est necessitatibus. Commodi adipisci voluptates corrupti. Dolore autem nulla quidem ut libero dignissimos recusandae nobis accusantium. Et esse laboriosam in consectetur minima. Deleniti nulla aut. Iusto architecto rerum omnis nulla et sunt. Sed et minima magnam voluptatem dolores temporibus. In iste sapiente ut qui omnis soluta. Commodi est quo consequuntur hic nesciunt. Ad illum ab voluptatem tenetur consectetur. Ex laborum nisi quia porro esse magnam velit est. Pariatur ut magnam dolores.</p>'
            ],

            [
                'id' => 3,
                'type' => 'disclaimer',
                'description' => '<h1>Disclaimer</h1><p>Ea incidunt quia est quas est impedit. Dicta veritatis iure sapiente itaque corporis. Sit cumque soluta sunt sint adipisci culpa ea ea. Cupiditate explicabo voluptas sed quisquam quia ut. Ducimus porro reprehenderit odit. Fugit magni nam. Pariatur reprehenderit ut provident et vero. Consequuntur consequatur dignissimos a laudantium est. Dolor eligendi iure minus et cupiditate. Qui et quam. Maiores temporibus omnis nisi exercitationem velit. Nisi sed qui aliquam vel illum voluptatem. Animi reiciendis reprehenderit debitis. Expedita laboriosam libero. Quod doloremque earum odio. Debitis repudiandae consectetur velit et error architecto praesentium.</p>'
            ],

        ]);
    }
}
