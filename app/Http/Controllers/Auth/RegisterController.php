<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    // Hiển thị form
    public function showForm()
    {
        return view('auth.register');
    }

    // Xử lý POST đăng ký
    public function register(Request $request)
    {
        // 1. Validate dữ liệu
        $data = $request->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Tạo user mới
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // 3. (Tùy chọn) Đăng nhập ngay
        auth()->login($user);

        // 4. Redirect về trang cần thiết
        return redirect()->route('home')
                         ->with('success', 'Đăng ký thành công! Chào mừng bạn, ' . $user->name);
    }
}
