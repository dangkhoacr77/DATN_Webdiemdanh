<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create()
    {
        // Nếu bạn dùng layout chung:
        // return view('forms.create');
        // Hoặc nếu bạn chưa có folder forms, tạo folder:

        return view('forms.create');
    }

    // Tuỳ chọn: handle lưu form
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        \App\Models\Form::create($data);

        return redirect()->route('home')
                         ->with('success', 'Tạo biểu mẫu thành công.');
    }
}
