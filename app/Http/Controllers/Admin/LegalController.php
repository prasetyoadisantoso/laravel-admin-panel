<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LegalFormRequest;
use Illuminate\Http\Request;
use App\Repositories\AdminGlobalFunction;
use App\Models\Legal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware(['auth', 'verified', 'admin']);
        $this->middleware('permission:legal-get', ['only' => 'getType']);
        $this->middleware('permission:legal-save', ['only' => 'saveType']);

        /* Global Function */
        AdminGlobalFunction::global();
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
        } catch (\Throwable $th) {
            DB::rollback();
            $error_message = $th->getMessage();
            $this->LogMail($error_message);
            return redirect()->back()->with([
                'error' => $th->getMessage()
            ])->withInput();
        }

        return redirect()->back()->with([
            'success' => __('legal.notification.update_success')
        ]);
    }
}
