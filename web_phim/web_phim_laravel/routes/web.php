<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LoginRegisterController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\PHPMailerControler;
use App\Http\Controllers\Backend\HeaderController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\HomeAdminController;

//Home
Route::get('/', [HomeController::class, 'index'])->middleware('isSingleDives')->name('home');
// post favourite user
Route::post('/favourite', [HomeController::class, 'postFavourite'])->middleware('isSingleDives')->name('postFavourite');
Route::post('/unfavourite', [HomeController::class, 'postUnfavourite'])->middleware('isSingleDives')->name('postUnfavourite');
// post insert comment
Route::post('/comment', [HomeController::class, 'insertComment'])->middleware('isSingleDives')->name('insertComment');
// list phim json
// Route::get('/listphimJson', [HomeController::class, 'listphimJson'])->name('listphimJson');
//Movie infor
Route::get('/phim/{ten_phim}', [HeaderController::class, 'listPagesMovies'])->middleware('isSingleDives')->name('phim.ten_phim');
Route::get('/phim/{ten_phim}/{id_phim}', [HeaderController::class, 'listOnePagesMovies'])->middleware('isSingleDives')->name('phim.ten_phim.id_phim');


//Header
Route::name('loai.')->middleware('isSingleDives')->group(function () {
    Route::get('/Loai-3d', [HeaderController::class, 'loai3d'])->name('3d');
    Route::get('/Loai-2d', [HeaderController::class, 'loai2d'])->name('2d');
    Route::get('/Loai-anime', [HeaderController::class, 'loaianime'])->name('anime');
    Route::get('/Loai-khac', [HeaderController::class, 'loaikhac'])->name('khac');
});

Route::get('/Xem-nhieu', [HeaderController::class, 'xemNhieu'])->middleware('isSingleDives')->name('xemNhieu');
Route::get('/Moi-cap-nhat', [HeaderController::class, 'moiCapNhat'])->middleware('isSingleDives')->name('moiCapNhat');
Route::get('/Yeu-thich', [HeaderController::class, 'yeuThich'])->middleware('isSingleDives')->middleware('isFavourite')->name('yeuThich');

//Login register forgot
Route::get('/Dang-nhap', [LoginRegisterController::class, 'login'])->middleware('isLogedIn')->name('login');
Route::post('/Dang-nhap', [LoginRegisterController::class, 'checkLogin'])->name('login.check');

Route::get('/Dang-ky', [LoginRegisterController::class, 'register'])->middleware('isLogedIn')->name('register');
Route::post('/Dang-ky', [LoginRegisterController::class, 'checkRegister'])->name('register.check');

Route::get('/Quen-mat-khau', [PHPMailerControler::class, 'forgot'])->middleware('isLogedIn')->name('forgot');
Route::post('/Quen-mat-khau', [PHPMailerControler::class, 'postForgetPassword'])->name('forgot.check');

Route::get('/Cap-nhat-mat-khau', [LoginRegisterController::class, 'updateAccount'])->middleware('isLogedIn')->name('updateAccount');
Route::post('/Cap-nhat-mat-khau', [LoginRegisterController::class, 'postupdateAccount'])->name('updateAccount.check');

Route::get('/Dang-xuat', [LoginRegisterController::class, 'logout'])->name('logout');


//Admin
Route::get('/Admin', [LoginAdminController::class, 'login'])->name('admin.login');
Route::post('/Admin', [LoginAdminController::class, 'checkLogin'])->name('admin.checkLogin');
Route::get('/Admin/Logout', [LoginAdminController::class, 'logout'])->name('admin.logout');
//admin home page
Route::prefix('/Admin')->middleware('isAdmin')->group(function () {
    Route::get('/Home', [HomeAdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('/Qltk')->name('qltk.')->group(function () {
        Route::get('/', [HomeAdminController::class, 'homeQltk'])->name('home');
        Route::get('/Add', [HomeAdminController::class, 'addAccount'])->name('add');
        Route::post('/Add', [HomeAdminController::class, 'postaddAccount'])->name('postAdd');
        Route::get('/Edit/{id}', [HomeAdminController::class, 'editQltk'])->name('edit');
        Route::post('/Edit', [HomeAdminController::class, 'postEditQltk'])->name('postEdit');
        Route::get('/Delete/{id}', [HomeAdminController::class, 'getDeleteQltk'])->name('getDelete');
    });

    Route::prefix('/Qlphim')->name('qlphim.')->group(function () {
        Route::get('/', [HomeAdminController::class, 'homeQlphim'])->name('home');
        Route::get('/Add', [HomeAdminController::class, 'addMovies'])->name('add');
        Route::post('/Add', [HomeAdminController::class, 'postaddMovies'])->name('postAdd');
        Route::get('/Edit/{id_phim}', [HomeAdminController::class, 'editQlphim'])->name('edit');
        Route::post('/Edit', [HomeAdminController::class, 'postEditQlphim'])->name('postEdit');
        Route::get('/Delete/{id_phim}', [HomeAdminController::class, 'getDeleteQlphim'])->name('getDelete');
    });

    Route::prefix('/Qlcoment')->name('qlcomment.')->group(function () {
        Route::get('/', [HomeAdminController::class, 'homeQlcomment'])->name('home');
        Route::get('/Add', [HomeAdminController::class, 'addComment'])->name('add');
        Route::post('/Add', [HomeAdminController::class, 'postaddComment'])->name('postAdd');
        Route::get('/Edit/{soluong}', [HomeAdminController::class, 'editQlcomment'])->name('edit');
        Route::post('/Edit', [HomeAdminController::class, 'postEditQlcomment'])->name('postEdit');
        Route::get('/Delete/{soluong}', [HomeAdminController::class, 'getDeleteQlcomment'])->name('getDelete');
    });
});
