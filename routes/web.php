<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SimController;

// Nhóm route cho admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('sims', SimController::class);
    Route::get('/home', [AdminController::class, 'getHome'])->name('home');
});

// Trang chủ
Route::get('/', function () {
    return view('frontend.home');
});
