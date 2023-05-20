<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('admin/login',[AuthController::class,'index'])->name('admin.login.view')->middleware('guest');
Route::post('admin/login',[AuthController::class,'store'])->name('admin.login')->middleware('guest');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('index',[HomeController::class,'index'])->name('admin.index');
});