@extends('layouts.layout')
@section('content')


<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ url('/web-images/roi-vi-o-nhat.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" >
                    <div class="p-3" style="max-width: 900px;">
                        <i class="fa fa-home fa-4x text-primary mb-4 d-none d-sm-block"></i>
                        <h1 class="display-3 text-uppercase text-white mb-md-4">Tìm đồ thất lạc của bạn ở bất kỳ nơi đâu</h1>
                        <div class="w-100">
                            <div class="btn-group" style="margin-right: 50px;">
                                <a class="btn btn-primary px-4" style="padding: 20px 30px; border-radius: 20px; width:200px;" href="{{ route('bai-dang.index') }} ">Tìm Kiếm Ngay</a>
                            </div>
                            <div class="btn-group">
                                <a class="btn btn-primary px-4" style="padding: 20px 30px; border-radius: 20px; width:200px;" href="{{ route('bai-dang.dang-bai') }}">Đăng Bài</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->



<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
@endsection