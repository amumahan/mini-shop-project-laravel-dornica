<?php


use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\LogoutController;
use App\Http\Controllers\Authentication\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(function (){
    Route::middleware('guest:web')->group(function (){
        Route::prefix('login')->name('login.')->group(function (){
            Route::get('/',[LoginController::class,'index'])->name('index');
            Route::post('login',[LoginController::class,'login'])->name('login');
        });
        Route::prefix('register')->name('register.')->group(function (){
            Route::get('/',[RegisterController::class,'index'])->name('index');
            Route::post('register',[RegisterController::class,'register'])->name('register');
        });
    });
    Route::get('logout',[LogoutController::class,'logout'])->middleware('auth:web')->name('logout');
});
