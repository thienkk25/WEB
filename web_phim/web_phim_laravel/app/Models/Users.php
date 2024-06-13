<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use function Psy\debug;

class Users extends Model
{
    use HasFactory;
    // //RAW
    // public function checklogin($user, $password)
    // {
    //     return DB::select('SELECT * FROM account WHERE `user` = ? and `password` = ?', [$user, $password]);
    // }
    // public function insertUser($user, $password)
    // {
    //     return DB::insert('INSERT INTO `account` VALUES (NULL, ?, ?, 0)', [$user, $password]);
    // }
    //----------------------------------------------------------------
    //
    public function checklogin($user, $password)
    {
        // return DB::select('SELECT * FROM account WHERE (`user` = ? and `password` = ?) or (`email` = ? and `password` = ?)', [$user, $password, $user, $password]);
        return DB::table('account')
            ->select('user')
            ->where([
                'user' => $user,
                'password' => $password
            ])
            ->get();
    }
    public function insertUser($user, $password, $email)
    {
        return DB::table('account')
            ->insert([
                'user' => $user,
                'password' => $password,
                'email' => $email,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
            ]);
    }
    public function insertTokenForgot($email, $tokenForgot)
    {
        return DB::table('account')
            ->where(['email' => $email])
            ->update(['remember_token' => $tokenForgot]);
    }
    public function checkToken($email, $tokenForgot)
    {
        return DB::table('account')
            ->select('email', 'remember_token')
            ->where([
                'email' => $email,
                'remember_token' => $tokenForgot
            ])
            ->get();
    }
    public function updateUser($email, $password)
    {
        return DB::table('account')
            ->where(['email' => $email])
            ->update([
                'password' => $password,
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
            ]);
    }
    public function checkDives($last_session)
    {
        return DB::table('account')
            ->select('last_session')
            ->where([
                'last_session' => $last_session
            ])
            ->get();
    }
    public function updateDives($user, $last_session)
    {
        return DB::table('account')
            ->where('user', $user)
            ->update(['last_session' => $last_session]);
    }
    public function CheckIdUsers($user)
    {
        return DB::table('account')
            ->select('id')
            ->where('user', $user)
            ->get();
    }
}
