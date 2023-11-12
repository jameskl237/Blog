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

Route::prefix('post')->group(function(){
    Route::get('',[PostController::class,'index']);
    Route::post('',[PostController::class,'store']);
    Route::put('/{id}',[PostController::class,'update']);
    Route::delete('/{id}',[PostController::class,'destroy']);
    Route::get('/{id}',[PostController::class,'show']);
});

Route::prefix('tag')->group(function(){
    Route::get('',[TagController::class,'index']);
    Route::post('',[TagController::class,'store']);
    Route::put('/{id}',[TagController::class,'update']);
    Route::delete('/{id}',[TagController::class,'destroy']);
    Route::get('/{id}',[TagController::class,'show']);
});

Route::get('post_tag/{id}',[PostController::class,'postAndTag']);
Route::get('post_tag',[PostController::class,'post_AndTag']);

Route::prefix('user')->group(function(){
    Route::get('',[UserController::class,'index']);
    Route::post('',[UserController::class,'store']);
    Route::put('/{id}',[UserController::class,'update']);
    Route::delete('/{id}',[UserController::class,'destroy']);
    Route::get('/{id}',[UserController::class,'show']);
});

Route::get('user_post/{id}',[UserController::class,'userAndpost']);
Route::get('users',[UserController::class,'usersAndPosts']);
