<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiDang extends Model
{
    use HasFactory;

    protected $table = 'bai_dangs';

    protected $fillable = [
        'tieu_de',
        'noi_dung',
        'tac_gia',
        'hinh_anh',
        'ngay_dang',
    ];
}
