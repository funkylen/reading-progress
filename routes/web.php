<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ReadLogController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::redirect('/home', 'books');

Route::get('/auth/google/redirect', [LoginController::class, 'googleRedirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [LoginController::class, 'googleCallback'])->name('auth.google.callback');

Route::resource('feedback', FeedbackController::class)->only('create', 'store');

Route::middleware('auth')->group(function () {
    Route::redirect('/', 'books');
    Route::resource('books', BookController::class);
    Route::resource('books.read_logs', ReadLogController::class)->except('index');
});
