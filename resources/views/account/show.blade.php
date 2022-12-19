@extends('layouts.layout')
@section('content')
<div class="shadow-lg p-5 m-5 bg-white rounded">
    <h1>CHI TIẾT TÀI KHOẢN</h1>
    <hr>
    <div class="row">
        <div class="col">
            <p class="h4">Họ và tên</p>
            <h3 class="display-4">{{ $user->name }}</h3>
            <h4>Email</h4>
            <h3 class="lead">{{ $user->email }}</h3>
            <h4>Số điện thoại</h4>
            <h3 class="lead">{{ $user->phone }}</h3>
            <h4>Địa chỉ</h4>
            <h3 class="lead">{{ $user->address }}</h3>
        </div>
        <div class="col" >
            <img src="{{ url('/UserAvatar/'.$user->avatar) }}" alt="" class="rounded-circle shadow-4 float-right" style="width:300px; height: 300px; object-fit: cover;">
        </div>
    </div>
    @if(Auth::hasUser())
    @if(Auth::user()->isAdmin == 1)
    <div class="d-flex justify-content-center">
        <a href="{{ route('admin.tai-khoan.cap-nhat',['id'=>$user->id]) }}" class="btn btn-primary m-1">Thay đổi thông tin</a>
    </div>
    @else
    @if(Auth::id() == $user->id)
    <div class="d-flex justify-content-center">
        <a href="{{ route('tai-khoan.cap-nhat',['id'=>$user->id]) }}" class="btn btn-primary m-1">Thay đổi thông tin</a>
        <a href="{{ route('tai-khoan.doi-mat-khau',['id'=>$user->id]) }}" class="btn btn-primary m-1">Thay đổi mật khẩu</a>
    </div>
    @endif
    @endif
    @endif
</div>
@endsection