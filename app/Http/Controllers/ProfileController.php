<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // import Auth

class ProfileController extends Controller
{
    public function index()
    {
        // Nếu bạn muốn dùng user thật (khi đã login):
        $user = Auth::user();

        // Hoặc nếu bạn cần dữ liệu mẫu (chưa login):
        if (! $user) {
            $user = (object)[
                'name'       => 'Nguyễn Văn A',
                'email'      => 'nguyenvana@example.com',
                'avatar_url' => asset('images/default-avatar.png'),
                'joined_at'  => now()->subYear(), // tham số ví dụ
            ];
        }

        // Truyền biến $user vào view
        return view('profile', compact('user'));
    }
}
