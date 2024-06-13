<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Events\ChatOnlineEvent;

class HomeController extends Controller
{
    public function index(Home $home)
    {
        $autosliders = $home->autosilders();
        $listphim = $home->listphim();
        $topview = $home->viewsMovie();
        $comments = $home->comments();
        return view('index', compact('autosliders', 'listphim', 'topview', 'comments'));
    }
    public function insertComment(Request $request, Home $home)
    {
        $data = DB::table('account')->where(['user' => session('islogedin')])->get();
        foreach ($data as $value) {
            $id = $value->id;
            $user = $value->user;
            $comment = $request->content;
            $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
            $home->insertComment($id, $user, $comment, $date);
            //
            event(new ChatOnlineEvent($user, $comment, $date));
            return response()->json(['success' => true]);
        }
    }
    public function postFavourite(Request $request, Home $home)
    {
        $data = DB::table('account')->select('id')->where(['user' => session('islogedin')])->get();
        foreach ($data as $value) {
            $checkFavourite = DB::table('yeuthich')
                ->select('id_phim')
                ->where([
                    'id_user' => $value->id,
                    'id_phim' => $request->input('id_phim')
                ])
                ->get();

            if (empty($checkFavourite[0])) {
                $id_user = $value->id;
                $id_phim = $request->input('id_phim');
                $home->postFavourite($id_user, $id_phim);
            }
        }
    }
    public function postUnfavourite(Request $request, Home $home)
    {
        $data = DB::table('account')->select('id')->where(['user' => session('islogedin')])->get();
        if ($data) {
            $id_user = $data[0]->id;
            $id_phim = $request->input('id_phim');
            $home->postUnfavourite($id_user, $id_phim);
        }
    }
    // web json function
    public function listphimJson(Home $home)
    {
        $listphim = $home->listphimJson();
        return $listphim;
    }
}
