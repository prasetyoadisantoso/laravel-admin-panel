<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LegalFormRequest;
use Illuminate\Http\Request;
use App\Repositories\GlobalFunction;
use App\Models\Legal;
use Illuminate\Support\Facades\DB;

class LegalController extends Controller
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
     * Get Legal Page
     *
     * @return title, type, description
     */
    public function getType($type)
    {
        /* Legal input checker */
        $selected = ['terms-conditions', 'disclaimer', 'privacy-policy'];

        if (!in_array($type, $selected)) {
            abort(404);
        }

        /* Content Description */
        $description = Legal::where('type', $type)->first();

        /* Translatable */
        $title_translate = __('legal.content');
        $title = $title_translate[$type];

        return view('admin.legal.index')->with([
            'page_title' => $title,
            'page_type' => $type,
            'page_description' => $description->description,
        ]);
    }


    public function saveType(LegalFormRequest $request)
    {
        DB::beginTransaction();

        try {
            Legal::updateOrCreate(
                ['type' =>  $request->type],
                ['description' =>  $request->description]
            );

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();

            return redirect()->back()->with([
                'error' => $exception->getMessage()
            ])->withInput();
        }

        return redirect()->back()->with([
            'success' => __('legal.notification.update_success')
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
