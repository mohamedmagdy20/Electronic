<?php

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\HomeController;
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
    Route::get('/login', 'loginView')->name('login.view');
    Route::post('/login','login')->name('login');
    Route::get('/register','registerView')->name('register.view');
    Route::post('/register','register')->name('register');
});
// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware'=>'auth:client'],function () {
    Route::get('/',[HomeController::class,'index'])->name('home');
});
