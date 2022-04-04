<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Routing\RouteGroup;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
});

Route::get('category/all', [CategoryController::class, 'all']);
Route::resource('category', CategoryController::class)->except(["create", "edit"]);
Route::get('category/{category}/posts', [CategoryController::class, 'posts']);
Route::resource('post', PostController::class)->except(["create", "edit"]);
Route::get('post/slug/{post:slug}', [PostController::class, 'slug']);
Route::post('post/upload/{post}', [PostController::class, 'upload']);


Route::post('user/login', [\App\Http\Controllers\Api\UserController::class, 'login']);