<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('prijava', [AuthController::class, 'index'])->name('login');
Route::post('obrada', [AuthController::class, 'process'])->name('process');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('books', BookController::class);
