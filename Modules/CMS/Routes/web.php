<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\CMS\Http\Controllers\PostsController;
use Modules\CMS\Http\Controllers\CategoriesController;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    /* CMS */
    Route::resource('cms', 'CMSController');

    /* Posts */
    Route::resource('posts', 'PostsController');
    Route::post('images', 'PostsController@uploadImage')->name('post.image');
    Route::get('posts_datatable', [PostsController::class, 'index_dt'])->name('posts.datatable');


    /* Categories */
    Route::resource('categories', 'CategoriesController');
    Route::get('categories_datatable', [CategoriesController::class, 'index_dt'])->name('categories.datatable');

});
