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
    Route::prefix('cms')->group(function () {
        Route::get('/', 'CMSController@index')->name('cms');
    });

    /* Posts */
    Route::resource('posts', PostsController::class);

    /* Categories */
    Route::resource('categories', CategoriesController::class);
});
