<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function showForm()
    {
        // Chỉ cho phép hiển thị form nếu email đã xác minh
        if (!Session::has('reset_email')) {
            return redirect()->route('forgot.form')->withErrors(['email' => 'Vui lòng xác minh mã trước']);
        }

        return view('auth.reset-password');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $email = Session::get('reset_email');

        if (!$email) {
            return redirect()->route('forgot.form')->withErrors(['email' => 'Email không hợp lệ hoặc phiên làm việc đã hết hạn.']);
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('forgot.form')->withErrors(['email' => 'Không tìm thấy người dùng.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Xóa session để tránh reset lại lần nữa
        Session::forget('reset_email');
        Session::forget('reset_code');

        return redirect()->route('login.form')->with('status', 'Mật khẩu đã được đặt lại thành công!');
    }
}
