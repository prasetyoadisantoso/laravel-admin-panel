<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Repositories\GlobalFunction;
use DB;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
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
        $setting = true;

        $logo_tab = Setting::where('id', '<=', 2)->get();
        $general_tab = Setting::where('id', '>', 2)->take(10)->get();
        $additional_tab = Setting::orderBy('id', 'DESC')->take(4)->get()->reverse();

        return view('admin.setting.index')->with([
            'logo_tab' => $logo_tab,
            'general_tab' => $general_tab,
            'additional_tab' => $additional_tab,
            'setting_page' => $setting
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $settings = Setting::find($id);

        return $settings;
    }

    public function edit($id)
    {
        $settings = Setting::find($id);

        return $settings;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $settings = Setting::find($id);
        $input = $request->all();

        /* Store Transaction */
        DB::beginTransaction();

        try {
            if (isset($input['value'])) {
                $settings->value = $input['value'];
                $settings->save();
            } else {
                if ($request->hasFile('image')) {
                    $names = $request->file('image')->getClientOriginalName();
                    $request->file('image')->move(public_path() . '/assets/Image/Brand/', $names);
                    $input['image'] = $names;
                    $settings->value = $input['image'];
                }
                $settings->save();
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            /* Send error message to storage/logs/error.txt */
            $error_message = $th->getMessage();
            File::put(storage_path('logs/error.txt'), $error_message);

            return redirect()->back()->with('error', $error_message);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
