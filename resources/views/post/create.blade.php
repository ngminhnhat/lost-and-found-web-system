@extends('layouts.layout')
@section('content')
<div class="shadow-lg p-5 m-5 bg-white rounded">
    <h1>ĐĂNG BÀI</h1>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Tiêu đề</label>
            <input type="text" class="form-control" name="title" placeholder="Mời bạn nhập tiêu đề...">
            <small id="emailHelp" class="form-text text-muted">Một tiêu đề rõ ràng giúp mọi người dễ tìm thấy hơn đó!</small>
        </div>
        <label for="exampleInputEmail1">Loại bài viết:</label>
        <select class="btn btn-primary dropdown-toggle dropdown-toggle-split mx-5" name="post_type_id">
            @foreach($postTypeList as $postType)
            <option value="{{ $postType->id }}">{{ $postType->name }}</option>
            @endforeach
        </select>
        <label for="exampleInputEmail1">Loại đồ vật:</label>
        <select class="btn btn-primary dropdown-toggle dropdown-toggle-split mx-5" name="item_type_id">
            @foreach($itemTypeList as $itemType)
            <option value="{{ $itemType->id }}">{{ $itemType->name }}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label for="exampleInputEmail1">Vị trí tìm thấy</label>
            <input type="text" class="form-control" name="found_address" placeholder="Bạn nhặt/mất ở chỗ nào nhỉ? ">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nội dung</label>
            <input type="text" class="form-control" name="content" placeholder="Mời bạn nhập nội dung...">
        </div>
        <br>
        <div class="form-group">
            <label for="exampleInputEmail1">Hình ảnh:</label>
            <input type="file" class="form-control" name="image_1">
            <input type="file" class="form-control" name="image_2">
            <input type="file" class="form-control" name="image_3">
            <input type="file" class="form-control" name="image_4">
            <input type="file" class="form-control" name="image_5">
        </div>

        <button type="submit" class="btn btn-primary">Đăng Bài</button>
    </form>
</div>
@endsection