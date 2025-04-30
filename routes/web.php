<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SimController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoiCuocController;
use App\Http\Controllers\BaiDangController;
use App\Http\Controllers\Frontend\GoiCuocController as FrontendGoiCuocController;

//>>>>>>>>>>>>>>>>> ADMIN <<<<<<<<<<<<<<<<<

// Nhóm route cho admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', [AdminController::class, 'getHome'])->name('home');

    // >>> ADMIN - Sim
    Route::resource('sims', SimController::class);
    Route::put('sims/{so_id}', [SimController::class, 'update'])->name('sims.update');

    // >>> ADMIN - Gói Cước
    Route::resource('goi_cuoc', GoiCuocController::class);

    // Nhóm route cho sim
    // Route::resource('sims', SimController::class);
    // Route::post('sims/store', [SimController::class, 'store'])->name('sims.store');

    // Nhóm route cho gói cước
    // Route::resource('goi-cuocs', GoiCuocController::class);
    // Route::post('goi-cuoc/store', [GoiCuocController::class, 'store'])->name('goi_cuoc.store');

    // Nhóm route cho bài đăng (admin)
    // Route::resource('bai-dangs', BaiDangController::class)->except(['show']);
});

//>>>>>>>>>>>>>>> FRONTEND <<<<<<<<<<<<<<<<

// Trang chủ frontend
Route::get('/', function () {
    return view('frontend.home.home');
});



// Trang bài đăng frontend
// Route::get('/bai-dang', [BaiDangController::class, 'frontendIndex'])->name('bai_dang.index');
// Route::get('/bai-dang/{id}', [BaiDangController::class, 'show'])->name('bai_dang.show');


