@extends('admin.dashboard')
@php
    $title="Quản lý phim";
@endphp
@section('contents')
<div class="content" style="overflow-y: scroll">
    <a href="{{route('qlphim.add')}}" style="margin: 10px; padding: 10px;background-color: blue;display: block;color: #fff;text-decoration: none;width:100px;text-align: center">Thêm</a>
@if (session()->has('msg'))
    <div style="color: red">{{session('msg')}}</div>    
@endif
<table style="border: 1px solid #000">
    <thead>
        <tr>
            <th style="border: 1px solid #000;width:40px;">Id</th>
            <th style="border: 1px solid #000;">Tên phim</th>
            <th style="border: 1px solid #000">Ảnh liên kết</th>
            <th style="border: 1px solid #000">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listMovies as $item)
        <tr>
            <td style="border: 1px solid #000">{{$item->id_phim}}</td>
            <td style="border: 1px solid #000;padding: 5px;">{{$item->ten_phim}}</td>
            <td style="border: 1px solid #000;width:640px">{{$item->link_anh_phim}}</td>
            <td style="border: 1px solid #000">
                <a href="{{route('qlphim.edit', ['id_phim' => $item->id_phim])}}">Sửa</a>
                <a href="{{route('qlphim.getDelete', ['id_phim' => $item->id_phim])}}">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection