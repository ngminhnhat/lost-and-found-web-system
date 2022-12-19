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
            @error('title')
            <p style="color: red;">{{ $message }}</p>
            @enderror
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
            @error('found_address')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nội dung</label>
            <textarea class="form-control" name="content" id="editor" rows="5"></textarea>
            @error('content')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <br>
        <hr>
        <div class="form-group row justify-content-center">
            <label for="exampleInputEmail1">Hình ảnh:</label>
            <div class="col-ting m-1">
                <div class="control-group file-upload" id="file-upload1">
                    <div class="image-box text-center">
                        <p>Upload Image</p>
                        <img src="" alt="">
                    </div>
                    <div class="controls" style="display: none;">
                        <input type="file" name="image_1" />
                    </div>
                </div>
            </div>
            <div class="col-ting m-1">
                <div class="control-group file-upload" id="file-upload1">
                    <div class="image-box text-center">
                        <p>Upload Image</p>
                        <img src="" alt="">
                    </div>
                    <div class="controls" style="display: none;">
                        <input type="file" name="image_2" />
                    </div>
                </div>
            </div>
            <div class="col-ting m-1">
                <div class="control-group file-upload" id="file-upload1">
                    <div class="image-box text-center">
                        <p>Upload Image</p>
                        <img src="" alt="">
                    </div>
                    <div class="controls" style="display: none;">
                        <input type="file" name="image_3" />
                    </div>
                </div>
            </div>
            <div class="col-ting m-1">
                <div class="control-group file-upload" id="file-upload1">
                    <div class="image-box text-center">
                        <p>Upload Image</p>
                        <img src="" alt="">
                    </div>
                    <div class="controls" style="display: none;">
                        <input type="file" name="image_4" />
                    </div>
                </div>
            </div>
            <div class="col-ting m-1">
                <div class="control-group file-upload" id="file-upload1">
                    <div class="image-box text-center">
                        <p>Upload Image</p>
                        <img src="" alt="">
                    </div>
                    <div class="controls" style="display: none;">
                        <input type="file" name="image_5" />
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Đăng Bài</button>
    </form>
</div>
@endsection