<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoiCuoc extends Model
{
    use HasFactory;

    protected $table = 'goi_cuocs'; // Tên bảng

    // Các trường được phép điền dữ liệu (mass assignable)
    protected $fillable = [
        'ten_goi',          // Tên gói cước
        'gia',              // Giá gói cước
        'nha_mang',         // Nhà mạng (Viettel, Mobifone, Vinaphone,...)
        'mo_ta',            // Mô tả gói cước
        'thoi_han',         // Thời hạn sử dụng (ngày)
        'cu_phap',          // ✅ Cú pháp đăng ký gói cước
    ];

    // Các trường cần chuyển đổi kiểu dữ liệu
    protected $casts = [
        'thoi_han' => 'integer',
    ];
}
