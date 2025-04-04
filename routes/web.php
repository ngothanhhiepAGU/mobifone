<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SimController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('sims', SimController::class);
});

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/admin/home', [AdminController::class, 'getHome'])->name('admin.home');
Route::get('/admin/sims', [SIMController::class, 'index'])->name('admin.sims.index');















// Khai báo route cho phương thức getHome
Route::get('/admin/home', [AdminController::class, 'getHome'])->name('admin.home');