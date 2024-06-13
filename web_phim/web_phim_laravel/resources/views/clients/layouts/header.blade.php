<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>
</head>

<body>
    <header>
        <div class="bar-header">
            <div class="logo"><img src="{{ asset('img/logo.jpg') }}" style="width: 90px; height: 95px;"></div>
            <div class="bar-ul">
                <ul class="list-header">
                    <li><a class="li-a" href="{{route('home')}}">Trang chủ</a></li>
                    <li>
                        <a class="li-a">Loại</a>
                        <ul class="menu">
                            <a href="{{route('loai.3d')}}"><li>3D</li></a>
                            <a href="{{route('loai.2d')}}"><li>2D</li></a>
                            <a href="{{route('loai.anime')}}"><li>Anime</li></a>
                            <a href="{{route('loai.khac')}}"><li>Khác</li></a>
                            <div class="orgin">By Thiện Nguyễn</div>
                        </ul>
                    </li>
                    <li><a class="li-a" href="{{route('xemNhieu')}}">Xem nhiều</a></li>
                    <li><a class="li-a" href="{{route('moiCapNhat')}}">Mới cập nhật</a></li>
                    <li><a class="li-a" href="{{route('yeuThich')}}">Yêu thích</a></li>
                </ul>
                <div class="search">
                    <div style="position: relative;">
                        <input style="padding:10px 32px 10px 10px;outline: none;border-radius: 10px;border: 1px solid #000;" class="timkiemi" type="text" placeholder="Tìm kiếm">
                        <div id="danhsach" style="position: absolute;background-color: #fff;display: none;overflow-y: auto;max-height: 300px;">
                            <ul class="listds">
                            </ul>
                        </div>
                        <i style="align-self: center;font-size: 20px;position: absolute;left:85%;top:50%;cursor: pointer;transform: translateY(-50%);" class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    @if (session()->has('islogedin'))
                            <div style="padding-left: 5px;align-self: center;">Hi, {{session('islogedin')}}</div>
                            <a style="padding-left: 5px;align-self: center;" class="timkiema" type="button" href="{{route('logout')}}">Đăng xuất</a>
                    @else
                            <a style="padding-left: 5px;align-self: center;" class="timkiema" type="button" href="{{route('login')}}">Đăng nhập </a>
                    @endif               
                </div>
            </div>
        </div>
    </header>