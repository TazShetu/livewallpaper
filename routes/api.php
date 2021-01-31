<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/v1/login', [ApiController::class, 'loginu']);

// add to resolve error route login not defined (route login is predefined)
// so when email password does not match laravel auto redirects to login route and show unauthorized....
Route::get('/login/fail', [ApiController::class, 'loginFail'])->name('loginFail');

Route::get('/v1/menu', [ApiController::class, 'getMenus'])->middleware(['auth:api', 'scope:user']);
Route::get('/v1/banner', [ApiController::class, 'getBanners'])->middleware(['auth:api', 'scope:user']);
Route::get('/v1/home', [ApiController::class, 'home'])->middleware(['auth:api', 'scope:user']);
Route::get('/v1/category/{cid}/images', [ApiController::class, 'imageFromCategory'])->middleware(['auth:api', 'scope:user']);
Route::get('/v1/sub_category/{scid}/images', [ApiController::class, 'imageFromSubCategory'])->middleware(['auth:api', 'scope:user']);





