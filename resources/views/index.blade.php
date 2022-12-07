@extends('layouts.layout')
@section('content')


<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ url('/web-images/roi-vi-o-nhat.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <i class="fa fa-home fa-4x text-primary mb-4 d-none d-sm-block"></i>
                        <h1 class="display-3 text-uppercase text-white mb-md-4">Tìm đồ thất lạc của bạn ở bất kỳ nơi đâu</h1>
                        <div class="w-100">
                            <div class="btn-group" style="margin-right: 50px;">
                                <a class="btn btn-primary px-4" style="padding: 20px 30px; border-radius: 20px; width:200px;" href="{{ route('bai-dang.index') }} ">Tìm Kiếm Đồ</a>
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

<!-- About Start -->
<div class="container-fluid py-6 px-5">
    <div class="row g-5">
        <div class="col-lg-7">
            <h1 class="display-5 text-uppercase mb-4">We are <span class="text-primary">the Leader</span> in Construction Industry</h1>
            <h4 class="text-uppercase mb-3 text-body">Tempor erat elitr at rebum at at clita. Diam dolor diam ipsum tempor sit diam amet diam et eos labore</h4>
            <p>Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam dolor diam ipsum et, tempor voluptua sit consetetur sit. Aliquyam diam amet diam et eos sadipscing labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor</p>
            <div class="row gx-5 py-2">
                <div class="col-sm-6 mb-2">
                    <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Perfect Planning</p>
                    <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Professional Workers</p>
                    <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>First Working Process</p>
                </div>
                <div class="col-sm-6 mb-2">
                    <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Perfect Planning</p>
                    <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Professional Workers</p>
                    <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>First Working Process</p>
                </div>
            </div>
            <p class="mb-4">Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam dolor diam ipsum et, tempor voluptua sit consetetur sit. Aliquyam diam amet diam et eos labore</p>
            <img src="img/signature.jpg" alt="">
        </div>
        <div class="col-lg-5 pb-5" style="min-height: 400px;">
            <div class="position-relative bg-dark-radial h-100 ms-5">
                <img class="position-absolute w-100 h-100 mt-5 ms-n5" src="{{ url('/web-images/nhat-do.jpg') }}" style="object-fit: cover;">
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Blog Start -->
<div class="container-fluid py-6 px-5">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h1 class="display-5 text-uppercase mb-4">Các Bài Đăng <span class="text-primary">Mới Nhất</span> Trên Trang Web</h1>
    </div>
    <div class="row g-5">
        <div class="col-lg-4 col-md-6">
            <div class="bg-light">
                <img class="img-fluid" src="img/blog-1.jpg" alt="">
                <div class="p-4">
                    <div class="d-flex justify-content-between mb-4">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-2" src="img/user.jpg" width="35" height="35" alt="">
                            <span>John Doe</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="ms-3"><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</span>
                        </div>
                    </div>
                    <h4 class="text-uppercase mb-3">Rebum diam clita lorem erat magna est erat</h4>
                    <a class="text-uppercase fw-bold" href="">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="bg-light">
                <img class="img-fluid" src="img/blog-2.jpg" alt="">
                <div class="p-4">
                    <div class="d-flex justify-content-between mb-4">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-2" src="img/user.jpg" width="35" height="35" alt="">
                            <span>John Doe</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="ms-3"><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</span>
                        </div>
                    </div>
                    <h4 class="text-uppercase mb-3">Rebum diam clita lorem erat magna est erat</h4>
                    <a class="text-uppercase fw-bold" href="">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="bg-light">
                <img class="img-fluid" src="img/blog-3.jpg" alt="">
                <div class="p-4">
                    <div class="d-flex justify-content-between mb-4">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-2" src="img/user.jpg" width="35" height="35" alt="">
                            <span>John Doe</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="ms-3"><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</span>
                        </div>
                    </div>
                    <h4 class="text-uppercase mb-3">Rebum diam clita lorem erat magna est erat</h4>
                    <a class="text-uppercase fw-bold" href="">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->


<!-- Services Start -->
<div class="container-fluid bg-light py-6 px-5">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h1 class="display-5 text-uppercase mb-4">We Provide <span class="text-primary">The Best</span> Construction Services</h1>
    </div>
    <div class="row g-5">
        <div class="col-lg-4 col-md-6">
            <div class="service-item bg-white d-flex flex-column align-items-center text-center">
                <img class="img-fluid" src="img/service-1.jpg" alt="">
                <div class="service-icon bg-white">
                    <i class="fa fa-3x fa-building text-primary"></i>
                </div>
                <div class="px-4 pb-4">
                    <h4 class="text-uppercase mb-3">Building Construction</h4>
                    <p>Duo dolore et diam sed ipsum stet amet duo diam. Rebum amet ut amet sed erat sed sed amet magna elitr amet kasd diam duo</p>
                    <a class="btn text-primary" href="">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                <img class="img-fluid" src="img/service-2.jpg" alt="">
                <div class="service-icon bg-white">
                    <i class="fa fa-3x fa-home text-primary"></i>
                </div>
                <div class="px-4 pb-4">
                    <h4 class="text-uppercase mb-3">House Renovation</h4>
                    <p>Duo dolore et diam sed ipsum stet amet duo diam. Rebum amet ut amet sed erat sed sed amet magna elitr amet kasd diam duo</p>
                    <a class="btn text-primary" href="">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                <img class="img-fluid" src="img/service-3.jpg" alt="">
                <div class="service-icon bg-white">
                    <i class="fa fa-3x fa-drafting-compass text-primary"></i>
                </div>
                <div class="px-4 pb-4">
                    <h4 class="text-uppercase mb-3">Architecture Design</h4>
                    <p>Duo dolore et diam sed ipsum stet amet duo diam. Rebum amet ut amet sed erat sed sed amet magna elitr amet kasd diam duo</p>
                    <a class="btn text-primary" href="">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                <img class="img-fluid" src="img/service-4.jpg" alt="">
                <div class="service-icon bg-white">
                    <i class="fa fa-3x fa-palette text-primary"></i>
                </div>
                <div class="px-4 pb-4">
                    <h4 class="text-uppercase mb-3">Interior Design</h4>
                    <p>Duo dolore et diam sed ipsum stet amet duo diam. Rebum amet ut amet sed erat sed sed amet magna elitr amet kasd diam duo</p>
                    <a class="btn text-primary" href="">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                <img class="img-fluid" src="img/service-5.jpg" alt="">
                <div class="service-icon bg-white">
                    <i class="fa fa-3x fa-tools text-primary"></i>
                </div>
                <div class="px-4 pb-4">
                    <h4 class="text-uppercase mb-3">Fixing & Support</h4>
                    <p>Duo dolore et diam sed ipsum stet amet duo diam. Rebum amet ut amet sed erat sed sed amet magna elitr amet kasd diam duo</p>
                    <a class="btn text-primary" href="">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                <img class="img-fluid" src="img/service-6.jpg" alt="">
                <div class="service-icon bg-white">
                    <i class="fa fa-3x fa-paint-brush text-primary"></i>
                </div>
                <div class="px-4 pb-4">
                    <h4 class="text-uppercase mb-3">Painting</h4>
                    <p>Duo dolore et diam sed ipsum stet amet duo diam. Rebum amet ut amet sed erat sed sed amet magna elitr amet kasd diam duo</p>
                    <a class="btn text-primary" href="">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->


<!-- Team Start -->
<div class="container-fluid py-6 px-5">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h1 class="display-5 text-uppercase mb-4">We Are <span class="text-primary">Professional & Expert</span> Workers</h1>
    </div>
    <div class="row g-5 justify-content-center">
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="row g-0">
                <div class="col-10" style="min-height: 300px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/team-1.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-2">
                    <div class="h-100 d-flex flex-column align-items-center justify-content-between bg-light">
                        <a class="btn" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn" href="#"><i class="bi bi-instagram"></i></a>
                        <a class="btn" href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="bg-light p-4">
                        <h4 class="text-uppercase">Nguyễn Minh Nhật</h4>
                        <h6 class="text-uppercase">0306201562</h6>
                        <span>CEO & Founder</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="row g-0">
                <div class="col-10" style="min-height: 300px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/team-2.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-2">
                    <div class="h-100 d-flex flex-column align-items-center justify-content-between bg-light">
                        <a class="btn" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn" href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="bg-light p-4">
                        <h4 class="text-uppercase">Nguyễn Bá Lĩnh</h4>
                        <h6 class="text-uppercase">0306201546</h6>
                        <span>Civil Engineer</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="row g-0">
                <div class="col-10" style="min-height: 300px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/team-3.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-2">
                    <div class="h-100 d-flex flex-column align-items-center justify-content-between bg-light">
                        <a class="btn" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn" href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="bg-light p-4">
                        <h4 class="text-uppercase">Phạm Viết Tuấn</h4>
                        <h6 class="text-uppercase">0306201601</h6>
                        <span>Interior Designer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
@endsection