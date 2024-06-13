<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CheckUser;
use App\Http\Requests\CheckRegister;
use App\Models\Users;
use Illuminate\Support\Facades\Cache;

class LoginRegisterController extends Controller
{
    //get login form
    public function login()
    {
        return view('clients.login.login');
    }
    //post login form
    public function checkLogin(CheckUser $CheckUser, Users $Users)
    {
        $ok = $Users->checkLogin($CheckUser->user, $CheckUser->password);
        if (empty($ok[0])) {
            return redirect()->route('login')->with('msg', 'Tài khoản hoặc mật khẩu không chính xác')->with('againUser', $CheckUser->user);
        } else {
            session()->put('islogedin', $CheckUser->user);
            $Users->updateDives($CheckUser->user, session()->getId());
            return redirect()->route('home');
        }
    }
    //get register form
    public function register()
    {
        return view('clients.login.register');
    }
    //post register form
    public function checkRegister(CheckRegister $CheckRegister, Users $Users)
    {
        if ($CheckRegister->password === $CheckRegister->passwordAgain) {
            $ok = $Users->insertUser($CheckRegister->user, $CheckRegister->password, $CheckRegister->email);
            if (!empty($ok)) {
                return redirect()->route('login')->with('msg', 'Đăng ký thành công');
            } else {
                return back()->with('msg', 'Đăng ký thất bại, vui lòng thử lại');
            }
        } else {
            return back()->with('msg', 'Mật khẩu không trùng khớp, vui lòng nhập lại')->with('againUser', $CheckRegister->user);
        }
    }
    public function updateAccount(Request $request)
    {
        // Kiểm tra thời gian trước khi cho phép truy cập
        if (now() > Cache::get($request->tokenForgot)) {
            Cache::forget($request->tokenForgot);
        } else {
            return view('clients.login.updateAccount');
        }
        return redirect()->route('login')->with('msg', 'Hết quyền truy cập');
    }

    public function postupdateAccount(Request $request, Users $users)
    {
        $request->validate([
            'password' => 'required',
            'passwordAgain' => 'required',
            'email' => 'required',
            'code' => 'required'
        ], [
            'password.required' => 'Mật khẩu bắt buộc',
            'passwordAgain.required' => 'Mật khẩu bắt buộc',
            'email.required' => 'Email bắt buộc',
            'code.required' => 'Mã xác thực không được để trống'
        ]);
        if ($request->password === $request->passwordAgain) {
            $ok = $users->checkToken($request->email, $request->code);
            if (!empty($ok[0])) {
                $users->updateUser($request->email, $request->password);
                return back()->with('msg', 'Cập nhật thành công');
            } else {
                return back()->with('msg', 'Cập nhật thất bại, vui lòng thử lại');
            }
        } else {
            return back()->with('msg', 'Mật khẩu không trùng khớp, vui lòng nhập lại')->with('againUser', $request->email);
        }
    }

    public function logout()
    {
        session()->forget('islogedin');
        return redirect()->route('home');
    }
}
