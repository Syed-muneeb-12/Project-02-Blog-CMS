<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('welcome');
})->name('dashboard');

 Route::resource('posts', PostController::class);

Route::get('/settings', function () {
    return view('welcome');
})->name('settings');

//Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('categories', CategoryController::class);
//});
