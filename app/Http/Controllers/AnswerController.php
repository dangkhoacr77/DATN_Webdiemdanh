<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        // Dữ liệu giả lập (fake)
        $answers = [
            [
                'Câu hỏi 1' => 'Trả lời 1',
                'Câu hỏi 2' => 'Trả lời 2',
            ],
            [
                'Câu hỏi 1' => 'Trả lời khác',
                'Câu hỏi 2' => 'Trả lời khác 2',
            ],
        ];

        return view('answers.index', compact('answers'));
    }
}
