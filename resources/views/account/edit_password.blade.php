@extends('layouts.layout')
@section('content')
<div class="shadow-lg p-5 m-5 bg-white rounded">
    <h1>THAY ĐỔI MẬT KHẨU</h1>
    <hr>
    <form action="{{ route('tai-khoan.xu-li-doi-mat-khau',['id'=>$user->id]) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu cũ</label>
            <input name="password_old" type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu cũ">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu mới</label>
            <input name="password_new" type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu mới">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Xác nhận nật khẩu mới</label>
            <input name="password_new_confirm" type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập lại mật khẩu mới">
        </div>
        <button type="submit" class="btn btn-primary confirm">Cập nhật</button>
    </form>
</div>
@endsection