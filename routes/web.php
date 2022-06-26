<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReadLogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('books', BookController::class);
Route::resource('books.read_logs', ReadLogController::class)->except('index');
