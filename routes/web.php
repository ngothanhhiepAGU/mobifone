<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SimController;
use App\Http\Controllers\GoiCuocController;
use App\Http\Controllers\BaiDangController;

// Trang chủ frontend
Route::get('/', function () {
    return view('frontend.home');
});
    // Nhóm route cho admin
    Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/home', [AdminController::class, 'getHome'])->name('home');

    // Nhóm route cho sim
    Route::resource('sims', SimController::class);
    Route::post('sims/store', [SimController::class, 'store'])->name('sims.store');

    // Nhóm route cho gói cước
    Route::resource('goi-cuocs', GoiCuocController::class);
    Route::post('goi-cuoc/store', [GoiCuocController::class, 'store'])->name('goi_cuoc.store');

    // Nhóm route cho bài đăng
    Route::resource('bai-dangs', BaiDangController::class)->except(['show']);  // Loại bỏ route 'show' vì đã có frontend route riêng
    Route::get('/bai-dang', [BaiDangController::class, 'frontendIndex'])->name('bai_dangs.index');
    Route::get('/bai-dang/{id}', [BaiDangController::class, 'show'])->name('bai_dangs.show');

     
    
});
