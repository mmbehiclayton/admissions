<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\LearnersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StreamController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/learners/upload', [LearnersController::class, 'upload'])->name('learners.upload');
Route::post('/learners/bulk-upload', [LearnersController::class, 'bulkUpload'])->name('learners.bulkUpload');
Route::get('/classes/active', [ClassesController::class, 'activeClasses'])->name('classes.active');
Route::get('/streams/all', [StreamController::class, 'showAllStreams'])->name('streams.all');

Route::get('/', HomeController::class)->name('home')->middleware('auth');
Route::resource('roles', RolesController::class)->middleware('auth');
Route::resource('branches', BranchesController::class)->middleware('auth');
Route::resource('classes', ClassesController::class)->middleware('auth');
Route::resource('learners', LearnersController::class)->middleware('auth');
Route::resource('streams', StreamController::class)->middleware('auth');




















//dashboard routes
// Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard', 'as' => 'admin.'], function () {
    //single action controllers
    // Route::get('/home', HomeController::class)->name('home');

    // //link that return view, to get compoment from there
    // Route::view('/buttons', 'admin.buttons')->name('buttons');
    // Route::view('/cards', 'admin.cards')->name('cards');
    // Route::view('/charts', 'admin.charts')->name('charts');
    // Route::view('/forms', 'admin.forms')->name('forms');
    // Route::view('/modals', 'admin.modals')->name('modals');
    // Route::view('/tables', 'admin.tables')->name('tables');

    // Route::group(['prefix' => 'pages', 'as' => 'page.'], function () {
    //     Route::view('/404-page', 'admin.pages.404')->name('404');
    //     Route::view('/blank-page', 'admin.pages.blank')->name('blank');
    //     Route::view('/create-account-page', 'admin.pages.create-account')->name('create-account');
    //     Route::view('/forgot-password-page', 'admin.pages.forgot-password')->name('forgot-password');
    //     Route::view('/login-page', 'admin.pages.login')->name('login');
    // });
// });


require __DIR__ . '/auth.php';
