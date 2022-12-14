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
            @error('name')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Địa chỉ</label>
            <input name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ mới" value="{{ $user->address }}">
            @error('address')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div id="edit" class="d-flex justify-content-center"><button type="submit" class="btn btn-primary confirm">Cập nhật</button></div>
    </form>
</div>
@endsection