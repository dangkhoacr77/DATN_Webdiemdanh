<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\FormSetting;

class FormSettingController extends Controller
{
    public function edit()
    {
        
        return view('forms.setting');
    }

    // public function update(Request $request, $formId)
    // {
    //     $validated = $request->validate([
    //         'enable_time_limit' => 'nullable|boolean',
    //         'time_limit' => 'nullable|integer',
    //         'enable_participant_limit' => 'nullable|boolean',
    //         'participant_limit' => 'nullable|integer',
    //         'geo_location' => 'nullable|boolean',
    //         'device_name' => 'nullable|boolean',
    //         'email_account' => 'nullable|boolean',
    //     ]);

    //     FormSetting::updateOrCreate(
    //         ['form_id' => $formId],
    //         $validated
    //     );

    //     Log::info("Cập nhật cài đặt form $formId", $validated);

    //     return redirect()->back()->with('success', 'Cài đặt đã được lưu!');
    // }
}
