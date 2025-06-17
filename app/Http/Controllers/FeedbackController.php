<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 1. Thêm dòng import facade Log:
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'feedback' => 'required|string|max:255',
        ]);

        // 2. Gọi Log::info() (không cần dấu \ phía trước)
        Log::info('User feedback: ' . $data['feedback']);

        return redirect()->route('home')
                         ->with('success', 'Cảm ơn phản hồi của bạn!');
    }
}
