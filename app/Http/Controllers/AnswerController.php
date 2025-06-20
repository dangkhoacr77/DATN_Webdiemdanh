<?php

namespace App\Http\Controllers;

use App\Models\DiemDanh;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Hiển thị danh sách tất cả câu trả lời của người dùng cho từng biểu mẫu.
     */
    public function index()
    {
        // Lấy toàn bộ dữ liệu điểm danh, kèm người trả lời (tài khoản) và các câu trả lời + câu hỏi tương ứng
        $diemDanhs = DiemDanh::with([
            'taiKhoan',                  // người trả lời
            'cauTraLoi.cauHoi'          // câu hỏi và câu trả lời
        ])->orderBy('thoi_gian_diem_danh', 'desc')->get();

        return view('answers.index', compact('diemDanhs'));
    }
}
git add .
git commit -m Duy: chỉnh sữa câu trả lời
git push