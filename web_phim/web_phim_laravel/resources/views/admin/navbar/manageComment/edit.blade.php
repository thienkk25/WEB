@if (session()->has('msg'))
    <div style="color: red">{{session('msg')}}</div>    
@endif
<form action="{{route('qlcomment.postEdit')}}" method="post">
    @csrf
    <div>
        <label for="id_user">Id tài khoản</label>
        <input type="text" name="id_user" id="id_user" value="{{old('id_user')?? $show->id_user}}">
        @error('id_user')
            <div style="color: red">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="ten_user">Tài khoản</label>
        <input type="text" name="ten_user" id="ten_user" value="{{old('ten_user') ?? $show->ten_user}}">
        @error('ten_user')
            <div style="color: red">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="content">Bình luận</label>
        <input type="text" name="content" id="content" value="{{old('content')??$show->content}}">
        @error('content')
            <div style="color: red">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="date">date</label>
        <input type="text" name="date" id="date" value="{{old('date')??$show->date}}">
        @error('date')
            <div style="color: red">{{$message}}</div>
        @enderror
    </div>
    <button type="submit">Sửa</button>
</form>
<a href="{{route('qlcomment.home')}}">Quay lại trang</a>