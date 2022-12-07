<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <!-- CSS -->
  <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('/css/style.css') }}">
  <link rel="stylesheet" href="{{ url('/css/sb-admin-2.min.css') }}">
  <!-- Animate.style -->
  <link rel="stylesheet" href="{{ url('/css/animate.min.css') }}">
  <!-- Icon -->
  <link href="{{ url('/bootstrap-icons-1.9.1/bootstrap-icons.css') }}" rel="stylesheet">

  <!-- custome style -->
</head>

<body>
  <!-- Navbar Start -->
  <div class="container-fluid sticky-top bg-dark bg-light-radial shadow-sm px-2 pe-lg-0">
    <nav class="navbar navbar-expand-lg bg-dark bg-light-radial navbar-dark py-3 py-lg-0">
      <a href="{{ route('trang-chu') }}" class="navbar-brand">
        <h1 class="m-0 display-4 text-uppercase text-white"><i class="bi bi-search text-primary me-2"></i>TÌM ĐỒ THẤT LẠC</h1>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
          <a href="{{ route('trang-chu') }}" class="nav-item nav-link active">Trang chủ</a>
          <a href="about.html" class="nav-item nav-link">About</a>
          <a href="service.html" class="nav-item nav-link">Service</a>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
            <div class="dropdown-menu m-0">
              <a href="project.html" class="dropdown-item">Our Project</a>
              <a href="team.html" class="dropdown-item">The Team</a>
              <a href="testimonial.html" class="dropdown-item">Testimonial</a>
              <a href="blog.html" class="dropdown-item">Blog Grid</a>

            </div>
          </div>
          @if(Auth::hasUser())
          <div class="nav-item justify-content-center align-items-center">
            <p class="navbar-nav pt-2">Xin chào</p>
            <a href="{{ route('admin.index') }}" class="nav-link pb-0 pt-0" style="font-size: 1.5rem">{{ Auth::user()->name }}</a>
            <a href="{{ route('dang-xuat') }}" class="nav-link pb-0 pt-0" style="color: red;font-size: 1rem;">Đăng Xuất</a>
          </div>
          @else
          <a href="{{ route('dang-nhap') }}" class="nav-item nav-link">Đăng Nhập</a>
          @endif
          <a href="{{ route('bai-dang.dang-bai') }}" class="nav-item nav-link bg-primary text-white px-5 ms-3 d-none d-lg-block">Đăng Bài <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
    </nav>
  </div>
  <!-- Navbar End -->



  @yield('content')


  <!-- Footer Start -->
  <div class="footer container-fluid position-relative bg-dark bg-light-radial text-white-50 py-3 px-5">
    <div class="row g-5">
      <div class="col-lg-6 pe-lg-5">
        <a href="index.html" class="navbar-brand">
          <h1 class="m-0 display-4 text-uppercase text-white"><i class="bi bi-search text-primary me-2"></i>TÌM ĐỒ THẤT LẠC</h1>
        </a>
        <p>Aliquyam sed elitr elitr erat sed diam ipsum eirmod eos lorem nonumy. Tempor sea ipsum diam sed clita dolore eos dolores magna erat dolore sed stet justo et dolor.</p>
        <p><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</p>
        <p><i class="fa fa-phone-alt me-2"></i>+012 345 67890</p>
        <p><i class="fa fa-envelope me-2"></i>info@example.com</p>
        <div class="d-flex justify-content-start mt-4">
          <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2" href="#"><i class="fab fa-twitter"></i></a>
          <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2" href="#"><i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
          <a class="btn btn-lg btn-primary btn-lg-square rounded-0" href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div class="col-lg-6 ps-lg-5">
        <div class="row g-5">
          <div class="col-sm-6">
            <h4 class="text-white text-uppercase mb-4">Quick Links</h4>
            <div class="d-flex flex-column justify-content-start">
              <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Home</a>
              <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>About Us</a>
              <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Our Services</a>
              <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Meet The Team</a>
              <a class="text-white-50" href="#"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
            </div>
          </div>
          <div class="col-sm-6">
            <h4 class="text-white text-uppercase mb-4">Popular Links</h4>
            <div class="d-flex flex-column justify-content-start">
              <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Home</a>
              <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>About Us</a>
              <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Our Services</a>
              <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Meet The Team</a>
              <a class="text-white-50" href="#"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
            </div>
          </div>
          <div class="col-sm-12">
            <h4 class="text-white text-uppercase mb-4">Newsletter</h4>
            <div class="w-100">
              <div class="input-group">
                <input type="text" class="form-control border-light" style="padding: 20px 30px;" placeholder="Your Email Address"><button class="btn btn-primary px-4">Sign Up</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid bg-dark bg-light-radial text-white border-top border-primary px-0">
    <div class="d-flex flex-column flex-md-row justify-content-between">
      <div class="py-4 px-5 text-center text-md-start">
        <p class="mb-0">&copy; <a class="text-primary" href="#">Your Site Name</a>. All Rights Reserved.</p>
      </div>
      <div class="py-4 px-5 bg-primary footer-shape position-relative text-center text-md-end">
        <p class="mb-0">Designed by <a class="text-dark" href="https://htmlcodex.com">HTML Codex</a></p>
      </div>
    </div>
  </div>
  <!-- Footer End -->


  <!-- JS -->
  <script src="{{ url('/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('/js/sb-admin-2.min.min.js') }}"></script>
  <script src="{{ url('/jquery/jquery.min.js') }}"></script>
  <!-- SweetAlert2 -->
  <script src="{{ url('/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
  <script>
    //the confirm class that is being used in the delete button
    $('.confirm-approve').click(function(event) {
      //This will choose the closest form to the button
      var form = $(this).closest("form");

      //don't let the form submit yet
      event.preventDefault();

      //configure sweetalert alert as you wish
      Swal.fire({
        title: 'Bạn cơ muốn chấp thuận bài đăng này?',
        text: "Bài đăng sẽ được chấp thuận và sẽ hiển thị lên trang web!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!',
        cancelButtonText: "Huỷ bỏ!",
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      })

    });
    $('.confirm-decline').click(function(event) {
      //This will choose the closest form to the button
      var form = $(this).closest("form");

      //don't let the form submit yet
      event.preventDefault();

      //configure sweetalert alert as you wish
      Swal.fire({
        title: 'Bạn cơ muốn từ chối bài đăng này?',
        text: "Bài đăng sẽ được từ chối và không hiển thị lên trang web!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!',
        cancelButtonText: "Huỷ bỏ!",
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      })

    });
    // $('.confirm-decline').click(function(event) {
    //   //This will choose the closest form to the button
    //   var form = $(this).closest("form");

    //   //don't let the form submit yet
    //   event.preventDefault();

    //   //configure sweetalert alert as you wish
    //   Swal.fire({
    //     title: 'Bottom drawer 👋',
    //     input: 'select',
    //     position: 'bottom',
    //     showClass: {
    //       popup: `
    //   animate__animated
    //   animate__fadeInUp
    //   animate__faster
    // `
    //     },
    //     hideClass: {
    //       popup: `
    //   animate__animated
    //   animate__fadeOutDown
    //   animate__faster
    // `
    //     },
    //     grow: 'row',
    //     showConfirmButton: false,
    //     showCloseButton: true
    //   })

    // });
  </script>
  @include('sweetalert::alert')
</body>

</html>