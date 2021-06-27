<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * The logged in user.
     *
     */
    protected $currentUser;

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->currentUser = Auth::User();
        View::share([ 'currentUser' => $this->currentUser ]);
    }
}
