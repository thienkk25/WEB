@if (session()->has('msg'))
    <div style="color: red">{{session('msg')}}</div>    
@endif
<form action="{{route('qlcomment.postAdd')}}" method="post">
    @csrf
    <div>
        <label for="id_user">Id tài khoản</label>
        <input type="text" name="id_user" id="id_user" value="{{old('id_user')}}">
        @error('id_user')
            <div style="color: red">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="ten_user">Tên tài khoản</label>
        <input type="text" name="ten_user" id="ten_user">
        @error('ten_user')
            <div style="color: red">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="content">Bình luận</label>
        <input type="text" name="content" id="content" value="{{old('content')}}">
        @error('content')
            <div style="color: red">{{$message}}</div>
        @enderror
    </div>
    <button type="submit">Thêm</button>
</form>
<a href="{{route('qlcomment.home')}}">Quay lại trang</a>