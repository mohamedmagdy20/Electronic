<?php

use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['controller'=>AuthController::class],function(){
    Route::get('/login', 'loginView')->name('login.view')->middleware('guest:client');
    Route::post('/login','login')->name('login')->middleware('guest:client');
    Route::get('/register','registerView')->name('register.view')->middleware('guest:client');
    Route::post('/register','register')->name('register')->middleware('guest:client');
    Route::get('/logout','destroy')->name('client.logout');
    Route::get('profile','profile')->name('client.profile')->middleware('auth:client');
});
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index'])->name('home');
Route::group(['controller'=>HomeController::class],function(){
    Route::get('/products','showAllProduct')->name('all.products');
    Route::get('/products/category/{id}','productCategory')->name('product.category');
    Route::get('/products/new','newProducts')->name('new.products');
    Route::post('/search/product','SearchProducts')->name('search.products');
    Route::get('/product/{id}','showProduct')->name('show.product');
});

Route::group(['controller'=>CartController::class,'middleware'=>'auth:client'],function(){
    Route::get('/cart','index')->name('cart');
    Route::post('/store','store')->name('store.cart');
    Route::get('cart/delete/{id}','delete')->name('cart.delete');
});


Route::group(['controller'=>OrderController::class,'middleware'=>'auth:client'],function(){
   Route::post('/store/cart','checkOut')->name('store.orders');
   Route::get('payment','payment')->name('payment');
   Route::get('payment/success','success')->name('payment.success');
   Route::get('cencel','cencel')->name('cencel');
});

Route::post('send/message',[MessageController::class,'store'])->name('send.message');
