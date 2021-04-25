<?php

namespace Modules\CMS\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class CMSPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //Insert list of permissions here
        $permissions = [
            'cms-access',
            'post-home',
            'post-create',
            'post-edit',
            'post-delete',
            'category-home',
            'category-create',
            'category-edit',
            'category-delete',
         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }

    }
}
