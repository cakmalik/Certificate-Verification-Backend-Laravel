<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:api');

Route::group(['middleware'=>'auth:api', 'middleware'=>'myAuth'], function(){
    Route::resource('/student', StudentController::class);
    Route::put('/student/{student}/edit_score', [StudentController::class, 'updateScore']);
    Route::get('/student/{student}/verified', [StudentController::class, 'verified']);
});

Route::group(['middleware' => 'auth:api'], function () {
    // Route::get('/user', [UserController::class, 'index']);
    // // Route::get('/user/{id}', [UserController::class, 'show']);
    // Route::post('/user', [UserController::class, 'store']);
    // Route::put('/user/{id}', [UserController::class, 'update']);
    // Route::delete('/user/{id}', [UserController::class, 'destroy']);

    
});