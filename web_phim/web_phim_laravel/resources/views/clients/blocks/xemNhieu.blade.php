@extends('clients.layouts.home')
@php
    $title = "Xem nhieu";
@endphp
@section('content')
<div class="mainhome">
    <div class="thanvideo">
        <div class="thanc">
            <h3 style="text-align: start; margin:20px 0 20px 20px; color: yellow;">Xem nhiều</h3>
            <div class="Chinh">
                @foreach ($topviews as $item)
                <a href="{{route('home')}}/phim/{{$item->ten_phim}}" >
                        <div class="slide_phim" style="height: 380px;background-color:#5C5470;border-radius:20px;">
                            <div>
                                <div class="slde">
                                    <img class="lkphim" src="{{$item->link_anh_phim}}" alt="{{$item->ten_phim}}">
                                </div>
                            </div>
                            <div style="width: 200px;color:#ffffff;margin:15px 0;">{{$item->ten_phim}}</div>
                        </div>
                    </a>
                @endforeach
            </div>
            <button id="Xemthem" style="padding: 10px;background-color: #7BD3EA;border-radius: 10px;margin: 20px 0;color:#451952;cursor: pointer;">Xem thêm</button>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('js/childmain.js')}}"></script>
@endsection