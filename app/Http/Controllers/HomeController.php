<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Dùng dữ liệu giả thay vì gọi từ database
        $forms = [
            (object)[
                'title' => 'Biểu mẫu 1',
                'description' => 'Mô tả biểu mẫu 1',
                'created_at' => now()
            ],
            (object)[
                'title' => 'Biểu mẫu 2',
                'description' => 'Mô tả biểu mẫu 2',
                'created_at' => now()->subDays(2)
            ]
        ];

        return view('home', compact('forms'));
    }
}
