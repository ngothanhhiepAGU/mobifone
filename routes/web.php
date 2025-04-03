<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;



Route::get('/admin/home', [AdminController::class, 'getHome'])->name('admin.home');















// Khai báo route cho phương thức getHome
Route::get('/admin/home', [AdminController::class, 'getHome'])->name('admin.home');