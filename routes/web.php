<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('pages.dashboard');
});

Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');

Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('register',[AuthController::class,'register_view'])->name('register');
Route::post('register',[AuthController::class,'register'])->name('register');
Route::get('/home',[AuthController::class,'home'])->name('home');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::resource('categories', CategoryController::class);


