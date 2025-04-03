<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getHome()
    {
        return view('admin.home'); // Đường dẫn phải đúng với thư mục views
    }
}
