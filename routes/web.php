<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\ACLController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;


use App\Http\Controllers\VideoController;


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


Route::get('/', function () {
//    return view('welcome');
    return redirect()->route('login'); // view auth/login.blade
});

Route::get('/refresh', function () {
    return redirect()->back();
})->name('back');

//Route::get('/test', [ACLController::class, 'test']);

//Route::get('/testlogout', function () {
//    return view('test/testout');
//});
Route::get('/cl', function () {
    Cache::flush();
    die('Cache Cleared');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/permission-setup', [ACLController::class, 'permission'])->name('permission');
    Route::get('/permission-edit/{pid}', [ACLController::class, 'permissionEdit'])->name('permission.edit');
    Route::post('/permission-update/{pid}', [ACLController::class, 'permissionUpdate'])->name('permission.update');

    Route::get('/role_setup', [ACLController::class, 'role'])->name('role');
    Route::post('/role_store', [ACLController::class, 'roleStore'])->name('role.store');
    Route::delete('/role_delete/{rid}', [ACLController::class, 'roleDestroy'])->name('role.delete');
    Route::get('/role_edit/{rid}', [ACLController::class, 'roleEdit'])->name('role.edit');
    Route::post('/role_update/{rid}', [ACLController::class, 'roleUpdate'])->name('role.update');

    Route::get('/users_setup', [UserController::class, 'users'])->name('users');
    Route::post('/user_store', [UserController::class, 'userStore'])->name('user.store');
    Route::get('/user_edit/{uid}', [UserController::class, 'userEdit'])->name('user.edit');
    Route::post('/user_update/{uid}', [UserController::class, 'userUpdate'])->name('user.update');

    Route::get('/make_user_in_active/{uid}', [UserController::class, 'makeUserInactive'])->name('make.user.in.active');
    Route::get('/make_user_active/{uid}', [UserController::class, 'makeUserActive'])->name('make.user.active');
    Route::post('/make_user_active/{uid}', [UserController::class, 'makeUserActiveUpdate'])->name('make.user.active');

    Route::get('/users_account_settings', [UserController::class, 'accountSettings'])->name('account.settings');
    Route::post('/users_account_settings', [UserController::class, 'accountSettingsUpdate'])
        ->name('account.settings.update');
    Route::post('/users_account_settings_info/{uid}', [UserController::class, 'accountSettingsUpdateInfo'])
        ->name('account.settings.update.info');

    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{cid}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/edit/{cid}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/delete/{cid}', [CategoryController::class, 'destroy'])->name('category.delete');

    Route::get('/sub_category', [SubCategoryController::class, 'index'])->name('sub.category');
    Route::post('/sub_category', [SubCategoryController::class, 'store'])->name('sub.category.store');
    Route::get('/sub_category/edit/{cid}', [SubCategoryController::class, 'edit'])->name('sub.category.edit');
    Route::post('/sub_category/edit/{cid}', [SubCategoryController::class, 'update'])->name('sub.category.update');
    Route::delete('/sub_category/delete/{cid}', [SubCategoryController::class, 'destroy'])->name('sub.category.delete');







//    Route::get('/videos/sub_category_one', [VideoSubCategoryOneController::class, 'index'])
//        ->name('video.sub.category.one');
//    Route::post('/videos/sub_category_one', [VideoSubCategoryOneController::class, 'store'])
//        ->name('video.sub.category.one.store');
//    Route::get('/videos/sub_category_one/edit/{cid}', [VideoSubCategoryOneController::class, 'edit'])
//        ->name('video.sub.category.one.edit');
//    Route::post('/videos/sub_category_one/edit/{cid}', [VideoSubCategoryOneController::class, 'update'])
//        ->name('video.sub.category.one.update');
//    Route::delete('/videos/sub_category_one/delete/{cid}', [VideoSubCategoryOneController::class, 'destroy'])
//        ->name('video.sub.category.one.delete');
//
//    Route::get('/videos/sub_category_two', [VideoSubCategoryTwoController::class, 'index'])
//        ->name('video.sub.category.two');
//    Route::post('/videos/sub_category_two', [VideoSubCategoryTwoController::class, 'store'])
//        ->name('video.sub.category.two.store');
//    Route::get('/videos/sub_category_two/edit/{cid}', [VideoSubCategoryTwoController::class, 'edit'])
//        ->name('video.sub.category.two.edit');
//    Route::post('/videos/sub_category_two/edit/{cid}', [VideoSubCategoryTwoController::class, 'update'])
//        ->name('video.sub.category.two.update');
//    Route::delete('/videos/sub_category_two/delete/{cid}', [VideoSubCategoryTwoController::class, 'destroy'])
//        ->name('video.sub.category.two.delete');

    Route::get('/videos/upload', [VideoController::class, 'upload'])->name('video.upload');
    Route::post('/videos/upload', [VideoController::class, 'uploadStore'])->name('video.upload.store');
    Route::get('/videos/list', [VideoController::class, 'listVideo'])->name('video.list');
    Route::get('/videos/play/{vid}', [VideoController::class, 'playVideo'])->name('video.play');
    Route::delete('/videos/delete/{vid}', [VideoController::class, 'deleteVideo'])->name('video.delete');
    Route::get('/videos/edit/{vid}', [VideoController::class, 'edit'])->name('video.edit');
    Route::post('/videos/edit/{vid}', [VideoController::class, 'update'])->name('video.update');


});
