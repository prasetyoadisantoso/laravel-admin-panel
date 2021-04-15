<?php

namespace App\Repositories;

use App\Models\User;
use Spatie\Permission\Models\Role;

class GlobalCounter

{

    /* Global Function */
    public static function global()
    {
          /**
           * Counter Module
           *
           * @return counter module
           */
          $counter = new GlobalCounter();

          /* Module Total */
          view()->share('module_counter', $counter->moduleCounter());

          /* User Total */
          view()->share('user_counter', $counter->userCounter());

          /* Role Total */
          view()->share('role_counter', $counter->roleCounter());

    }

    /* Module Counter */
    public function moduleCounter()
    {
        $json = file_get_contents(base_path('modules_statuses.json'));
        $string = json_decode($json, true);
        return count($string);
    }

    /* User Counter */
    public function userCounter()
    {
        $total = User::count();
        return $total;
    }

    /* Role Counter */
    public function roleCounter()
    {
        $total = Role::count();
        return $total;
    }
}
