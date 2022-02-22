<?php

use App\Http\Controllers\PostController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

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
    return "Hola";
});


Route::resource('post', PostController::class);

// Route::get("posts", [PostController::class, 'index']);
// Route::get("posts/create", [PostController::class, 'create']);
// Route::get("posts/{post}/edit", [PostController::class, 'edit']);

// Route::post("posts", [PostController::class, 'store']);
// Route::put("posts/{post}", [PostController::class, 'update']);
// Route::delete("posts/{post}", [PostController::class, 'delete']);