@extends('layouts.layout')
@section('content')
<div class="shadow-lg p-5 m-5 bg-white rounded">
<h1>CHỈNH SỬA TÀI KHOẢN</h1>
<hr>
<form action="{{ route('tai-khoan.xu-li-cap-nhat',['id'=>$user->id]) }}" method="post">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Họ và Tên</label>
        <input name="name" type="text" class="form-control" placeholder="Nhập họ và tên" value="{{ $user->name }}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Số điện thoại</label>
        <input name="phone" type="text" class="form-control" placeholder="Nhập số điện thoại" value="{{ $user->phone }}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Địa chỉ</label>
        <input name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ mới" value="{{ $user->address }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mật khẩu cũ</label>
        <input name="password_old" type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu cũ">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mật khẩu mới</label>
        <input name="password_new1" type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu mới">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Xác nhận nật khẩu mới</label>
        <input name="password_new2" type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập lại mật khẩu mới">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection