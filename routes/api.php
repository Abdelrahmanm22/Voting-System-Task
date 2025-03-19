<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => 'api',], function ($router) {
    Route::post('/register',[\App\Http\Controllers\Api\AuthController::class, 'register']);
    Route::post('/login',[\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('/logout',[\App\Http\Controllers\Api\AuthController::class, 'logout']);
});


Route::group(['middleware' => ['jwt.verify', 'check.approved']],function(){
    Route::get('/users',[\App\Http\Controllers\Api\UserController::class,'index']);
    Route::post('/vote',[\App\Http\Controllers\Api\VoteController::class,'vote']);
});
