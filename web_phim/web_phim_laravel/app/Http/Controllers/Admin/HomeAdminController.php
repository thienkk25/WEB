<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class HomeAdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    //qltk.admin
    public function homeQltk(Admin $admin)
    {
        $listAccount = $admin->showAccount();
        return view('admin.navbar.manageAccount.qltk', compact('listAccount'));
    }
    public function addAccount()
    {
        return view('admin.navbar.manageAccount.add');
    }
    public function postaddAccount(Request $request, Admin $admin)
    {
        $request->validate(
            [
                'user' => 'required|min:6|unique:account,user',
                'password' => 'required',
                'role' => 'required',
                'email' => 'required|unique:account,email'
            ],
            [
                'user.required' => 'Tên tài khoản bắt buộc',
                'user.min' => 'Tên tài khoản không nhỏ hơn 6 ký tự',
                'user.unique' => 'Tên tài khoản đã có trên hệ thống, vui lòng thử lại',
                'password.required' => 'Mật khẩu bắt buộc',
                'role.required' => 'Vai trò bắt buộc',
                'email.required' => 'Email bắt buộc',
                'email.unique' => 'Email đã có trên hệ thống, vui lòng thử lại'
            ]
        );
        $ok = $admin->insertAccount($request->user, $request->password, $request->role, $request->email);
        if ($ok) {
            return back()->with('msg', 'Thành công');
        }
        return back()->with('msg', 'Thất bại');
    }
    public function editQltk(Request $request, Admin $admin)
    {
        session(['id' => $request->id]);
        $between = $admin->showOneUser($request->id);
        $show = $between[0];
        return view('admin.navbar.manageAccount.edit', compact('show'));
    }
    public function postEditQltk(Request $request, Admin $admin)
    {
        $request->validate(
            [
                'user' => 'required|min:6|unique:account,user,' . session('id'),
                'password' => 'required',
                'role' => 'required',
                'email' => 'required|unique:account,email,' . session('id'),
            ],
            [
                'user.required' => 'Tên tài khoản bắt buộc',
                'user.min' => 'Tên tài khoản không nhỏ hơn 6 ký tự',
                'user.unique' => 'Tên tài khoản đã có trên hệ thống, vui lòng thử lại',
                'password.required' => 'Mật khẩu bắt buộc',
                'role.required' => 'Vai trò bắt buộc',
                'email.required' => 'Email bắt buộc',
                'email.unique' => 'Email đã có trên hệ thống, vui lòng thử lại'
            ]
        );
        $ok = $admin->editAccount(session('id'), $request->user, $request->password, $request->role, $request->email);
        if ($ok) {
            return back()->with('msg', 'Cập nhật thành công');
        }
        return back()->with('msg', 'Cập nhật thất bại, vui lòng thử lại');
    }
    public function getDeleteQltk(Request $request, Admin $admin)
    {
        $ok = $admin->deleteAccount($request->id);
        if ($ok) {
            return back()->with('msg', 'Xóa thành công');
        }
        return back()->with('msg', 'Xóa thất bại, vui lòng thử lại');
    }
    //qlphim.admin
    public function homeQlphim(Admin $admin)
    {
        $listMovies = $admin->showMovies();
        return view('admin.navbar.manageMovie.qlphim', compact('listMovies'));
    }
    public function addMovies()
    {
        return view('admin.navbar.manageMovie.add');
    }
    public function postaddMovies(Request $request, Admin $admin)
    {
        $request->validate(
            [
                'ten_phim' => 'required',
                'link_anh_phim' => 'required',
            ],
            [
                'ten_phim.required' => 'Tên bắt buộc',
                'link_anh_phim.required' => 'Đương dẫn ảnh bắt buộc',
            ]
        );
        $ok = $admin->insertMovie($request->ten_phim, $request->link_anh_phim);
        if ($ok) {
            return back()->with('msg', 'Thành công');
        }
        return back()->with('msg', 'Thất bại');
    }
    public function editQlphim(Request $request, Admin $admin)
    {
        session(['id_phim' => $request->id_phim]);
        $between = $admin->showOneMovie($request->id_phim);
        $show = $between[0];
        return view('admin.navbar.manageMovie.edit', compact('show'));
    }
    public function postEditQlphim(Request $request, Admin $admin)
    {
        $request->validate(
            [
                'ten_phim' => 'required',
                'link_anh_phim' => 'required',
            ],
            [
                'ten_phim.required' => 'Tên phim bắt buộc',
                'link_anh_phim.required' => 'Đường dẫn ảnh bắt buộc',
            ]
        );
        $ok = $admin->editMovie(session('id_phim'), $request->ten_phim, $request->link_anh_phim);
        if ($ok) {
            return back()->with('msg', 'Cập nhật thành công');
        }
        return back()->with('msg', 'Cập nhật thất bại, vui lòng thử lại');
    }
    public function getDeleteQlphim(Request $request, Admin $admin)
    {
        $ok = $admin->deleteMovie($request->id_phim);
        if ($ok) {
            return back()->with('msg', 'Xóa thành công');
        }
        return back()->with('msg', 'Xóa thất bại, vui lòng thử lại');
    }
    //qlcomment.admin
    public function homeQlcomment(Admin $admin)
    {
        $listComments = $admin->showComments();
        return view('admin.navbar.manageComment.qlcomment', compact('listComments'));
    }
    public function addComment()
    {
        return view('admin.navbar.manageComment.add');
    }
    public function postaddComment(Request $request, Admin $admin)
    {
        $request->validate(
            [
                'id_user' => 'required',
                'ten_user' => 'required',
                'content' => 'required',
            ],
            [
                'id_user.required' => 'Id tài khoản bắt buộc',
                'ten_user.required' => 'Tên bắt buộc',
                'content.required' => 'Bình luận bắt buộc',
            ]
        );
        $ok = $admin->insertComment($request->id_user, $request->ten_user, $request->content);
        if ($ok) {
            return back()->with('msg', 'Thành công');
        }
        return back()->with('msg', 'Thất bại');
    }
    public function editQlcomment(Request $request, Admin $admin)
    {
        session(['soluong' => $request->soluong]);
        $between = $admin->showOneComment($request->soluong);
        $show = $between[0];
        return view('admin.navbar.manageComment.edit', compact('show'));
    }
    public function postEditQlcomment(Request $request, Admin $admin)
    {
        $request->validate(
            [
                'id_user' => 'required',
                'ten_user' => 'required',
                'content' => 'required',
                'date' => 'required',
            ],
            [
                'id_user.required' => 'Id bắt buộc',
                'ten_user.required' => 'Tên tài khoản bắt buộc',
                'content.required' => 'Bình luận bắt buộc',
                'date.required' => 'Ngày bắt bắt buộc',
            ]
        );
        $ok = $admin->editComment(session('soluong'), $request->id_user, $request->ten_user, $request->content, $request->date);
        if ($ok) {
            return back()->with('msg', 'Cập nhật thành công');
        }
        return back()->with('msg', 'Cập nhật thất bại, vui lòng thử lại');
    }
    public function getDeleteQlcomment(Request $request, Admin $admin)
    {
        $ok = $admin->deleteComment($request->soluong);
        if ($ok) {
            return back()->with('msg', 'Xóa thành công');
        }
        return back()->with('msg', 'Xóa thất bại, vui lòng thử lại');
    }
}
