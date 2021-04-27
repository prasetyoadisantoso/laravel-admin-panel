<?php

namespace Modules\CMS\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repositories\GlobalFunction;
use Modules\CMS\Entities\Category;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Falsifying;
use Illuminate\Support\Facades\DB;
use Modules\CMS\Http\Requests\CategoryFormRequest;

class CategoriesController extends Controller
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
    }

    /**
     * Display Category Table with DataTables
     *
     * @return
     */
    public function index_dt()
    {
        /* Render data to datatable */
        $categories = Category::all();
        $result = Datatables::of($categories)
            ->addColumn('categories', function (Category $categories) {
                return $categories;
            })
            ->addColumn('action', function ($categories) {
                return '<button type="button" class="btn btn-md btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . __('cms::post.datatable.action') . '<i class="fas fa-cog ml-2"></i></button> <div class="dropdown-menu dropdown-menu-right"> </button> <a class="dropdown-item text-primary" href="' . route('categories.edit', Falsifying::falsify($categories->id)) . '"><i class="fas fa-pen-square mr-3"></i>' . __('cms::post.datatable.edit') . '</a> <a class="dropdown-item text-red" href="' . route('categories.destroy', Falsifying::falsify($categories->id)) . '" id="delete"><i class="fas fa-trash mr-3"></i>' . __('cms::post.datatable.delete') . '</a></div>';
            })
            ->removeColumn('id')->addIndexColumn()->make('true');

        return $result;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        /* Check Category Home Page */
        $category = true;
        return view('cms::categories.index')->with([
            'category_page' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        /* Check Create Section */
        $create = true;

        return view('cms::categories.form')->with([
            'create_section' => $create,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CategoryFormRequest $request)
    {
        /* Validating Request */
        $request->validated();
        $input = $request->all();

        /* Begin store to Database */
        DB::beginTransaction();
        try {

            /* Store to Category Database */
            Category::create([
                'title' => $input['title'],
                'description' => $input['description'],
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            /* Send error message to storage/logs/error.txt */
            $error_message = $th->getMessage();
            File::put(storage_path('logs/error.txt'), $error_message);

            return redirect()->back()->with('error, $error_message');
        }


        return redirect()->route('categories.index')
            ->with('success', __('cms::category.notification.store_success'));

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('cms::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        /* Edit section checker */
        $edit = true;

        /* Get Category by ID */
        $category = Category::findOrFail(Falsifying::truthy($id));

        return view('cms::categories.form')->with([
            'edit_section' => $edit,
            'id' => $category->id,
            'title' => $category->title,
            'description' => $category->description,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CategoryFormRequest $request, $id)
    {
        /* Validating Request */
        $request->validated();
        $input = $request->all();

        /* Begin update from database */
        DB::beginTransaction();
        try {
            /* Update Category */
            $category = Category::find($id);
            $category->update($input);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            /* Send error message to storage/logs/error.txt */
            $error_message = $th->getMessage();
            File::put(storage_path('logs/error.txt'), $error_message);

            return redirect()->back()->with('error, $error_message');
        }

        return redirect()->route('categories.index')
            ->with('success', __('cms::category.notification.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
         /* Find Category by ID */
         $delete = Category::where('id', Falsifying::truthy($id))->delete();

         // check data deleted or not
         if ($delete == 1) {
             $success = true;
             $message = "Category deleted successfully";
         } else {
             $success = true;
             $message = "Category not found";
         }

         //  Return response message
         return response()->json([
             'success' => $success,
             'message' => $message,
         ]);
    }
}
