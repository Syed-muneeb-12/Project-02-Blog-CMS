<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('categories', CategoryController::class);
//});
