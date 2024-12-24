<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\UserContoller;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//})
Route::view('/', 'home');

//Items
Route::resource('items',ItemsController::class)->middleware('auth');

Route::controller(UserContoller::class)->group(function() {
    Route::get('/login','loginUi')->name('login');
    Route::post('/login','login')->name('login.user');
    Route::get('/register','registerUi')->name('register');
    Route::post('/register','register')->name('register.user');
});