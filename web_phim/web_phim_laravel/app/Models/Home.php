<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class Home extends Model
{
    use HasFactory;
    public function plusViewMovie($ten_phim, $view_movie)
    {
        return DB::table('phim')
            ->where('ten_phim', $ten_phim)
            ->update(['view_movie' => $view_movie]);
    }
    public function viewsMovie()
    {
        return DB::table('phim')
            ->select('id_phim', 'ten_phim', 'link_anh_phim', 'view_movie')
            ->orderByDesc('view_movie')
            ->limit(10)
            ->get();
    }
    public function autosilders()
    {
        return DB::table('autosilder')
            ->get();
    }
    public function listphim()
    {
        return DB::table('phim')
            ->select('id_phim', 'ten_phim', 'link_anh_phim')
            ->get();
    }
    public function comments()
    {
        return DB::table('binhluan')
            ->select('ten_user', 'content', 'date')
            ->orderByDesc('date')
            ->get();
    }
    public function insertComment($id, $user, $comment, $date)
    {
        return DB::table('binhluan')
            ->insert([
                'id_user' => $id,
                'ten_user' => $user,
                'content' => $comment,
                'date' => $date
            ]);
    }
    public function postFavourite($id_user, $id_phim)
    {
        return DB::table('yeuthich')
            ->insert([
                'id_user' => $id_user,
                'id_phim' => $id_phim,
            ]);
    }
    public function postUnfavourite($id_user, $id_phim)
    {
        return DB::table('yeuthich')
            ->where([
                'id_user' => $id_user,
                'id_phim' => $id_phim
            ])
            ->delete();
    }
    // web Json Functions
    public function listphimJson()
    {
        return DB::table('phim')
            ->get()
            ->toJson();
    }
    public function checkStatusMovieAndView($ten_phim)
    {
        return DB::table('phim')
            ->select('status_practice', 'view_movie')
            ->where('ten_phim', $ten_phim)
            ->get();
    }
}
