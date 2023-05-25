<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
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


    Route::group(['prefix'=>'category'],function(){
        $route = 'admin.category.';
        Route::get('/',[CategoryController::class,'index'])->name($route.'index');
        Route::get('create',[CategoryController::class,'create'])->name($route.'create');
        Route::get('edit/{id}',[CategoryController::class,'edit'])->name($route.'edit');
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name($route.'delete');
        Route::post('store',[CategoryController::class,'store'])->name($route.'store');
        Route::post('update/{id}',[CategoryController::class,'update'])->name($route.'update');
    });


    Route::group(['prefix'=>'product'],function(){
        $route = 'admin.product.';
        Route::get('/',[ProductController::class,'index'])->name($route.'index');
        Route::get('create',[ProductController::class,'create'])->name($route.'create');
        Route::get('edit/{id}',[ProductController::class,'edit'])->name($route.'edit');
        Route::get('delete/{id}',[ProductController::class,'delete'])->name($route.'delete');
        Route::post('store',[ProductController::class,'store'])->name($route.'store');
        Route::post('update/{id}',[ProductController::class,'update'])->name($route.'update');
    });


    Route::group(['prefix'=>'clients'],function(){
        $route = 'admin.clients.';
        Route::get('/',[ClientController::class,'index'])->name($route.'index');
        Route::get('delete/{id}',[ClientController::class,'delete'])->name($route.'delete');
    });

    Route::group(['prefix'=>'orders'],function(){
        $route = 'admin.orders.';
        Route::get('/',[OrderController::class,'index'])->name($route.'index');
        Route::get('/cencel/order/{id}',[OrderController::class,'cencelOrder'])->name($route.'cencel.order');
        Route::get('/approve/order/{id}',[OrderController::class,'approveOrder'])->name($route.'approve.order');
        Route::get('/show/order/{id}',[OrderController::class,'showOrder'])->name($route.'show.order');
    });


    
    Route::group(['prefix'=>'message'],function(){
        $route = 'admin.messages.';
        Route::get('/',[MessageController::class,'index'])->name($route.'index');
        Route::get('/message/delete/{id}',[MessageController::class,'delete'])->name($route.'delete');
    });


    
});