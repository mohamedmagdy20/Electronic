<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('admin/login',[AuthController::class,'index'])->name('admin.login.view')->middleware('guest');
Route::post('admin/login',[AuthController::class,'store'])->name('admin.login')->middleware('guest');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('index',[HomeController::class,'index'])->name('admin.index');
    Route::get('logout',[AuthController::class,'destroy'])->name('logout');



    Route::group(['prefix'=>'admins'],function(){
        $route = 'admin.admins.';
        Route::get('/',[AdminController::class,'index'])->name($route.'index');
        Route::get('create',[AdminController::class,'create'])->name($route.'create');
        Route::get('edit/{id}',[AdminController::class,'edit'])->name($route.'edit');
        Route::get('delete/{id}',[AdminController::class,'delete'])->name($route.'delete');
        Route::post('store',[AdminController::class,'store'])->name($route.'store');
        Route::post('update/{id}',[AdminController::class,'update'])->name($route.'update');
    });


    
});