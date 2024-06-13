@extends('admin.dashboard')
@php
    $title="Quản lý tài khoản";
@endphp
@section('contents')
<div class="content" style="overflow-y: scroll">
    <a href="{{route('qltk.add')}}" style="margin: 10px; padding: 10px;background-color: blue;display: block;color: #fff;text-decoration: none;width:100px;text-align: center">Thêm</a>
@if (session()->has('msg'))
    <div style="color: red">{{session('msg')}}</div>    
@endif
<table style="border: 1px solid #000;ma">
    <thead>
        <tr>
            <th style="border: 1px solid #000">Id</th>
            <th style="border: 1px solid #000">Tài khoản</th>
            <th style="border: 1px solid #000">Mật khẩu</th>
            <th style="border: 1px solid #000">Quyền</th>
            <th style="border: 1px solid #000">Email</th>
            <th style="border: 1px solid #000">remember_token</th>
            <th style="border: 1px solid #000">created_at</th>
            <th style="border: 1px solid #000">updated_at</th>
            <th style="border: 1px solid #000">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listAccount as $user)
        <tr>
            <td style="border: 1px solid #000">{{$user->id}}</td>
            <td style="border: 1px solid #000">{{$user->user}}</td>
            <td style="border: 1px solid #000">{{$user->password}}</td>
            <td style="border: 1px solid #000">{{$user->role}}</td>
            <td style="border: 1px solid #000">{{$user->email}}</td>
            <td style="border: 1px solid #000">{{$user->remember_token}}</td>
            <td style="border: 1px solid #000">{{$user->created_at}}</td>
            <td style="border: 1px solid #000">{{$user->updated_at}}</td>
            <td style="border: 1px solid #000">
                <a href="{{route('qltk.edit', ['id' => $user->id])}}">Sửa</a>
                <a href="{{route('qltk.getDelete', ['id' => $user->id])}}">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection