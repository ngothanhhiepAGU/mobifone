<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sim extends Model
{
    use HasFactory;

    protected $table = 'sims'; // Tên bảng

    protected $fillable = [
        'so_sim',
        'loai_sim',
        'nha_mang',
        'trang_thai',
        'ngay_kich_hoat',
    ];

    protected $casts = [
        'ngay_kich_hoat' => 'date',
    ];
}
