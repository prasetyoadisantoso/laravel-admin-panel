<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

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


Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    /**
     * Authentication First Gateway
     */
    Auth::routes(['verify' => true]);

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('user', UserController::class);
    Route::get('user_datatable', [UserController::class, 'index_dt'])->name('user.datatable');

    Route::resource('role', RoleController::class);
    Route::get('role_datatable', [RoleController::class, 'index_dt'])->name('role.datatable');




    /* Logout */
    Route::get('logout', function () {
        Auth::logout();
        return redirect()->route('dashboard');
    });

});
