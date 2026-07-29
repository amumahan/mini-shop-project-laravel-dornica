<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
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


        Route::get('logout',[LogoutController::class,'logout'])->name('logout');

        Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

        Route::prefix('user')->controller(UserController::class)->name('user.')->group(function (){
            Route::get('index','index')->name('index');
            Route::get('{userId}/show','show')->name('show');
            Route::get('{userId}/edit','edit')->name('edit');
            Route::put('{userId}/update','update')->name('update');
            Route::delete('{userId}/delete','delete')->name('delete');
        });
        Route::prefix('order')->controller(OrderController::class)->name('order.')->group(function (){
            Route::get('index','index')->name('index');
            Route::get('{orderId}/show','show')->name('show');
            Route::get('{orderId}/edit','edit')->name('edit');
            Route::put('{orderId}/update','update')->name('update');
            Route::delete('{orderId}/delete','delete')->name('delete');
        });
        Route::prefix('product')->controller(ProductController::class)->name('product.')->group(function (){
            Route::get('index','index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('{productId}/show','show')->name('show');
            Route::get('{productId}/edit','edit')->name('edit');
            Route::put('{productId}/update','update')->name('update');
            Route::get('{fileId}/remove-image','removeImage')->name('remove.image');
            Route::delete('{productId}/delete','delete')->name('delete');
        });
        Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function (){
            Route::get('index','index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('{categoryId}/show','show')->name('show');
            Route::get('{categoryId}/edit','edit')->name('edit');
            Route::put('{categoryId}/update','update')->name('update');
            Route::delete('{categoryId}/delete','delete')->name('delete');
        });
        Route::prefix('admin')->controller(AdminController::class)->name('admin.')->group(function (){
            Route::get('index','index')->name('index');
        });
    });
});
