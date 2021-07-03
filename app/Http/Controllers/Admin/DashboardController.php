<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\AdminGlobalCounter;
use App\Repositories\AdminGlobalFunction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * First gateway with middleware, spatie, localization, etc.
     * @return void
     */
    public function __construct()
    {
        /* Authentication Permissions*/
        $this->middleware(['auth', 'verified', 'admin']);
        $this->middleware('permission:user-home')->only(['index']);
        $this->middleware('permission:user-create')->only(['create', 'store']);
        $this->middleware('permission:user-edit')->only(['edit', 'update']);
        $this->middleware('permission:user-delete')->only(['destroy']);

        /* Global Function */
        AdminGlobalFunction::global();

        /* Global Counter */
        AdminGlobalCounter::global();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dashboard = true;
        return view('admin.dashboard.index')->with([
            'dashboard_page' => $dashboard
        ]);
    }

}
