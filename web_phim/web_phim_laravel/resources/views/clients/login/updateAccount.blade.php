<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cập nhật lại mật khẩu</title>
</head>
<body>
    <h1>Cập nhật lại mật khẩu</h1>
    @if(session('msg'))
        <div class="alert alert-danger" style="color: blue;margin: 10px">{{ session('msg') }}</div>
    @endif
    <form action="{{request()->path()}}" method="post">
        @csrf
        <div>
            <label for="email">Nhập tài khoản email của bạn</label>
            <input autocomplete="off" type="email" name="email" id="email"  value="{{old('email') ?? session('againUser') ?? request()->email}}">
            @error('email')
                <div style='color:red'>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="code">Nhập mã gửi từ email của bạn</label>
            <input type="text" name="code" id="code"  value="{{old('code') ?? request()->tokenForgot}}">
            @error('code')
                <div style='color:red'>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">Nhập mật khẩu mới của bạn</label>
            <input type="password" name="password" id="password" >
            @error('password')
                <div style='color:red'>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">Nhập lại mật khẩu mới của bạn</label>
            <input type="password" name="passwordAgain" id="passwordAgain" >
            @error('passwordAgain')
                <div style='color:red'>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Cập nhật</button>
    </form>
    
    <a style="margin-left: 10px;text-decoration-line: underline;color: #000;position: relative;top:27px" href="{{route('login')}}">Quay lại đăng nhập</a>
</body>
</html>