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

// Nhóm route cho admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', [AdminController::class, 'getHome'])->name('home');

    // >>> Login - Register
//    Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login');
//    Route::post('login', [AuthController::class, 'login'])->name('admin.login.post');
//    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('admin.register');
//    Route::post('register', [AuthController::class, 'register'])->name('admin.register.post');
//    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');

    // >>> Các route yêu cầu đăng nhập
//    Route::middleware(['auth:admin', 'isAdmin'])->group(function () {
//        Route::get('/home', function () {
//            return view('admin.home');
//        })->name('admin.home');

    // >>> ADMIN - Sim
    Route::resource('sims', SimController::class);
    Route::put('sims/{so_id}', [SimController::class, 'update'])->name('sims.update');

    // >>> ADMIN - Gói Cước
    Route::resource('goi-cuocs', GoiCuocController::class);
    Route::post('/goi-cuoc', [GoiCuocController::class, 'store'])->name('goi_cuoc.store');
    Route::get('goi-cuoc', [GoiCuocController::class, 'index'])->name('goi_cuoc.index');
    Route::post('goi-cuoc', [GoiCuocController::class, 'store'])->name('goi_cuoc.store');
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

    // >>> ADMIN - ĐK gối cước
    Route::get('dang-ky-goi-cuoc', [DangKyGoiCuocController::class, 'index'])->name('dang_ky_goi_cuoc.index');
    Route::get('dang-ky-goi-cuoc/{id}/approve', [DangKyGoiCuocController::class, 'approve'])->name('dang_ky_goi_cuoc.approve');
    Route::get('dang-ky-goi-cuoc/{id}/reject', [DangKyGoiCuocController::class, 'reject'])->name('dang_ky_goi_cuoc.reject');

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
    return view('frontend.home');
})->name('frontend.home');

    Route::get('/goi_cuoc', [FrontendGoiCuocController::class, 'index'])->name('frontend.goicuoc');
    Route::post('/dang_ky_goi_cuoc', [FrontendGoiCuocController::class, 'dangKy'])->name('frontend.dangky');

    // Các route yêu cầu khách hàng đăng nhập
    Route::middleware(['auth:web'])->group(function () {
        Route::get('/lich_su_dang_ky', [FrontendGoiCuocController::class, 'lichSu'])->name('frontend.lichsu');
    });

    Route::get('/tin-tuc', [FrontendTinTucController::class, 'index'])->name('frontend.tin_tuc.index');
    Route::get('/tin-tuc/{id}', [FrontendTinTucController::class, 'show'])->name('frontend.tin_tuc.show');

    Route::prefix('dich-vu/loai-thue-bao')->name('frontend.goicuocloai.')->group(function () {
        Route::get('/', [GoiCuocLoaiController::class, 'index'])->name('index');
        Route::get('/{id}', [GoiCuocLoaiController::class, 'show'])->name('show');
    });

    Route::get('/dich-vu/dang-ky-goi-cuoc', [GoiCuocDichVuFrontendController::class, 'index'])->name('frontend.goicuocdichvu.index');

    // ========== KHÁCH HÀNG AUTH ROUTES ==========
    // Đăng nhập, đăng ký, và đăng xuất cho khách hàng
    Route::get('login', [FrontendAuthController::class, 'showLoginForm'])->name('frontend.login');
    Route::post('login', [FrontendAuthController::class, 'login'])->name('frontend.login.post');
    Route::get('register', [FrontendAuthController::class, 'showRegisterForm'])->name('frontend.register');
    Route::post('register', [FrontendAuthController::class, 'register'])->name('frontend.register.post');
    Route::post('logout', [FrontendAuthController::class, 'logout'])->name('frontend.logout');

    // Fallback route để Laravel không báo lỗi khi gọi route('login')
    Route::get('/login', function () {
        return redirect()->route('frontend.login');
    })->name('frontend.login.fallback');



// Trang bài đăng frontend
// Route::get('/bai-dang', [BaiDangController::class, 'frontendIndex'])->name('bai_dang.index');
// Route::get('/bai-dang/{id}', [BaiDangController::class, 'show'])->name('bai_dang.show');

