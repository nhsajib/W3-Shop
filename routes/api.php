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


    //FilePond File Upload
    Route::post('/upload/temp/image/file-pond/{width}/{height}', [App\Http\Controllers\Admin\FilePondController::class, 'storeImage']);
    Route::post('/upload/temp/file/file-pond', [App\Http\Controllers\Admin\FilePondController::class, 'storeFile']);
    Route::put('/upload/temp/file-pond/remove', [App\Http\Controllers\Admin\FilePondController::class, 'destroy']);

    //Categories
    Route::apiResource('categories', App\Http\Controllers\Admin\CategoriesController::class);

    // Dependency 
    Route::put('/form/dependency/categories', [App\Http\Controllers\Admin\FormDependencyController::class, 'categories']);
});
