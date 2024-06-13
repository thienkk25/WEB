<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Admin extends Model
{
    use HasFactory;
    //account for
    public function showAccount()
    {
        return DB::table('account')
            ->get();
    }
    public function showOneUser($id)
    {
        return DB::table('account')
            ->select('user', 'password', 'role', 'email')
            ->where('id', '=', $id)
            ->get();
    }
    public function editAccount($id, $user, $password, $role, $email)
    {
        return DB::table('account')
            ->where('id', '=', $id)
            ->update([
                'user' => $user,
                'password' => $password,
                'role' => $role,
                'email' => $email,
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
            ]);
    }
    public function insertAccount($user, $password, $role, $email)
    {
        return DB::table('account')
            ->insert(
                [
                    'user' => $user,
                    'password' => $password,
                    'role' => $role,
                    'email' => $email,
                    'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
                ]
            );
    }
    public function deleteAccount($id)
    {
        return DB::table('account')
            ->where('id', '=', $id)
            ->delete();
    }
    //movies for
    public function showMovies()
    {
        return DB::table('phim')
            ->get();
    }
    public function showOneMovie($id_phim)
    {
        return DB::table('phim')
            ->select('ten_phim', 'link_anh_phim')
            ->where('id_phim', '=', $id_phim)
            ->get();
    }
    public function editMovie($id_phim, $ten_phim, $link_anh_phim)
    {
        return DB::table('phim')
            ->where('id_phim', '=', $id_phim)
            ->update([
                'ten_phim' => $ten_phim,
                'link_anh_phim' => $link_anh_phim,
            ]);
    }
    public function insertMovie($ten_phim, $link_anh_phim)
    {
        return DB::table('phim')
            ->insert(
                [
                    'ten_phim' => $ten_phim,
                    'link_anh_phim' => $link_anh_phim,
                ]
            );
    }
    public function deleteMovie($id_phim)
    {
        return DB::table('phim')
            ->where('id_phim', '=', $id_phim)
            ->delete();
    }
    //comments for
    public function showComments()
    {
        return DB::table('binhluan')
            ->get();
    }
    public function showOneComment($soluong)
    {
        return DB::table('binhluan')
            ->select('id_user', 'ten_user', 'content', 'date')
            ->where('soluong', '=', $soluong)
            ->get();
    }
    public function editComment($soluong, $id_user, $ten_user, $content, $date)
    {
        return DB::table('binhluan')
            ->where('soluong', '=', $soluong)
            ->update([
                'id_user' => $id_user,
                'ten_user' => $ten_user,
                'content' => $content,
                'date' => $date,
            ]);
    }
    public function insertComment($id_user, $ten_user, $content)
    {
        return DB::table('binhluan')
            ->insert(
                [
                    'id_user' => $id_user,
                    'ten_user' => $ten_user,
                    'content' => $content,
                    'date' =>  Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
                ]
            );
    }
    public function deleteComment($soluong)
    {
        return DB::table('binhluan')
            ->where('soluong', '=', $soluong)
            ->delete();
    }
}
