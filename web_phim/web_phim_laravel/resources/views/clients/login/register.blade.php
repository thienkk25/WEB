<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        body{
            background-color: #5C8374;
            height: 100vh;
            display: grid;
            place-items: center;
            
        }
        .main{
            height: 465px;
            width: 680px;
            background-color: #89CFF3;
            border-radius: 10px;
        }
        a{
            text-decoration: none;
            color: #fff;
            
        }
        .main1{
            display: grid;
            place-items: center;
        }
        .main1 div{
            margin: 5px;
        }
        h2{
            margin: 10px 30px 30px 30px;
            text-align: center;
            font-size: 30px;
            
        }
        button{
            outline: none;
            border: 1px solid #F875AA;
            border-radius: 10px;
            background-color: #FFB6D9;
            padding: 13px;
            color: #fff;
        }
        button:hover ,.ck:hover{
            background-color: #3559E0;
        }
        .forget:hover{
            text-decoration-line: underline;
            color: #000;
        }
        .ck{
            padding: 10px;background-color: #FFB6D9;
            border-radius: 10px;
            border: 1px solid #F875AA;
        }
    </style>
</head>
<body>
    <div class="main">
        <form action="{{route('register')}}" method="POST">
            @csrf
            <h2>Đăng ký</h2>
            @if(session('msg'))
                <div class="alert alert-danger" style="color: red;text-align: center">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="main1">
                <div>
                    <input style="width: 380px;padding: 10px;outline: none;border-radius: 10px;border: 1px solid #F875AA;" placeholder="Tài khoản" type="text" name="user" id="user" value="{{old('user') ?? session('againUser')}}">
                    @error('user')
                        <div style='color:red'>{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input style="width: 380px;padding: 10px;outline: none;border-radius: 10px;border: 1px solid #F875AA;" placeholder="Email" type="email" name="email" id="email" value="{{old('email')}}">
                    @error('email')
                        <div style='color:red'>{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input style="width: 380px;padding: 10px;outline: none;border-radius: 10px;border: 1px solid #F875AA;" placeholder="Mật khẩu" type="password" name="password" id="pasword">
                    @error('password')
                        <div style='color:red'>{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input style="width: 380px;padding: 10px;outline: none;border-radius: 10px;border: 1px solid #F875AA;" placeholder="Nhập lại mật khẩu" type="password" name="passwordAgain" id="passwordAgain">
                    @error('passwordAgain')
                        <div style='color:red'>{{ $message }}</div>
                    @enderror
                </div>
                <div style="display: flex;justify-content: space-between;width: 400px;align-items: center;margin: 20px 0;">
                    <button type="submit">Đăng ký</button>
                    <a class="ck" href="{{route('login')}}">Đăng nhập</a>
                </div>
            </div>
            <a style="margin-left: 10px;text-decoration-line: underline;color: #000;" href="{{ route('home') }}">Quay lại trang chủ</a>
        </form>
    </div>
</body>
</html>