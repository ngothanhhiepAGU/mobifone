<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SoDienThoaiController;
use App\Http\Controllers\Admin\SimController;
use App\Http\Controllers\Admin\GoiCuocController;
use App\Http\Controllers\Admin\TinTucController;
use App\Http\Controllers\Admin\DangKyGoiCuocController;
use App\Http\Controllers\Frontend\GoiCuocController as FrontendGoiCuocController;
use App\Http\Controllers\Frontend\TinTucController as FrontendTinTucController;
use App\Http\Controllers\Frontend\LoaiThueBaoController;
use App\Http\Controllers\Frontend\GoiCuocLoaiController;
use App\Http\Controllers\Frontend\GoiCuocDichVuFrontendController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;

//>>>>>>>>>>>>>>>>> ADMIN <<<<<<<<<<<<<<<<<

Route::prefix('admin')->as('admin.')->group(function () {
    // Thêm tuyến đường cho /admin
    Route::get('/', function () {
        return redirect()->route('admin.home');
    })->name('home'); // Đổi tên thành 'admin.home' để thống nhất

    // Login, Logout routes
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.get');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('login');

    // Protected routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/home', [AdminController::class, 'index'])->name('home');

        // >>> ADMIN - Sim
        Route::resource('sims', SimController::class);
        Route::put('sims/{so_id}', [SimController::class, 'update'])->name('sims.update');
        Route::delete('sims/{so_id}', [SimController::class, 'destroy'])->name('sims.destroy');
        

        // >>> ADMIN - Gói Cước
        Route::resource('goi-cuocs', GoiCuocController::class);
        Route::post('/goi-cuoc', [GoiCuocController::class, 'store'])->name('goi_cuoc.store');
        Route::get('goi-cuoc', [GoiCuocController::class, 'index'])->name('goi_cuoc.index');
        Route::put('goi-cuoc/{id}', [GoiCuocController::class, 'update'])->name('goi_cuoc.update');
        Route::delete('goi-cuoc/{id}', [GoiCuocController::class, 'destroy'])->name('goi_cuoc.destroy');
        Route::get('goi-cuoc/dang-ky-cho-duyet', [GoiCuocController::class, 'danhSachDangKyChoDuyet'])->name('goi_cuoc.dang_ky_cho_duyet');
        Route::post('goi-cuoc/{id}/approve', [GoiCuocController::class, 'approve'])->name('goi_cuoc.approve');
        Route::post('goi-cuoc/{id}/reject', [GoiCuocController::class, 'reject'])->name('goi_cuoc.reject');

        // >>> ADMIN - SĐT
        Route::resource('so_dien_thoai', SoDienThoaiController::class);
        Route::put('so_dien_thoai/{id}', [SoDienThoaiController::class, 'update'])->name('so_dien_thoai.update');
        Route::delete('so_dien_thoai/{id}', [SoDienThoaiController::class, 'destroy'])->name('so_dien_thoai.destroy');

        // >>> ADMIN - Tin tức
        Route::resource('tintuc', TinTucController::class);
        Route::post('tintuc', [TinTucController::class, 'store'])->name('tintuc.store');
        Route::put('tintuc/{id}', [TinTucController::class, 'update'])->name('tintuc.update');
        Route::delete('tintuc/{id}', [TinTucController::class, 'destroy'])->name('tintuc.destroy');

        // >>> ADMIN - ĐK gói cước
        Route::get('dang-ky-goi-cuoc', [DangKyGoiCuocController::class, 'index'])->name('dang_ky_goi_cuoc.index');
        Route::get('dang-ky-goi-cuoc/{id}/approve', [DangKyGoiCuocController::class, 'approve'])->name('dang_ky_goi_cuoc.approve');
        Route::get('dang-ky-goi-cuoc/{id}/reject', [DangKyGoiCuocController::class, 'reject'])->name('dang_ky_goi_cuoc.reject');
    });
});

//>>>>>>>>>>>>>>> FRONTEND <<<<<<<<<<<<<<<<

// Trang chủ frontend
Route::get('/', function () {
    return view('frontend.home.home');
})->name('frontend.home.home');

// >>> FRONTEND - Gói cước
Route::get('/goi_cuoc', [FrontendGoiCuocController::class, 'index'])->name('frontend.goicuoc');
Route::post('/dang_ky_goi_cuoc', [FrontendGoiCuocController::class, 'dangKy'])->name('frontend.dangky');

// Các route yêu cầu khách hàng đăng nhập
Route::middleware(['auth:web'])->group(function () {
    Route::get('/lich_su_dang_ky', [FrontendGoiCuocController::class, 'lichSu'])->name('frontend.lichsu');
});


// >>> FRONTEND - Loại thuê bao
Route::prefix('dich-vu/loai-thue-bao')->name('frontend.goicuocloai.')->group(function () {
    Route::get('/', [GoiCuocLoaiController::class, 'index'])->name('index');
    Route::get('/{id}', [GoiCuocLoaiController::class, 'show'])->name('show');
});

// >>> FRONTEND - Dịch vụ đăng ký gói cước
Route::get('/dich-vu/dang-ky-goi-cuoc', [GoiCuocDichVuFrontendController::class, 'index'])->name('frontend.goicuocdichvu.index');

Route::prefix('khach-hang')->name('frontend.')->group(function () {
    Route::get('dang-nhap', [FrontendAuthController::class, 'showLoginForm'])->name('login');
    Route::post('dang-nhap', [FrontendAuthController::class, 'login'])->name('login.post');

    Route::get('dang-ky', [FrontendAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('dang-ky', [FrontendAuthController::class, 'register'])->name('register.post');

    Route::post('dang-xuat', [FrontendAuthController::class, 'logout'])->name('logout');
});

// Fallback route để Laravel không báo lỗi khi gọi route('login')
Route::get('/login', function () {
    return redirect()->route('frontend.login');
})->name('frontend.login.fallback');

