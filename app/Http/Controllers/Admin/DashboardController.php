<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\GlobalCounter;
use App\Repositories\GlobalFunction;

class DashboardController extends Controller
{
    /**
     * First gateway with middleware, spatie, localization, etc.
     *
     * @return void
     */
    public function __construct()
    {
        /* Authentication Permissions*/
        $this->middleware(['auth', 'verified']);
        $this->middleware('permission:user-home')->only(['index']);
        $this->middleware('permission:user-create')->only(['create', 'store']);
        $this->middleware('permission:user-edit')->only(['edit', 'update']);
        $this->middleware('permission:user-delete')->only(['destroy']);

        /* Global Function */
        GlobalFunction::global();

        /* Global Counter */
        GlobalCounter::global();
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
