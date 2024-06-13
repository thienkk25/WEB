@if (session()->has('msg'))
    <div style="color: red">{{session('msg')}}</div>    
@endif
<form action="{{route('qltk.postAdd')}}" method="post">
    @csrf
    <div>
        <label for="user">Tài khoản</label>
        <input type="text" name="user" id="user" value="{{old('user')}}">
        @error('user')
            <div style="color: red">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="password">Mật khẩu</label>
        <input type="text" name="password" id="password">
        @error('password')
            <div style="color: red">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="role">Quyền</label>
        <input type="text" name="role" id="role" value="{{old('role')}}">
        @error('role')
            <div style="color: red">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{old('email')}}">
        @error('email')
            <div style="color: red">{{$message}}</div>
        @enderror
    </div>
    <button type="submit">Thêm</button>
</form>
<a href="{{route('qltk.home')}}">Quay lại trang</a>