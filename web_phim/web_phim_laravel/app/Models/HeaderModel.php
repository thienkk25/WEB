<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HeaderModel extends Model
{
    use HasFactory;

    public function loai3d()
    {
        return DB::table('phim')
            ->select('ten_phim', 'link_anh_phim')
            ->where('category', '=', '3d')
            ->get();
    }
    public function loai2d()
    {
        return DB::table('phim')
            ->select('ten_phim', 'link_anh_phim')
            ->where('category', '=', '2d')
            ->get();
    }
    public function loaianime()
    {
        return DB::table('phim')
            ->select('ten_phim', 'link_anh_phim')
            ->where('category', '=', 'anime')
            ->get();
    }
    public function loaikhac()
    {
        return DB::table('phim')
            ->select('ten_phim', 'link_anh_phim')
            ->where('category', '=', 'other')
            ->get();
    }

    public function xemNhieu()
    {
        return DB::table('phim')
            ->select('id_phim', 'ten_phim', 'link_anh_phim', 'view_movie')
            ->orderByDesc('view_movie')
            ->get();
    }
    public function moiCapNhat()
    {

        return DB::table('phim')
            ->select('ten_phim', 'link_anh_phim')
            ->orderByDesc('id_phim')
            ->get();
    }
    public function yeuThich($id_user)
    {
        return DB::table('yeuthich')
            ->join('phim', 'yeuthich.id_phim', 'phim.id_phim')
            ->where([
                'id_user' => $id_user
            ])
            ->get();
    }
}
