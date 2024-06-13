@if (session()->has('msg'))
    <div style="color: red">{{session('msg')}}</div>    
@endif
<form action="{{route('qlphim.postEdit')}}" method="post">
    @csrf
    <div>
        <label for="ten_phim">Tên phim</label>
        <input type="text" name="ten_phim" id="ten_phim" value="{{old('ten_phim')?? $show->ten_phim}}">
        @error('ten_phim')
            <div style="color: red">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="link_anh_phim">Link ảnh phim</label>
        <input type="text" name="link_anh_phim" id="link_anh_phim" value="{{old('link_anh_phim') ?? $show->link_anh_phim}}">
        @error('link_anh_phim')
            <div style="color: red">{{$message}}</div>
        @enderror
    </div>
    <button type="submit">Sửa</button>
</form>
<a href="{{route('qlphim.home')}}">Quay lại trang</a>