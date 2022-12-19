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
        <label for="exampleInputEmail1">Chức vụ</label>
        <select class="btn btn-primary dropdown-toggle dropdown-toggle-split mx-5" name="isadmin">
            
            <option value="0" {{ ( $user->isAdmin == 0) ? 'selected' : '' }} >Thành viên</option>
            <option value="1" {{ ( $user->isAdmin == 1) ? 'selected' : '' }} >Quản trị</option>
            
        </select>
    </div>
    
    <button type="submit" id="edit" class="btn btn-primary confirm">Cập nhật</button>
</form>
</div>
@endsection