<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Log::info('Admin login attempt', ['email' => $credentials['email']]);

        // Kiểm tra thủ công trước khi attempt
        $admin = \App\Models\Admin::where('email', $credentials['email'])->first();
        if ($admin) {
            Log::info('Admin found', ['admin' => $admin->toArray()]);
            if (\Hash::check($credentials['password'], $admin->password)) {
                Log::info('Password matches');
            } else {
                Log::warning('Password does not match');
            }
        } else {
            Log::warning('Admin not found', ['email' => $credentials['email']]);
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();
            Log::info('Admin login successful', ['admin' => $admin->toArray()]);

            // Lưu thông tin vào session mặc định
            $token = bin2hex(random_bytes(32));
            $request->session()->put('admin_token', $token);
            $request->session()->put('admin_ip', $request->ip());
            $request->session()->put('admin_user_agent', $request->header('User-Agent'));

            return redirect()->intended('/admin/home');
        }

        Log::warning('Admin login failed', ['email' => $credentials['email']]);
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ])->withInput();
    }

    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        Log::info('Admin logout', ['admin_id' => Auth::guard('admin')->id()]);

        Auth::guard('admin')->logout();
        $request->session()->forget('admin_token');
        $request->session()->forget('admin_ip');
        $request->session()->forget('admin_user_agent');

        return redirect()->route('admin.login.get');
    }
}