<?php

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

Route::group(['middleware' => 'api', 'prefix' => 'admin'], function() {
    Route::post('login', [App\Http\Controllers\Admin\Auth\AuthController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\Admin\Auth\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\Admin\Auth\AuthController::class, 'refresh']);
    Route::get('me', [App\Http\Controllers\Admin\Auth\AuthController::class, 'me']);
    Route::post('register', [App\Http\Controllers\Admin\Auth\AuthController::class, 'register']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
