<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\UserContoller;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//})
Route::view('/', 'home');

Route::middleware('auth')->group(function(){
    Route::resource('items',ItemsController::class);
    Route::resource('user',UserContoller::class)->only(['show','update','destroy']);
    Route::resource('customer',CustomerController::class)->only(['store','update']);
    Route::post('/order/{item}',[CustomerController::class,'order'])->name('customer.order');
});

Route::controller(UserContoller::class)->group(function() {
    Route::get('/login','loginUi')->name('login');
    Route::post('/login','login')->name('login.user');
    Route::get('/register','registerUi')->name('register');
    Route::post('/register','register')->name('register.user');
    Route::get('/logout','logout')->name('logout.user');
});