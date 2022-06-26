<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReadLogController;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::redirect('/', 'books');
    Route::resource('books', BookController::class);
    Route::resource('books.read_logs', ReadLogController::class)->except('index');
});
