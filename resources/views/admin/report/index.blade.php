@extends('admin.index')
@section('content2')
<div id="content">
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
                        <th scope="col">Người báo cáo</th>
                        <th scope="col">Tin nhắn</th>
                        <th scope="col"> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reportList as $report)
                    <tr>
                        <th scope="row">{{ $report->id }}</th>
                        <th scope="row">{{ $report->post->title }}</th>
                        <th scope="row">{{ $report->user->name }}</th>
                        <th scope="row">{{ $report->message }}</th>
                        <th>
                            <a href="{{ route('bai-dang.chi-tiet',['id' => $report->post->id]) }}" class="btn btn-primary">Xem bài viết</a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- end of table -->

    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection