<?php
use Illuminate\Support\Facades\Route;


Route::get('/admin', function () { return view('admin.index'); })->middleware('web');
Route::get('/admin/{slug1}', function () { return view('admin.index'); });
Route::get('/admin/{slug1}/{slug2}', function () { return view('admin.index'); });



//Shop Route

Route::get('/login', [App\Http\Controllers\Shop\AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [App\Http\Controllers\Shop\AuthController::class, 'login'])->name('login');
Route::get('/register', [App\Http\Controllers\Shop\AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [App\Http\Controllers\Shop\AuthController::class, 'register'])->name('register');


Route::get('/', [App\Http\Controllers\Shop\ShopViewController::class, 'index'])->name('home');

