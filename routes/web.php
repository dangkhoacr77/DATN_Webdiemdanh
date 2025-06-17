<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\FormSettingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showForm'])
     ->name('register.form');

Route::post('/register', [RegisterController::class, 'register'])
     ->name('register.post');

     // Hiển thị form Đăng nhập
Route::get('/login', [LoginController::class, 'showForm'])
     ->name('login.form');

// Xử lý POST Đăng nhập
Route::post('/login', [LoginController::class, 'login'])
     ->name('login.post');

// Đăng xuất (tuỳ chọn)
Route::post('/logout', [LoginController::class, 'logout'])
     ->name('logout');

     Route::get('/', [HomeController::class, 'index'])
     ->name('home');

Route::middleware('auth')->group(function () {
    // Trang hồ sơ người dùng
    Route::get('/profile', [ProfileController::class, 'index'])
         ->name('profile');
});
Route::get('/forms/create', [FormController::class, 'create'])
     ->name('forms.create');

// (Tuỳ chọn) Nếu bạn muốn xử lý lưu dữ liệu luôn:
Route::post('/forms', [FormController::class, 'store'])
     ->name('forms.store');

     Route::post('/feedback', function(Request $request) {
    // 1. Validate nếu cần
    $data = $request->validate([
        'feedback' => 'required|string|max:255',
    ]);

    // 2. Xử lý dữ liệu (ví dụ ghi log, gửi mail, lưu DB...)
    Log::info('User feedback: ' . $data['feedback']);

    // 3. Redirect về trang home với message
    return redirect()->route('home')
                     ->with('success', 'Cảm ơn phản hồi của bạn!');
})
->name('feedback.submit');


Route::get('/reset-password-form', [ResetPasswordController::class, 'showForm'])->name('reset.form');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('reset.password');


Route::get('/forgot-password', [ForgotController::class, 'showForm'])->name('forgot.form');
Route::post('/forgot-password/send-code', [ForgotController::class, 'sendCode'])->name('forgot.sendCode');
Route::post('/forgot-password/verify-code', [ForgotController::class, 'verifyCode'])->name('forgot.verifyCode');

//admin
Route::middleware(['auth', 'admin'])->group(function () {
     Route::get('/admin/statistics', function () {
         return view('admin.statistics');
     })->name('admin.statistics');
 });
// Câu trả lời
 
 Route::get('/answers', [AnswerController::class, 'index'])->name('answers.index');
 //Form setting
 Route::middleware('auth')->group(function () {
Route::get('/forms/{form}/settings', [FormSettingController::class, 'edit'])->name('settings.edit');
Route::put('/forms/{form}/settings', [FormSettingController::class, 'update'])->name('settings.update');
 });

 Route::post('/settings/save', [FormSettingController::class, 'store'])->name('settings.save');