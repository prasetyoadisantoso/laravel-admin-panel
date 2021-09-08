<?php

namespace App\Http\Controllers\API\v1\Admin;

use App\Http\Controllers\API\v1\ApiController as Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        return $this->successResponse(['login_at' => Carbon::now()->format('d M Y')], 'Successfully Log In to Dashboard');
    }
}
