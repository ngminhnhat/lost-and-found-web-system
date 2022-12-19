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
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100" method="POST" action="{{ route('admin.bai-dang.tim-kiem') }}">
                @csrf
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
                    <label for="">Trạng thái: </label>
                    <select name="status" id="" class="form-select">
                        <option value="">Tất cả</option>
                        <option value="0">Chờ duyệt</option>
                        <option value="1">Đã chấp thuận</option>
                        <option value="2">Đã hoàn tất</option>
                        <option value="-1">Đã từ chối</option>
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

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading Post -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 text-uppercase">Danh sách bài viết</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Post Table -->
        <div class="col shadow">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Người đăng</th>
                        <th scope="col">Loại bài viết</th>
                        <th scope="col">Loại đồ vật</th>
                        <th scope="col">Nơi đánh rơi / tìm thấy</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col"> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($postList as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <th scope="row">{{ $post->title }}</th>
                        <th scope="row">{{ $post->user->name }}</th>
                        <th scope="row">{{ $post->post_type->name }}</th>
                        <th scope="row">{{ $post->item_type->name }}</th>
                        <th scope="row">{{ $post->found_address }}</th>
                        @switch($post->status)
                        @case(-1)
                        <th scope="row">Từ chối</th>
                        @break
                        @case(0)
                        <th scope="row">Chờ xét duyệt</th>
                        @break
                        @case(1)
                        <th scope="row">Đã duyệt</th>
                        @break
                        @case(2)
                        <th scope="row">Đã tìm thấy / trả lại</th>
                        @break
                        @endswitch
                        <th scope="row">
                            <div class="d-inline-flex float-right">


                                @if($post->status == 0)
                                <form action="{{ route('admin.bai-dang.chap-thuan',['id'=>$post->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success confirm-approve">Chấp thuận</button>
                                </form>
                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#declinePostModal">Từ chối</a>
                                @endif
                                @if($post->status == 1)
                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#declinePostModal">Từ chối</a>
                                @endif
                                <a href="{{ route('bai-dang.chi-tiet',['id'=>$post->id]) }}" data-id="" class="btn btn-primary">Chi tiết</a>
                                <div class="modal fade" id="declinePostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Từ chối bài đăng</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.bai-dang.tu-choi',['id'=>$post->id]) }}" method="post">
                                                    @csrf
                                                    <label for="">Lí do bài đăng này bị từ chối:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="message" value="Bài viết lừa đảo" id="flexCheckChecked" checked>
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Nội dung bài viết không liên quan với hệ thống
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="message" value="Bài viết có từ ngữ không phù hợp" id="flexCheckChecked1">
                                                        <label class="form-check-label" for="flexCheckChecked1">
                                                            Bài viết có từ ngữ không phù hợp
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="message" value="Bài viết có hình ảnh không phù hợp" id="flexCheckChecked2">
                                                        <label class="form-check-label" for="flexCheckChecked2">
                                                            Bài viết có hình ảnh không phù hợp
                                                        </label>
                                                    </div>

                                                    <button type="submit" class="btn btn-danger m-2 row confirm-decline">Từ chối</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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