<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sim extends Model
{
    use HasFactory;

    protected $table = 'sims'; // Tên bảng

    // Các trường được phép điền dữ liệu (mass assignable)
    protected $fillable = [
        'so_sim',           // Số SIM
        'loai_sim',         // Loại SIM (trả trước, trả sau,...)
        'nha_mang',         // Nhà mạng (Viettel, Mobifone, Vinaphone,...)
        'trang_thai',       // Trạng thái (kích hoạt, chưa kích hoạt, chặn)
        'ngay_kich_hoat',   // Ngày kích hoạt
    ];

    // Các trường cần chuyển đổi kiểu dữ liệu
    protected $casts = [
        'ngay_kich_hoat' => 'date', // Đảm bảo 'ngay_kich_hoat' được xử lý như kiểu dữ liệu ngày tháng
    ];

    // Các phương thức truy vấn hoặc xử lý dữ liệu khác có thể thêm vào nếu cần
}
