@extends('layouts.layout')
@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Xin chào!</h1>
                                    <h6>Vui lòng nhập thông tin cần thiết để đăng nhập.</h6>
                                </div>
                                <form class="user" method="POST" action="{{ route('xu-li-dang-nhap') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Tên Email:</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Địa chỉ Email...">
                                        @error('email')
                                        <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mật khẩu:</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Mật khẩu">
                                        @error('password')
                                        <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Đăng nhập</button>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="">Quên mật khẩu</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('dang-ki') }}">Tạo tài khoản ngay!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
@endsection