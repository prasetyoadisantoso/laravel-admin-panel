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
     * First Gateway and Boot
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

        /* Throw to 404 page if type not exist */
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


    /* Store, Update for Legal Page */
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
}
