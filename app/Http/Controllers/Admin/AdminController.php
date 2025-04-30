<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // <- thêm dòng này nếu chưa có

class AdminController extends Controller
{
    public function getHome()
    {
        return view('admin.home');
    }
}
