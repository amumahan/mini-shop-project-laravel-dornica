<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use \Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/',function (){
        return redirect()->route('admin.dashboard');
    });

    Route::prefix('auth')->middleware('guest:admin')->controller(LoginController::class)->name('auth.')->group(function (){
        Route::get('login','login')->name('login');
        Route::post('store','store')->name('store');
    });

    Route::middleware('auth:admin')->group(function (){

        Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

        Route::prefix('user')->controller(UserController::class)->name('user.')->group(function (){
            Route::get('index','index')->name('index');
        });
        Route::prefix('order')->controller(OrderController::class)->name('order.')->group(function (){
            Route::get('index','index')->name('index');
        });
        Route::prefix('product')->controller(ProductController::class)->name('product.')->group(function (){
            Route::get('index','index')->name('index');
        });
        Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function (){
            Route::get('index','index')->name('index');
        });
        Route::prefix('admin')->controller(AdminController::class)->name('admin.')->group(function (){
            Route::get('index','index')->name('index');
        });
    });
});
