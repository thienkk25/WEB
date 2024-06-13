@extends('clients.layouts.home')
@php
    $title = "Yeu thich";
@endphp
@section('content')
<div class="mainhome">
    <div class="thanvideo">
        <div class="thanc">
            <h3 style="text-align: start; margin:20px 0 20px 20px; color: yellow;">Yêu thích</h3>
            <div class="Chinh">
                @foreach ($yeuThich as $item)
                <div style="position: relative">
                        <i tt="{{$item->id_phim}}" title="Yêu thích" id="favourite-phim" class="fa-regular fa-heart" style="color: red;position: absolute;top:5px;left:88%;font-size: 20px;z-index: 3;display: none"></i>
                        <i tt="{{$item->id_phim}}" title="Bỏ yêu thích" id="unfavourite-phim" class="fa-solid fa-heart" style="color: red;position: absolute;top:5px;left:88%;font-size: 20px;z-index: 3;"></i>
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
                </div>
                @endforeach
            </div>
            <button id="Xemthem" style="padding: 10px;background-color: #7BD3EA;border-radius: 10px;margin: 20px 0;color:#451952;cursor: pointer;">Xem thêm</button>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('js/childmain.js')}}"></script>
    <script>
        var _0x2d76=["\x23\x75\x6E\x66\x61\x76\x6F\x75\x72\x69\x74\x65\x2D\x70\x68\x69\x6D","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72\x41\x6C\x6C","\x23\x66\x61\x76\x6F\x75\x72\x69\x74\x65\x2D\x70\x68\x69\x6D","\x63\x6F\x6E\x74\x65\x6E\x74","\x6D\x65\x74\x61\x5B\x6E\x61\x6D\x65\x3D\x22\x63\x73\x72\x66\x2D\x74\x6F\x6B\x65\x6E\x22\x5D","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x68\x65\x61\x64","\x63\x6C\x69\x63\x6B","\x2F\x75\x6E\x66\x61\x76\x6F\x75\x72\x69\x74\x65","\x74\x74","\x67\x65\x74\x41\x74\x74\x72\x69\x62\x75\x74\x65","\x70\x6F\x73\x74","\x64\x69\x73\x70\x6C\x61\x79","\x73\x74\x79\x6C\x65","\x6E\x6F\x6E\x65","\x61\x64\x64\x45\x76\x65\x6E\x74\x4C\x69\x73\x74\x65\x6E\x65\x72","\x66\x6F\x72\x45\x61\x63\x68"];const unfavourites=document[_0x2d76[1]](_0x2d76[0]);const favourites=document[_0x2d76[1]](_0x2d76[2]);const csrfToken=document[_0x2d76[6]][_0x2d76[5]](_0x2d76[4])[_0x2d76[3]];unfavourites[_0x2d76[16]]((_0xf47dx4,_0xf47dx5)=>{_0xf47dx4[_0x2d76[15]](_0x2d76[7],()=>{axios[_0x2d76[11]](_0x2d76[8],{id_phim:_0xf47dx4[_0x2d76[10]](_0x2d76[9]),_token:csrfToken});favourites[_0xf47dx5][_0x2d76[13]][_0x2d76[12]]= _0x2d76[14];_0xf47dx4[_0x2d76[13]][_0x2d76[12]]= _0x2d76[14]})})
    </script>
@endsection