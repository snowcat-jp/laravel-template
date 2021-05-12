<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\UserController;

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

Route::prefix('users')->group(function(){
    Route::post('',  [UserController::class, 'store']);
});
Route::post('login',  [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout',  [AuthController::class, 'logout']);

    Route::prefix('users')->group(function(){
        Route::get('',  [UserController::class, 'index']);
        Route::get('{id}',  [UserController::class, 'show'])->where('id', '[0-9]+');
        Route::put('{id}',  [UserController::class, 'update'])->where('id', '[0-9]+');
        Route::delete('{id}',  [UserController::class, 'destroy'])->where('id', '[0-9]+');
    });

    Route::prefix('contents')->group(function(){
        Route::get('',  [ContentController::class, 'index']);
        Route::post('',  [ContentController::class, 'store']);
        Route::get('{id}',  [ContentController::class, 'show'])->where('id', '[0-9]+');
        Route::put('{id}',  [ContentController::class, 'update'])->where('id', '[0-9]+');;
        Route::delete('{id}',  [ContentController::class, 'destroy'])->where('id', '[0-9]+');;
    });
});
