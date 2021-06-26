<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Falsifying;
use App\Http\Requests\UserFormRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Repositories\GlobalFunction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * First gateway with middleware, spatie, localization, etc.
     *
     * @return void
     */
    public function __construct()
    {
        /* Authentication */
        $this->middleware(['auth', 'verified']);
        $this->middleware('permission:role-home')->only(['index']);
        $this->middleware('permission:user-create')->only(['create', 'store']);
        $this->middleware('permission:user-edit')->only(['edit', 'update']);
        $this->middleware('permission:user-delete')->only(['destroy']);

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
        $user = true;
        return view('admin.user.index')->with([
            'user_page' => $user
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
        $users = User::all();
        $result = Datatables::of($users)
            ->addColumn('image', function (User $user) {
                return Storage::url($user->image);
            })
            ->addColumn('roles', function (User $user) {
                return $user->getRoleNames()->map(function ($item) {
                    return $item;
                })->implode('<br>');
            })
            ->addColumn('action', function ($user) {
                return '<button type="button" class="btn btn-md btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . __('user.datatable.action') . '<i class="fas fa-cog ml-2"></i></button> <div class="dropdown-menu dropdown-menu-right"> <button class="dropdown-item text-success show-user" href="/user/' . Falsifying::falsify($user->id) . '" id="modal"><i class="far fa-eye mr-3"></i>' . __('user.datatable.show') . '</button> <a class="dropdown-item text-primary" href="' . route('user.edit', Falsifying::falsify($user->id)) . '"><i class="fas fa-pen-square mr-3"></i>' . __('user.datatable.edit') . '</a> <a class="dropdown-item text-red" href="' . route('user.destroy', Falsifying::falsify($user->id)) . '" id="delete"><i class="fas fa-trash mr-3"></i>' . __('user.datatable.delete') . '</a></div>';
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

        /* Get all role */
        $role = Role::all();


        /* Result */
        return view('admin.user.form')->with([
            'create_section' => $create_section,
            'role' => $role,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        /* Validating Request */
        $request->validated();
        $input = $request->all();

        /* Image Processing */
        if ($request->hasFile('image')) {
            $names = $request->file('image')->getClientOriginalName();
            $imagePath = 'assets/Image/User/';
            Storage::putFileAs('public/' . $imagePath, $request->file('image'), $names);
            $input['image'] = $imagePath . $names;
        }

        /* Checkbox Status */
        if ($request->status == 'on') {
            $input['email_verified_at'] = date("Y-m-d");
        } else {
            $input['email_verified_at'] = null;
        }

        /* Hashing Password */
        $input['password'] = Hash::make($input['password']);

        /* Check if image not available */
        if (!isset($input['image'])) {
            $input['image'] = '';
        }

        /* Store Transaction */
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'email_verified_at' => $input['email_verified_at'],
                'image' => $input['image'],
                'password' => $input['password'],
                'confirm-password' => $input['confirm-password']
            ]);
            $user->assignRole($request->input('roles'));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            /* Send error message to storage/logs/error.txt */
            $error_message = $th->getMessage();
            File::put(storage_path('logs/error.txt'), $error_message);

            return redirect()->back()->with('error', $th->getMessage());
        }

        return redirect()->route('user.index')
            ->with('success', __('user.notification.store_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* Get an User */
        $users = User::find(Falsifying::truthy($id));

        /* Get Role from an User */
        $role = $users->getRoleNames();

        /* Check if user has confirmed */
        if ($users->hasVerifiedEmail()) {
            $status = 'Confirmed';
        } else {
            $status = 'Not Confirmed';
        }

        /* Collect value to return */
        $user = [$users, $role, $status];

        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* 'Edit' Variable checker */
        $edit_section = true;

        /* Get User by ID */
        $user = User::findOrFail(Falsifying::truthy($id));

        /* Get Role from current User */
        $value = $user->getRoleNames();
        foreach ($value as $item) {
            $current_role = $item;
        }

        /* Get all role */
        $role = Role::all();

        /* Check Verify User */
        if ($user->email_verified_at == null) {
            $status = '';
        } else {
            $status = 'checked';
        }

        return view('admin.user.form')->with([
            'id' => $user->id,
            'full_name' => $user->name,
            'email' => $user->email,
            'current_role' => $current_role,
            'role' => $role,
            'image' => $user->image,
            'edit_section' => $edit_section,
            'status' => $status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {

        /* Validating Request */
        $request->validated();
        $input = $request->all();

        /* Request Checkbox Status */
        if ($request->status == 'on') {
            $input['email_verified_at'] = date("Y-m-d");
        } else {
            $input['email_verified_at'] = null;
        }

        /* Check if password same with old */
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        /* Store Transaction */
        DB::beginTransaction();
        try {

            /* Get data from User */
            $user = User::find($id);

            /* Check file and delete */
            $imagePath = 'assets/Image/User/';
            Storage::delete('/public' . '/' . $user->image);

            /* Image Processing */
            if ($request->hasFile('image')) {
                $names = $request->file('image')->getClientOriginalName();
                Storage::putFileAs('public/' . $imagePath, $request->file('image'), $names);
                $input['image'] = $imagePath . $names;
            }

            /* Update data to User */
            $user->update($input);
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->input('roles'));

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            /* Send error message to storage/logs/error.txt */
            $error_message = $th->getMessage();
            File::put(storage_path('logs/error.txt'), $error_message);

            return redirect()->back()->with('error', $error_message);
        }

        return redirect()->route('user.index')
            ->with('success', __('user.notification.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* Get data from User */
        $user = User::find(Falsifying::truthy($id));
        Storage::delete('/public' . '/' . $user->image);

        /* Delete an User */
        $delete = User::where('id', Falsifying::truthy($id))->delete();

        /* Check file and delete */

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = __('user.notification.delete_success');
        } else {
            $success = true;
            $message = __('user.notification.delete_failed');
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
