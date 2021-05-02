<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('contents')->group(function(){
    Route::get('',  [ContentController::class, 'index']);
    Route::post('',  [ContentController::class, 'store']);
    Route::get('{id}',  [ContentController::class, 'show'])->where('id', '[0-9]+');
    Route::put('{id}',  [ContentController::class, 'update'])->where('id', '[0-9]+');;
    Route::delete('{id}',  [ContentController::class, 'destroy'])->where('id', '[0-9]+');;
});

Route::prefix('users')->group(function(){
    Route::get('',  [UserController::class, 'index']);
    Route::post('',  [UserController::class, 'store']);
    Route::get('{id}',  [UserController::class, 'show'])->where('id', '[0-9]+');
    Route::put('{id}',  [UserController::class, 'update'])->where('id', '[0-9]+');;
    Route::delete('{id}',  [UserController::class, 'destroy'])->where('id', '[0-9]+');;
});
