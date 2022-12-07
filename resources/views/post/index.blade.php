@extends('layouts.layout')
@section('content')
<div class="shadow-lg p-5 m-5 bg-white rounded">
    <div class="form-group ">
        <input class="row form-control d-inline" type="text" name="title" placeholder="Nhập từ khoá tìm kiếm">
        <button class="row btn btn-primary d-inline"><i class="bi bi-search"></i>Tìm kiếm</button>
    </div>
    <div>
        @foreach($postList as $post)
        <a href="{{ route('bai-dang.chi-tiet',['id' => $post->id]) }}">
            <div class="row mb-4 border-bottom pb-2">
                <div class="col-3">
                    <img src="{{ url('/web-images/nhat-do.jpg') }}" class="img-fluid shadow-1-strong rounded" />
                </div>
                <div class="col-9">
                    <p class="mb-2"><strong>{{ $post->title }}</strong></p>
                    <p class="text-dark">{{ $post->content }}</p>
                    <button class="btn">Xem thêm <i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
        </a>

        @endforeach
    </div>
</div>
@endsection