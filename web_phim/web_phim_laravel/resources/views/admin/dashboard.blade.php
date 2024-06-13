<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        header{
            width: 100%;
            height: 100px;
            background-color: #000;
        }
        main {
            width: 100%;
            height: 500px;
            background-color: #efefef;
            display: flex;
            border: 1px solid #000000;
            align-items: stretch;
        }
        .left-bar{
            width: 300px;
            border-right: 1px solid #000; 
            background-color: #435585;
            color: #efefef;
        }
        .left-bar ul a{
            text-decoration: none;
            color: #efefef;
        }
        .left-bar ul a:hover{
            color: yellowgreen;
        }
        .left-bar ul a li{
            list-style-type: none;
            padding: 10px;
            border-bottom: 1px solid #efefef;
        }
    </style>
    <title>{{$title ?? 'Trang chủ Admin'}}</title>
</head>
<body>
    <header style="background-color: antiquewhite;display: grid;place-items: center">
        <a href="{{route('admin.dashboard')}}" style="color: #000;text-decoration: none;"><h1>Trang chủ admin</h1></a>
    </header>
    <main>
        <div class="left-bar">
            <ul> 
                <a href="{{route('admin.dashboard')}}"><h2 style="text-align: center">Dashboard</h2></a>
                <a href="{{route('qltk.home')}}"><li>Quản lý Tài khoản</li></a>
                <a href="{{route('qlphim.home')}}"><li>Quản lý Phim</li></a>
                <a href="{{route('qlcomment.home')}}"><li>Quản lý Bình luận</li></a>
                <a href="{{route('admin.logout')}}"><li>Đăng xuất</li></a>
            </ul>
        </div>
        @section('contents')
        <div class="content"> 
                <h1 style="width: 500px;text-align: end;padding: 20px">Admin</h1>
        </div>
        @show
    </main>
    <footer style="background-color: antiquewhite;">
        <p style="padding: 10px 0; text-align: center;">Được tạo bởi <strong>Thiện Nguyễn</strong></p>
        <p style="padding: 10px 0; text-align: center;">Email : <strong>thiennguyendz25@gmail.com</strong>. Xin cảm ơn</p>
    </footer>
</body>
</html>