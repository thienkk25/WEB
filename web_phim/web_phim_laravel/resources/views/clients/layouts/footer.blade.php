<div id="kbinhluan" style="background-color: gray;height: 480px;display: block;">
    <h2 style="padding: 20px;color: yellow;">Bình luận</h2>
    <ul class="listbinhluan" style="max-height: 345px;overflow-y: auto;">
        @foreach ($comments as $item)
            <li style="background-color: #efefef; padding: 10px;margin: 10px;list-style-type: none;text-align: left;border-radius:10px;">
                <div>{{$item->ten_user}} - {{$item->date}}</div>
                <div>{{$item->content}}</div>
            </li>
        @endforeach
    </ul>
    <div>
        @if(session()->has('islogedin'))
            <form style="position: relative;text-align: start !important;margin-top:3px;" id="form-comment">
                @csrf
                <textarea style="margin-left: 10px;padding: 5px;border-radius:10px;resize:none;" name="binhluan" class="binhluan" id="autoResizeTextarea" cols="100" rows="3"></textarea>
                <button style="position: absolute;top: 50%;transform: translateY(-50%);padding:10px;border-radius:10px;cursor: pointer;background-color:#efefef;margin-left:5px;" type="submit">Bình luận</button>
            </form>
            <script src="{{ asset('build\assets\app-BdIO4WeM.js') }}"></script>
        @else
            <div style="text-align:center;display:flex;justify-content: center;align-items: center;"><a style="background-color:#efefef;max-width:200px;border-radius:10px;padding:15px;margin-top:10px;" href="{{route('login')}}">Đăng nhập để bình luận</a></div>
        @endif
    </div>
</div>
<footer style="background-color: antiquewhite;">
    <p style="padding: 10px 0; text-align: center;">Được tạo bởi <strong>Thiện Nguyễn</strong></p>
    <p style="padding: 10px 0; text-align: center;">Email : <strong>thiennguyendz25@gmail.com</strong>. Xin cảm ơn</p>
</footer>
@section('scripts')
    <script src="{{asset('js/main.js')}}"></script>
@show
</body>

</html>