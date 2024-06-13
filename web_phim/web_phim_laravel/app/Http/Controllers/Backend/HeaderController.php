<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeaderModel;
use App\Models\Home;
use App\Models\Users;

class HeaderController extends Controller
{
    //Loai
    private $comment;
    public function __construct(Home $home)
    {
        $this->comment = $home->comments();
    }
    public function loai3d(HeaderModel $header)
    {
        $category = $header->loai3d();
        $comments = $this->comment;
        return view('clients.blocks.Loai.3d', compact('comments', 'category'));
    }
    public function loai2d(HeaderModel $header)
    {
        $category = $header->loai2d();
        $comments = $this->comment;
        return view('clients.blocks.Loai.2d', compact('comments', 'category'));
    }
    public function loaianime(HeaderModel $header)
    {
        $category = $header->loaianime();
        $comments = $this->comment;
        return view('clients.blocks.Loai.anime', compact('comments', 'category'));
    }
    public function loaikhac(HeaderModel $header)
    {
        $category = $header->loaikhac();
        $comments = $this->comment;
        return view('clients.blocks.Loai.khac', compact('comments', 'category'));
    }

    public function xemNhieu(HeaderModel $header)
    {
        $topviews = $header->xemNhieu();
        $comments = $this->comment;
        return view('clients.blocks.xemNhieu', compact('comments', 'topviews'));
    }
    public function moiCapNhat(HeaderModel $header)
    {
        $moiCapNhat = $header->moiCapNhat();
        $comments = $this->comment;
        return view('clients.blocks.moiCapNhat', compact('moiCapNhat', 'comments'));
    }
    public function yeuThich(HeaderModel $header, Users $users)
    {
        $id = ($users->CheckIdUsers(session('islogedin')))[0];
        $yeuThich = $header->yeuThich($id->id);
        $comments = $this->comment;
        return view('clients.blocks.yeuThich', compact('comments', 'yeuThich'));
    }
    public function listPagesMovies(HeaderModel $header, Users $users)
    {
        $comments = $this->comment;
        return view('clients.blocks.inforMovies.inforMovies', compact('comments'));
    }
    public function listOnePagesMovies(HeaderModel $header, Users $users, Home $home, Request $request)
    {
        $status_practice = ($home->checkStatusMovieAndView($request->ten_phim))[0]->status_practice;
        $view_movie = ($home->checkStatusMovieAndView($request->ten_phim))[0]->view_movie;
        if ($request->id_phim < 1 || $request->id_phim > $status_practice) {
            return abort(404);
        }
        $home->plusViewMovie($request->ten_phim, $view_movie + 1);
        $comments = $this->comment;
        return view('clients.blocks.inforMovies.inforOneMovies', compact('comments'));
    }
}
