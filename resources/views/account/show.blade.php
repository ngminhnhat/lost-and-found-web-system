@extends('layouts.layout')
@section('content')
<div class="shadow-lg p-5 m-5 bg-white rounded">
<h1>CHI TIẾT TÀI KHOẢN</h1>
<hr>
<h4>Họ và tên</h4>
<h3>{{ $user->name }}</h3>
<h4>Email</h4>
<h3>{{ $user->email }}</h3>
<h4>Số điện thoại</h4>
<h3>{{ $user->phone }}</h3>
<h4>Địa chỉ</h4>
<h3>{{ $user->address }}</h3>
</div>
@endsection