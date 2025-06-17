<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Hiển thị form login
    public function showForm()
    {
        return view('auth.login');
    }

    // Xử lý login
    public function login(Request $request)
    {
        // 1. Validate dữ liệu
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Thử xác thực
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // 3. Regenerate session để tránh session fixation
            $request->session()->regenerate();

            // 4. Redirect về intended page hoặc trang home
            return redirect()->intended(route('home'));
        }

        // 5. Nếu thất bại, trả về form với lỗi
        return back()
            ->withErrors(['email' => 'Email hoặc mật khẩu không đúng.'])
            ->onlyInput('email');
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
}
