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
            @error('password_old')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu mới</label>
            <input name="password_new" type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu mới">
            @error('password_new')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Xác nhận nật khẩu mới</label>
            <input name="password_new_confirmation" type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập lại mật khẩu mới">
            @error('password_new')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary confirm" id="edit-pass">Cập nhật</button>
    </form>
</div>
@endsection