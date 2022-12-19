@extends('layouts.layout')
@section('content')
<div class="shadow-lg p-5 m-5 bg-white rounded position-relative">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="text-wrap">{{ $post->post_type->name }}</h4>
            <h1 class="mb-0 text-uppercase display-4">{{ $post->title }}</h1>
            <h5 class="mb-0">Nơi tìm thấy / đánh rơi: {{ $post->found_address }}</h5>
            <p>{{ $post->item_type->name }}</p>
        </div>
        <div>
            <h5>Người đăng:</h5>
            <a class="btn" href="{{ route('tai-khoan.chi-tiet',['id' => $post->user->id]) }}">
                <h3>{{ $post->user->name }}</h3>
            </a>
            <p>Ngày đăng: {{ $post->created_at }}</p>
            @if(Auth::hasUser())
            @if(Auth::user()->isAdmin == 1)
            @if($post->status == 0 || $post->status == -1)
            <form action="{{ route('admin.bai-dang.chap-thuan',['id'=>$post->id]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-success confirm-approve">Chấp thuận</button>
            </form>
            @endif
            @if($post->status == 1)
            <form action="{{ route('admin.bai-dang.tu-choi',['id'=>$post->id]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger confirm-decline">Từ chối</button>
            </form>
            @endif
            @endif
            @endif
        </div>
        <div>
            <img src="{{ url('/UserAvatar/'.$post->user->avatar) }}" alt="" class="rounded-circle shadow-4 float-right" style="width:200px; height: 200px; object-fit: cover;">
        </div>
    </div>
    <hr>
    <div class="d-sm-flex align-items-start justify-content-between mb-4" style="max-height: 600px!important;">
        <div class="row m-4">
            <div class="mb-5">{!! $post->content !!}</div>
            <hr>

            <a class="m-1 col btn btn-primary" style="color: white;" href="{{ route('tai-khoan.chi-tiet',['id' => $post->user->id]) }}">Liên hệ</a>
            @if(Auth::hasUser())
            @if(Auth::id()!=$post->user->id)
            <a class="m-1 col btn btn-danger" style="color: white;" data-toggle="modal" data-target="#reportModal">Báo cáo</a>

            <!--  -->
            <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Báo cáo bài đăng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('them-bao-cao',['id'=>$post->id]) }}" method="post">
                                @csrf
                                <label for="">Lý do:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="message" value="Bài viết lừa đảo" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Bài viết lừa đảo
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

                                <button type="submit" class="btn btn-danger m-2 row" id="dialog">Báo cáo</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            @endif
            @endif
        </div>
        <div style="max-height: 600px!important;">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @if($post->image_1 != null)
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ url('/PostImage/'.$post->image_1) }}" alt="First slide" style="width:400px;height: 400px;overflow: hidden;object-fit: fill;">
                    </div>
                    @endif
                    @if($post->image_2 != null)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ url('/PostImage/'.$post->image_2) }}" alt="First slide" style="width:400px;height: 400px;overflow: hidden;object-fit: fill;">
                    </div>
                    @endif
                    @if($post->image_3 != null)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ url('/PostImage/'.$post->image_3) }}" alt="First slide" style="width: 400px;height: 400px;overflow: hidden;object-fit: fill;">
                    </div>
                    @endif
                    @if($post->image_4 != null)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ url('/PostImage/'.$post->image_4) }}" alt="First slide" style="width:400px;height: 400px;overflow: hidden;object-fit: fill;">
                    </div>
                    @endif
                    @if($post->image_5 != null)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ url('/PostImage/'.$post->image_5) }}" alt="First slide" style="width:400px;height: 400px;overflow: hidden;object-fit: fill;">
                    </div>
                    @endif
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
    @switch($post->status)
    @case(-1)
    <div class="position-absolute float-left d-flex w-100 h-100  justify-content-center" style="left:0;top:auto;right: 0;bottom: 0;background-color: #830000a1;">
        <div style="margin-top: 200px;color:white;" class="text-center">
            <h1 style="vertical-align: middle; ">
                BÀI ĐĂNG ĐÃ BỊ TỪ CHỐI
            </h1>
            @if($rejectMsg->id != -1)
            <h6>Lí do: {{$rejectMsg->message}}</h6>
            @endif
        </div>
    </div>
    @break
    @case(0)
    <div class="position-absolute float-left d-flex w-100 h-100  justify-content-center" style="left:0;top:auto;right: 0;bottom: 0;background-color: #000083a1;">
        <div style="margin-top: 200px;color:white;" class="text-center">
            <h1 style="vertical-align: middle; ">
                BÀI ĐĂNG ĐANG TRONG TRẠNG THÁI CHỜ XÉT DUYỆT
            </h1>
            <h6>Vui lòng chờ quản trị viên xem xét, nếu bài viết không vi phạm sẽ được đăng lên hệ thống web</h6>
        </div>
    </div>
    @break
    @case(2)
    <div class="position-absolute float-left d-flex w-100 h-100  justify-content-center" style="left:0;top:auto;right: 0;bottom: 0;background-color: #078300a1;">
        <div style="margin-top: 200px;color:white;" class="text-center">
            <h1 style="vertical-align: middle; ">
                BÀI ĐĂNG ĐÃ ĐƯỢC ĐÁNH DẤU HOÀN TẤT
            </h1>
            <h6>Bài đăng đã được xác nhận đã tìm thấy / trả lại, cảm ơn bạn đã đăng bài viết này!</h6>
        </div>
    </div>
    @break
    @endswitch
</div>

@endsection