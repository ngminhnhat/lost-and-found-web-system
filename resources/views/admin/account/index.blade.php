@extends('admin.index')
@section('content2')

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <div class="shadow-sm p-2">
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100" method="POST" action="{{ route('admin.tai-khoan.tim-kiem') }}">
                @csrf
                <div class="input-group">
                    <label for="">Số điện thoại: </label>
                    <input name="phone" type="text" class="form-control bg-light border-0 small" placeholder="Số điện thoại" aria-label="Search" aria-describedby="basic-addon2">
                    <label for="">Trạng thái: </label>
                    <select name="status" id="" class="form-select">
                        <option value="">Tất cả</option>
                        <option value="0">Đang hoạt động</option>
                        <option value="-1">Vô hiệu hoá</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>


    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading Post -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 text-uppercase">Danh sách tài khoản</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Post Table -->
        <div class="col shadow">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Sdt</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col"> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listUser as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <th scope="row">{{ $user->email }}</th>
                        <th scope="row">{{ $user->name }}</th>
                        <th scope="row">{{ $user->phone }}</th>
                        <th scope="row">{{ $user->address }}</th>
                        <th scope="row">{{ $user->created_at }}</th>
                        @switch($user->status)
                        @case(-1)
                        <th scope="row">Vô hiệu hoá</th>
                        @break
                        @case(0)
                        <th scope="row">Đang hoạt động</th>
                        @endswitch
                        <th scope="row">
                            <div class="d-inline-flex">
                                <a href="{{ route('tai-khoan.chi-tiet',['id'=>$user->id]) }}" data-id="" class="btn btn-primary">Chi tiết</a>

                                @if($user->status == -1)
                                <form action="{{ route('admin.tai-khoan.hoat-dong',['id'=>$user->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success confirm-active">Kích hoạt</button>
                                </form>
                                @endif
                                @if($user->status == 0)
                                <form action="{{ route('admin.tai-khoan.vo-hieu',['id'=>$user->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger confirm-deactive">Vô hiệu hoá</button>
                                </form>
                                @endif
                            </div>

                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection