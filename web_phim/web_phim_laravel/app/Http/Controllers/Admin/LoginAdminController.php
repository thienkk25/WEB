<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginAdminController extends Controller
{
    public function login()
    {
        return view('admin.login.login');
    }
    public function checkLogin(Request $request)
    {
        $request->validate(
            [
                'user' => 'required',
                'password' => 'required'
            ],
            [
                'user.required' => 'Tài khoản bắt buộc',
                'password.required' => 'Mật khẩu bắt buộc',
            ]
        );
        if ($request->user === 'admin' && $request->password === 'a') {
            session()->put('isAdmin', true);
            return redirect()->route('admin.dashboard');
        }
        return back()->with('msg', 'Tài khoản hoặc mật khẩu không đúng');
    }
    public function logout()
    {
        session()->forget('isAdmin');
        return redirect()->route('admin.login');
    }
}
