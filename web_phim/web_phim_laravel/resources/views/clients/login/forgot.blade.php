<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quen mat khau</title>
    <style>
        body {
            height: 100vh;
            display: grid;
            place-items: center;
        }
        button{
            outline: none;
            border: 1px solid #F875AA;
            border-radius: 10px;
            background-color: #FFB6D9;
            padding: 13px;
            color: #fff;
            cursor: pointer;
            min-width: 70px;
        }
        button:hover{
            background-color: #4f79ff;
        }
    </style>
</head>
<body>
    <div style="border: 1px solid #89cff3;border-radius: 10px;width: 540px;height: 270px;background-color: #89cff3">
        <h1 style="text-align: center">Quên mật khẩu</h1>
        <div style="margin-left: 10px;">
            @if(session('msg'))
            <div class="alert alert-danger" style="color: red;margin-bottom: 5px">{{ session('msg') }}</div>
            @endif
            <form action="{{request()->path()}}" method="post">
                @csrf
                <label for="email">Nhập email của bạn:</label><br>
                <input type="email" name="email" id="email" style="border: none;outline: none; padding: 8px;border-radius: 5px;margin: 10px 0;min-width: 290px;"><br>
                <button type="submit">Gửi</button>
            </form>
        </div>
        <div style="margin: 30px 10px;display: flex;justify-content: space-between">
            <a style="text-decoration-line: underline;color: #000;" href="{{route('home')}}">Quay lại trang chủ</a>
            <a style="text-decoration-line: underline;color: #000;" href="{{route('login')}}">Quay lại đăng nhập</a>
        </div>
    </div>
</body>
</html>