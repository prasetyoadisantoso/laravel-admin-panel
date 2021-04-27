<?php

namespace Modules\CMS\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repositories\GlobalFunction;
use Modules\CMS\Entities\Post;
use Yajra\DataTables\DataTables;
use App\Repositories\Falsifying;
use Illuminate\Support\Facades\DB;
use Modules\CMS\Entities\Category;
use Illuminate\Support\Facades\File;
use Modules\CMS\Http\Requests\PostFormRequest;


class PostsController extends Controller
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
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        /* Check Post Page */
        $post = true;
        return view('cms::posts.index')->with([
            'post_page' => $post
        ]);
    }

    /**
     * Display Post Table with DataTables
     *
     * @return
     */
    public function index_dt()
    {
        /* Render data to datatable */
        $posts = Post::with('categories')->get();
        $result = Datatables::of($posts)
            ->addColumn('posts', function (Post $posts) {
                return $posts;
            })
            /* Relationship with category */
            ->addColumn('categories', function (Post $posts) {
                $item = $posts->categories->map(function ($items) {
                    return $items->title;
                });
                return json_decode($item);
            })
            ->addColumn('action', function ($posts) {
                return '<button type="button" class="btn btn-md btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . __('cms::post.datatable.action') . '<i class="fas fa-cog ml-2"></i></button> <div class="dropdown-menu dropdown-menu-right"> </button> <a class="dropdown-item text-primary" href="' . route('posts.edit', Falsifying::falsify($posts->id)) . '"><i class="fas fa-pen-square mr-3"></i>' . __('cms::post.datatable.edit') . '</a> <a class="dropdown-item text-red" href="' . route('posts.destroy', Falsifying::falsify($posts->id)) . '" id="delete"><i class="fas fa-trash mr-3"></i>' . __('cms::post.datatable.delete') . '</a></div>';
            })
            ->removeColumn('id')->addIndexColumn()->make('true');

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        /* Check create section */
        $create = true;

        /* Get category for display at multiselect */
        $this->data['title'] = Category::all();
        $list_categories = $this->data['title'];

        return view('cms::posts.form')->with([
            'create_section' => $create,
            'list_categories' => $list_categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PostFormRequest $request)
    {
        /* Validating Request */
        $request->validated();
        $input = $request->all();

        /* Image Processing : Get name an store image to public*/
        if ($request->hasFile('image')) {
            $names = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/assets/Image/Upload/', $names);
            $input['image'] = $names;
        }


        /* Begin store to database*/
        DB::beginTransaction();
        try {

            Post::create([
                'title' => $input['title'],
                'image' => $input['image'],
                'content' => $input['content']
            ]);

            /* Attach post and categories to category_posts pivot */
            $latest = Post::latest()->first();
            $latest->categories()->attach($input['categories']);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            /* Send error message to storage/logs/error.txt */
            $error_message = $th->getMessage();
            File::put(storage_path('logs/error.txt'), $error_message);

            return redirect()->back()->with('error, $error_message');
        }

        return redirect()->route('posts.index')
            ->with('success', __('cms::post.notification.store_success'));
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

        /* Get Post by ID */
        $post = Post::findOrFail(Falsifying::truthy($id));

        foreach ($post->categories as $value) {
            $category[] = $value->id;
        }

        /* Get category for display at multiselect */
        $this->data['title'] = Category::all();
        $list_categories = $this->data['title'];

        return view('cms::posts.form')->with([
            'edit_section' => $edit,
            'id' => $post->id,
            'title' => $post->title,
            'image' => $post->image,
            'list_categories' => $list_categories,
            'content' => $post->content,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PostFormRequest $request, $id)
    {
        /* Validating Request */
        $request->validated();
        $input = $request->all();

        /* Image Processing */
        if ($request->hasFile('image')) {
            $names = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/assets/Image/Upload/', $names);
            $input['image'] = $names;
        }


        /* Begin update data to database*/
        DB::beginTransaction();
        try {

            /* Update without relationship */
            $post = Post::find($id);
            $post->title = $input['title'];
            $post->content = $input['content'];
            if(isset($input['image'])){
                $post->image = $input['image'];
            }

            /* Update category_posts pivot with relationship */
            $post->categories()->sync($input['categories']);

            $post->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            /* Send error message to storage/logs/error.txt */
            $error_message = $th->getMessage();
            File::put(storage_path('logs/error.txt'), $error_message);

            return redirect()->back()->with('error', $error_message);
        }

        return redirect()->route('posts.index')
            ->with('success', __('cms::post.notification.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        /* Find Post by ID */
        $delete = Post::where('id', Falsifying::truthy($id))->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Post deleted successfully";
        } else {
            $success = true;
            $message = "Post not found";
        }

        //  Return response message
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    /**
     * Upload Image with CKEditor
     * @return response
     */
    public function uploadImage(Request $request)
    {
        /* Check any image that exist , sent by user */
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $fileName . '_' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('assets/Image/Upload/'), $fileName);

            $ckeditor = $request->input('CKEditorFuncNum');
            $url = asset('assets/Image/Upload/' . $fileName);
            $msg = 'Image uploaded successfully';

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditor, '$url', '$msg')</script>";

            /* Set the header */
            @header('Content-type: text/html; charset=utf-8');
            return $response;
        }
    }

}
