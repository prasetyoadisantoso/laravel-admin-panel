<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\Falsifying;
use App\Http\Requests\UserFormRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
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
        $this->middleware('permission:user-home')->only(['index']);
        $this->middleware('permission:user-create')->only(['create', 'store']);
        $this->middleware('permission:user-edit')->only(['edit', 'update']);
        $this->middleware('permission:user-delete')->only(['destroy']);
        $this->middleware(['auth', 'verified']);

        /* Global Function */
        GlobalFunction::global();
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
