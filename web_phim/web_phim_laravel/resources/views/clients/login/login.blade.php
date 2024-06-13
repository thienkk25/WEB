<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: #5C8374;
            height: 100vh;
            display: grid;
            place-items: center;

        }

        .main {
            height: 340px;
            width: 680px;
            background-color: #89CFF3;
            border-radius: 10px;
        }

        a {
            text-decoration: none;
            color: #fff;

        }

        .main1 {
            display: grid;
            place-items: center;
        }

        .main1 div {
            margin: 5px;
        }

        h2 {
            margin: 10px 30px 30px 30px;
            text-align: center;
            font-size: 30px;

        }

        button {
            outline: none;
            border: 1px solid #F875AA;
            border-radius: 10px;
            background-color: #FFB6D9;
            padding: 13px;
            color: #fff;
            cursor: pointer;
        }

        button:hover,
        .ck:hover {
            background-color: #3559E0;
        }

        .forget:hover {
            text-decoration-line: underline;
            color: #000;
        }

        .ck {
            padding: 10px;
            background-color: #FFB6D9;
            border-radius: 10px;
            border: 1px solid #F875AA;
        }
    </style>
</head>

<body>
    <div class="main">
        <form action="{{route('login')}}" method="POST">
            @csrf
            <h2>Đăng nhập</h2>
            @if(session('msg'))
                <div class="alert alert-danger" style="color: red;text-align: center">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="main1">
                <div>
                    <input style="width: 380px;padding: 10px;outline: none;border-radius: 10px;border: 1px solid #F875AA;" placeholder="Tài khoản" type="text" name="user" id="user" value="{{old('user') ?? session('againUser') }}">
                    @error('user')
                        <div style='color:red'>{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input style="width: 380px;padding: 10px;outline: none;border-radius: 10px;border: 1px solid #F875AA;" placeholder="Mật khẩu" type="password" name="password" id="pasword">
                    @error('password')
                        <div style='color:red'>{{ $message }}</div>
                    @enderror
                </div>
                <div><button type="submit">Đăng nhập</button></div>
                <div style="display: flex;justify-content: space-between;width: 380px;align-items: center;">
                    <a class="forget" href="{{route('forgot')}}">Quên mật khẩu</a>
                    <a class="ck" href="{{route('register')}}">Đăng ký</a>
                </div>
            </div>
        </form>
        <a style="margin-left: 10px;text-decoration-line: underline;color: #000;position: relative;top:27px" href="{{route('home')}}">Quay lại trang chủ</a>
    </div>
    <script>
        const user = document.querySelector('#user');
        const password = document.querySelector('#password');

        document.querySelector('button[type=submit]').addEventListener('click', () => {
            if (user.value.trim().length === 0 || password.value.trim().length === 0) {
                alert('Vui lòng không để trống email or mật khẩu');
            }
        })
        
    </script>
</body>

</html>
