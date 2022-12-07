@extends('layouts.layout')
@section('content')
<div class="shadow-lg p-5 m-5 bg-white rounded">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h4>{{ $postType->name }}</h4>
            <h1 class="mb-0 text-uppercase">{{ $post->title }}</h1>
            <h5 class="mb-0">{{ $post->found_address }}</h5>
            <p>{{ $itemType->name }}</p>
        </div>
        <div class="mr-5">
            <h3>{{ $user->name }}</h3>
            <p>Ngày đăng: {{ $post->created_at }}</p>
        </div>
    </div>
    <hr>
    <div class="d-sm-flex align-items-start justify-content-between mb-4">
        <p class="text-dark">{{ $post->content }}</p>
        <div>
            <div class="col-10" style="min-height: 300px; min-width: 300px;">
                <div class="position-relative h-100">
                    <img class="h-100 w-100" src="{{ url('/web-images/nhat-do.jpg') }}" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection