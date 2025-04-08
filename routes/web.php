<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SimController;
use App\Http\Controllers\GoiCuocController;
use App\Http\Controllers\BaiDangController;



Route::resource('sims', SimController::class);

// Nhóm route cho admin
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/home', [AdminController::class, 'getHome'])->name('home');

    // Nhóm route cho sim
    Route::resource('sims', SimController::class);
    Route::post('admin/sims/store', [SimController::class, 'store'])->name('admin.sims.store');

    // Nhóm route cho goi cước
    Route::resource('goi-cuocs', GoiCuocController::class);
    Route::post('goi_cuoc', [GoiCuocController::class, 'store'])->name('goi_cuoc.store');

    // Nhóm route cho bài đăng
    Route::resource('bai-dangs', BaiDangController::class);

});

// Trang chủ
Route::get('/', function () {
    return view('frontend.home');
});
