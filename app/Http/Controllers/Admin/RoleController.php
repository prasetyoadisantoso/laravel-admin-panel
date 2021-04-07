<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleFormRequest;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Falsifying;
use App\Repositories\GlobalFunction;
use DB;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    /**
     * First gateway with middleware, spatie, localization, etc.
     *
     * @return void
     */
    public function __construct()
    {
        /* Authentication */
        $this->middleware('permission:role-home')->only(['index']);
        $this->middleware('permission:user-create')->only(['create', 'store']);
        $this->middleware('permission:user-edit')->only(['edit', 'update']);
        $this->middleware('permission:user-delete')->only(['destroy']);
        $this->middleware(['auth', 'verified']);

        GlobalFunction::global();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = true;
        return view('admin.role.index')->with([
            'role_page' => $role
        ]);
    }

    /**
     * Display User Table with DataTables
     *
     * @return
     */
    public function index_dt()
    {
        /* Render data to datatable */
        $roles = Role::all();
        $result = Datatables::of($roles)
            ->addColumn('action', function ($user) {
                return '<button type="button" class="btn btn-md btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . __('user.datatable.action') . '<i class="fas fa-cog ml-2"></i></button> <div class="dropdown-menu dropdown-menu-right"> <button class="dropdown-item text-success show-user" href="/role/' . Falsifying::falsify($user->id) . '" id="modal"><i class="far fa-eye mr-3"></i>' . __('user.datatable.show') . '</button> <a class="dropdown-item text-primary" href="' . route('role.edit', Falsifying::falsify($user->id)) . '"><i class="fas fa-pen-square mr-3"></i>' . __('user.datatable.edit') . '</a> <a class="dropdown-item text-red" href="'. route('role.destroy', Falsifying::falsify($user->id)) .'" id="delete"><i class="fas fa-trash mr-3"></i>' . __('user.datatable.delete') . '</a></div>';
            })
            ->removeColumn('id')->addIndexColumn()->make('true');

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* 'Create' Variable Checker */
        $create_section = true;

        /* Get all permission */
        $permission = Permission::get();


        /* Result */
        return view('admin.role.form')->with([
            'create_section' => $create_section,
            'permission' => $permission,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleFormRequest $request)
    {
        /* Validating request from RoleFormRequest */
        $request->validated();

        DB::beginTransaction();

        try {
            /* Store Role Process */
            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));
            DB::commit();
        } catch (\Throwable $th) {
            /* Error Message */
            DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
        }

        return redirect()->route('role.index')
            ->with('success', __('role.notification.store_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* Get an Role */
        $roles = Role::find(Falsifying::truthy($id));
        $permission = $roles->permissions;

        $role_permission = [$roles, $permission];

        return $role_permission;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* Get Value Roles and Permissions */
        $edit_section = true;
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermission = DB::table('role_has_permissions')
            ->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.role.form')->with([
            'edit_section' => $edit_section,
            'role' => $role,
            'permission' => $permission,
            'rolePermission' => $rolePermission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleFormRequest $request, $id)
    {
        /* Validating from RoleFormRequest */
        $request->validated();

        DB::beginTransaction();
        try {
            /* Update Roles and Permissions */
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();
            $role->syncPermissions($request->input('permission'));
            DB::commit();
        } catch (\Throwable $th) {
            /* Error Message */
            DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
        }

        return redirect()->route('role.index')
            ->with('success', __('role.notification.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* Delete an Roles */
        $delete = Role::where('id', $id)->delete();

        /* check data deleted or not */
        if ($delete == 1) {
            $success = true;
            $message = __('role.notification.delete_success');
        } else {
            $success = true;
            $message = __('role.notification.delete_failed');
        }

        /* Return response */
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
