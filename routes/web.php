<?php

use App\Http\Controllers\Account\OrderController;
use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/',[IndexController::class,'index'])->name('index');

Route::prefix('account')->name('account.')->group(function (){
    Route::get('orders',[OrderController::class,'orders'])->name('orders');


    Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function (){
        Route::get('/','index')->name('index');
        Route::post('edit','edit')->name('edit');
    });
    Route::get('dashboard',[\App\Http\Controllers\Account\DashboardController::class,'dashboard'])->name('dashboard');
});
