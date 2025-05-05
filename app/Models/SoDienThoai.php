<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoDienThoai extends Model
{
    use HasFactory;

    // Tên bảng tương ứng trong cơ sở dữ liệu
    protected $table = 'so_dien_thoai';

    // Các trường có thể được gán
    protected $fillable = ['so', 'chu_so_huu'];
}
