<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminAccountController extends Controller
{
    public function index()
    {
        return view('admin.account-manager');
    }
}
