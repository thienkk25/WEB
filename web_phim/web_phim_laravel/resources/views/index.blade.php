@extends('clients.layouts.home')
@php
    $title = "Trang chu";
@endphp
@section('content')
<div class="mainhome">
    <div class="dexuat">
        <div class="sildershower">
            @foreach ($autosliders as $item)
            <div class="container">
                <img src="{{$item->link_anh}}" alt="{{$item->ten_anh}}" class="anhq ">
            </div>
            @endforeach
        </div>
        <div class="dieuhuong dh1" id="dh">
            <div id="dhnx" class="button-next" onclick="next_pre(1)">
                <i class="fa-solid fa-chevron-right"></i>
            </div>

        </div>
        <div class="dieuhuong" id="dh">
            <div id="dhpr" class="button-pre" onclick="next_pre(-1)">
                <i class="fa-solid fa-chevron-left"></i>
            </div>

        </div>
    </div>
    <div class="thanvideo">
        <div class="thanc">
            <h3 title="Đề xuất" style="text-align: start; margin:20px 0 20px 20px; color: yellow;">Đề xuất</h3>
            <div class="Chinh">
                @foreach ($listphim as $item)
                <div style="position: relative">
                    @if (session()->has('islogedin'))
                        <i tt="{{$item->id_phim}}" title="Yêu thích" id="favourite-phim" class="fa-regular fa-heart" style="color: red;position: absolute;top:5px;left:88%;font-size: 20px;z-index: 3;"></i>
                        <i tt="{{$item->id_phim}}" title="bỏ yêu thích" id="unfavourite-phim" class="fa-solid fa-heart" style="color: red;position: absolute;top:5px;left:88%;font-size: 20px;z-index: 3;display: none"></i>
                    @endif
                    <a href="{{ route('phim.ten_phim', ['ten_phim'=>$item->ten_phim]) }}">
                        <div class="slide_phim" style="height: 380px;background-color:#5C5470;border-radius:20px;">
                            <div>
                                <div class="slde">
                                    <img class="lkphim" src="{{$item->link_anh_phim}}" alt="{{$item->ten_phim}}">
                                </div>
                            </div>
                            <div style="width: 200px;color:#ffffff;margin:15px 0;">{{$item->ten_phim}}</div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <button id="Xemthem" style="padding: 10px;background-color: #7BD3EA;border-radius: 10px;margin: 20px 0;color:#451952;cursor: pointer;">Xem thêm</button>
        </div>
        <div class="thant">
            <h3 title="Xem nhiều" style="color: yellow;margin: 20px 0;">Xem nhiều</h3>
            <div class="Top">
               @foreach ($topview as $item)
                    <div class="tp">
                        <a href="/phim/{{$item->ten_phim}}"><p class="pxm">{{$item->ten_phim}}</p></a>
                    </div>
               @endforeach
            </div>
        </div>
    </div>
</div>
@endsection