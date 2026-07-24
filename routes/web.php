<?php

use App\Http\Controllers\Account\OrderController;
use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[IndexController::class,'index'])->name('index');

Route::prefix('account')->name('account.')->group(function (){
    Route::get('orders',[OrderController::class,'orders'])->name('orders');


    Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function (){
        Route::get('/','index')->name('index');
        Route::post('edit','edit')->name('edit');
    });
});

Route::prefix('product')->name('product.')->group(function (){
    Route::controller(ProductController::class)->group(function (){
        Route::get('/','index')->name('index');
        Route::get('show{product}','show')->name('show');
        Route::get('remove-filters','removeFilter')->name('remove.filter');
        Route::get('search','search')->name('search');

    });
    Route::prefix('cart')->controller(CartController::class)->name('cart.')->group(function (){
       Route::get('/','index')->name('index');
       Route::post('add','add')->name('add');
       Route::get('destroy','delete')->name('delete');
       Route::post('update-qty','update')->name('update');
       Route::get('{product}/remove','remove')->name('remove');
    });
});

Route::prefix('checkout')->name('checkout.')->controller(CheckoutController::class)->group(function (){
    Route::get('index','index')->name('index');
    Route::post('post','store')->name('store');
});
