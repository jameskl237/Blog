<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;


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

Route::prefix('post')->controller(PostController::class)->group(function(){
    Route::get('','index');
    Route::post('', 'store');
    Route::put('/{id}','update');
    Route::delete('/{id}','destroy');
    Route::get('/{id}','show');
});

Route::prefix('tag')->controller(TagController::class)->group(function(){
    Route::get('','index');
    Route::post('','store');
    Route::put('/{id}','update');
    Route::delete('/{id}','destroy');
    Route::get('/{id}','show');
});

Route::get('post_tag/{id}',[PostController::class,'postAndTag']);
Route::get('post_tag',[PostController::class,'post_AndTag']);

Route::prefix('user')->controller(UserController::class)->group(function(){
    Route::get('','index');
    Route::post('','store');
    Route::put('/{id}','update');
    Route::delete('/{id}','destroy');
    Route::get('/{id}','show');
});

Route::get('user_post/{id}',[UserController::class,'userAndpost']);
Route::get('users',[UserController::class,'usersAndPosts']);
