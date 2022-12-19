@extends('layouts.layout')
@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tạo Tài Khoản Mới</h1>
                        </div>
                        <form class="user" method="POST" action="{{ route('xu-li-dang-ki') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="name" class="form-control form-control-user" placeholder="Họ và Tên">
                                    @error('name')
                                    <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                    <input type="text" name="phone" class="form-control form-control-user mt-3" placeholder="Số điện thoại">
                                    @error('phone')
                                    <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-ting m-1">
                                    <div class="control-group file-upload ml-5" id="file-upload1">
                                        <div class="image-box text-center" style="width:7em;height:7em;">
                                            <p>Ảnh đại diện</p>
                                            <img src="" alt="">
                                        </div>
                                        <div class="controls" style="display: none;">
                                            <input type="file" name="avatar" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <input type="text" name="address" class="form-control form-control-user" placeholder="Địa chỉ liên lạc">
                                @error('address')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user" placeholder="Địa chỉ Email">
                                @error('email')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu">
                                    @error('password')
                                    <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="password_confirmation" class="form-control form-control-user" placeholder="Xác nhận mật khẩu">
                                    @error('password')
                                    <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Đăng Ký Ngay
                            </button>
                            <hr>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.html">Already have an account? Login!</a>
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