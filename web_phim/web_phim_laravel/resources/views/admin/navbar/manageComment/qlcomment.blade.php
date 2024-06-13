@extends('admin.dashboard')
@php
    $title="Quản lý bình luận";
@endphp
@section('contents')
<div class="content" style="overflow-y: scroll">
    <a href="{{route('qlcomment.add')}}" style="margin: 10px; padding: 10px;background-color: blue;display: block;color: #fff;text-decoration: none;width:100px;text-align: center">Thêm</a>
@if (session()->has('msg'))
    <div style="color: red">{{session('msg')}}</div>    
@endif
<table style="border: 1px solid #000">
    <thead>
        <tr>
            <th style="border: 1px solid #000">Số lượng</th>
            <th style="border: 1px solid #000">Id tài khoản</th>
            <th style="border: 1px solid #000">Tài khoản</th>
            <th style="border: 1px solid #000">Bình luận</th>
            <th style="border: 1px solid #000">Ngày bình luận</th>
            <th style="border: 1px solid #000">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listComments as $item)
        <tr>
            <td style="border: 1px solid #000">{{$item->soluong}}</td>
            <td style="border: 1px solid #000">{{$item->id_user}}</td>
            <td style="border: 1px solid #000">{{$item->ten_user}}</td>
            <td style="border: 1px solid #000;width:450px">{{$item->content}}</td>
            <td style="border: 1px solid #000">{{$item->date}}</td>
            <td style="border: 1px solid #000">
                <a href="{{route('qlcomment.edit', ['soluong' => $item->soluong])}}">Sửa</a>
                <a href="{{route('qlcomment.getDelete', ['soluong' => $item->soluong])}}">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection