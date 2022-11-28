<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;


Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('register',[AuthController::class,'register_view'])->name('register');
Route::post('register',[AuthController::class,'register'])->name('register');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/',  [DashboardController::class, 'index']);
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');

    // Category
    Route::resource('categories', CategoryController::class)->middleware('auth');

    //Brand
    Route::resource('brands', BrandController::class)->middleware('auth');

});



