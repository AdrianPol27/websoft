<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FileUploadController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', 'App\Http\Controllers\DashboardController@index');
Route::resource('products', ProductController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('uploads', FileUploadController::class);