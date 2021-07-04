<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/* Client */
use App\Http\Controllers\Client\HomeController;

/* Administrator */
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LegalController;
use App\Http\Controllers\Admin\SettingController;
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

    /* -------------------------------------------------------------------------- */
    /*                                 Client Page                                */
    /* -------------------------------------------------------------------------- */

    /* Home Page */
    Route::get('/', [HomeController::class, 'HomePage'])->name('home');

    /* Faq Page */
    Route::get('faq', [HomeController::class, 'FaqPage'])->name('faq');

    /* Privacy & Policy Page */
    Route::get('privacy-policy', [HomeController::class, 'PrivacyPage'])->name('privacy-policy');

    /* Terms & Conditions Page */
    Route::get('terms-conditions', [HomeController::class, 'TermsPage'])->name('terms-conditions');

    /* Disclaimer Page */
    Route::get('disclaimer', [HomeController::class, 'DisclaimerPage'])->name('disclaimer');

    /* About Us Page */
    Route::get('about-us', [HomeController::class, 'AboutUsPage'])->name('about-us');




    /* -------------------------------------------------------------------------- */
    /*                             Administrator Page                             */
    /* -------------------------------------------------------------------------- */

    /**
     * Authentication First Gateway
     */
    Auth::routes(['verify' => true]);

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


    /* Setting Page */
    Route::resource('setting', SettingController::class);

    /* User Page */
    Route::resource('user', UserController::class);
    Route::get('user_datatable', [UserController::class, 'index_dt'])->name('user.datatable');

    /* Role Page */
    Route::resource('role', RoleController::class);
    Route::get('role_datatable', [RoleController::class, 'index_dt'])->name('role.datatable');

    /* Legal Page*/
    Route::get('legal/{type}', [LegalController::class, 'getType'])->name('legal');
    Route::post('legal', [LegalController::class, 'saveType'])->name('legal.update');


    /* Logout */
    Route::get('logout', function () {
        Auth::logout();
        return redirect()->route('home');
    });
});
