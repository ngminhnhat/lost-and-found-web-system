@extends('layouts.layout')
@section('content')
<div class="shadow-lg p-5 m-5 bg-white rounded">
    <h1>Danh sách bài viết</h1>
    <hr>
    <div class="form-group row  shadow-sm p-3 ">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100" method="GET" action="{{ route('bai-dang.tim-kiem') }}">
            <div class="input-group">
                <label for="">Tiêu đề: </label>
                <input name="title" type="text" class="form-control bg-light border-0 small" placeholder="Tiêu đề" aria-label="Search" aria-describedby="basic-addon2">
                <label for="">Loại bài viết: </label>
                <select name="post_type_id" id="" class="form-select">
                    <option value="">Tất cả</option>
                    @foreach($postTypeList as $postType)
                    <option value="{{ $postType->id }}">{{ $postType->name }}</option>
                    @endforeach
                </select>
                <label for="">Loại đồ vật: </label>
                <select name="item_type_id" id="" class="form-select">
                    <option value="">Tất cả</option>
                    @foreach($itemTypeList as $itemType)
                    <option value="{{ $itemType->id }}">{{ $itemType->name }}</option>
                    @endforeach
                </select>
                <label for="">Sắp xếp: </label>
                <select name="order" id="" class="form-select">
                    <option value="0">Bài mới -> cũ</option>
                    <option value="1">Bài cũ -> mới</option>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div>
        @foreach($postList as $post)
        <a href="{{ route('bai-dang.chi-tiet',['id' => $post->id]) }}">
            <div class="row mb-4 border-bottom pb-2">
                <div class="col-3">
                    @if($post->image_1 != null)
                    <img class="img-fluid shadow-1-strong rounded" src="{{ url('/PostImage/'.$post->image_1) }}" >
                    @elseif($post->image_2 != null)
                    <img class="img-fluid shadow-1-strong rounded" src="{{ url('/PostImage/'.$post->image_2) }}" >
                    @elseif($post->image_3 != null)
                    <img class="img-fluid shadow-1-strong rounded" src="{{ url('/PostImage/'.$post->image_3) }}" >
                    @elseif($post->image_4 != null)
                    <img class="img-fluid shadow-1-strong rounded" src="{{ url('/PostImage/'.$post->image_4) }}" >
                    @elseif($post->image_5 != null)
                    <img class="img-fluid shadow-1-strong rounded" src="{{ url('/PostImage/'.$post->image_5) }}" >
                    @else
                    <img class="img-fluid shadow-1-strong rounded" src="{{ url('/web-images/nhat-do.jpg') }}">
                    @endif
                </div>
                <div class="col-9">
                    <p class="mb-2"><strong>{{ $post->title }}</strong></p>
                    <p class="text-dark">{!! $post->content !!}</p>
                    <button class="btn">Xem thêm <i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
        </a>

        @endforeach
    </div>
</div>
@endsection