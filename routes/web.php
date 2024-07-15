<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//})
Route::view('/', 'pages.home');

//Items
Route::resource('items',ItemsController::class);