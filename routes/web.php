<?php

use App\Http\Controllers\Account\OrderController;
use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/',[IndexController::class,'index'])->name('index');

Route::prefix('account')->name('account.')->group(function (){
    Route::get('orders',[OrderController::class,'orders'])->name('orders');
    Route::get('profile',[ProfileController::class,'profile'])->name('profile');
    Route::get('dashboard',[\App\Http\Controllers\Account\DashboardController::class,'dashboard'])->name('dashboard');
});
