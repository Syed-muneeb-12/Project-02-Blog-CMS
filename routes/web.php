<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');

    Route::get('/settings', function () {
        return view('welcome');
    })->name('settings');
});

Route::middleware('guest')->group(function () {
    Route::get('/public/posts', [PostController::class, 'publicIndex'])->name('public.posts.index');
    Route::get('/public/posts/{post}', [PostController::class, 'publicShow'])->name('public.posts.show');
});
