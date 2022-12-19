@extends('admin.index')
@section('content2')
<div id="content">
    <div class="row">
        <div class="col shadow-lg m-3">
            <div class="d-sm-flex align-items-center justify-content-between m-1 mb-4">
                <h1 class="h3 mb-0 text-gray-800 text-uppercase">Bài viết bị báo cáo</h1>
                <a href="{{ route('admin.bao-cao.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Đi đến trang quản lý</a>
            </div>
            <!-- Content Post Table -->
            <div class="col shadow">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tin nhắn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0; $i < ((count($reportList) < 10) ? count($reportList) : 10); $i++)
                        <tr>
                            <th scope="row">{{ $reportList[$i]->id }}</th>
                            <th scope="row">{{ $reportList[$i]->post->title }}</th>
                            <th scope="row">{{ $reportList[$i]->message }}</th>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <!-- end of table -->
        </div>
        <div class="col shadow-lg m-3">
            <div class="d-sm-flex align-items-center justify-content-between m-1 mb-4">
                <h1 class="h3 mb-0 text-gray-800 text-uppercase">Bài viết chờ duyệt</h1>
                <a href="{{ route('admin.bai-dang.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Đi đến trang quản lý</a>
            </div>
            <!-- Content Post Table -->
            <div class="col shadow">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Người đăng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0; $i < 10; $i++)
                        <tr>
                            <th scope="row">{{ $postList[$i]->id }}</th>
                            <th scope="row">{{ $postList[$i]->title }}</th>
                            <th scope="row">{{ $postList[$i]->user->name }}</th>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <!-- end of table -->
        </div>
    </div>
</div>
@endsection