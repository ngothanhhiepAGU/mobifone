<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaiDang extends Model
{
    use HasFactory, SoftDeletes; // Thêm SoftDeletes để hỗ trợ xóa mềm

    protected $table = 'bai_dangs';
    protected $appends = ['image_url', 'days_since_posted']; // Thêm trường days_since_posted

    protected $fillable = [
        'tieu_de',
        'noi_dung',
        'tac_gia',
        'hinh_anh',
        'ngay_dang',
        'the_loai', // Nếu đã thêm trường 'the_loai'
    ];

    // Chuyển đổi ngày đăng thành kiểu Carbon
    protected $dates = ['ngay_dang'];

    // Lấy đường dẫn URL của hình ảnh
    public function getImageUrlAttribute()
    {
        return $this->hinh_anh 
            ? asset('storage/' . $this->hinh_anh) 
            : asset('images/default.png'); // ảnh mặc định
    }

    // Tính số ngày kể từ khi bài đăng được đăng
    public function getDaysSincePostedAttribute()
    {
        return $this->ngay_dang ? Carbon::parse($this->ngay_dang)->diffInDays(Carbon::now()) : null;
    }

    // Xử lý ngày đăng, đảm bảo luôn có giá trị hợp lệ
    public static function boot()
{
    parent::boot();

    static::creating(function ($baiDang) {
        if (!$baiDang->ngay_dang) {
            $baiDang->ngay_dang = Carbon::now(); // Đảm bảo ngày đăng không null
        }
    });

    static::updating(function ($baiDang) {
        if (!$baiDang->ngay_dang) {
            $baiDang->ngay_dang = Carbon::now(); // Đảm bảo ngày đăng không null khi cập nhật
        }
    });
}

}
