<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class ForgotController extends Controller
{
    public function showForm()
    {
        return view('auth.forgot-password');
    }

    public function sendCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $code = rand(100000, 999999);

        Session::put('reset_email', $request->email);
        Session::put('reset_code', $code);

        Mail::raw("Mã xác nhận của bạn là: $code", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Mã xác nhận đặt lại mật khẩu');
        });

        return back()->with('status', 'Mã xác nhận đã được gửi đến email của bạn');
    }

    public function verifyCode(Request $request)
    {
        $request->validate(['code' => 'required']);
        $storedCode = Session::get('reset_code');
        $email = Session::get('reset_email');

        if ($storedCode == $request->code && $email) {
            return redirect()->route('password.reset', ['token' => 'manual-code', 'email' => $email]);
        }

        return back()->withErrors(['code' => 'Mã xác nhận không đúng hoặc đã hết hạn']);
    }
}
