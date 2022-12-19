<form action="{{ route('admin.loai-do-vat.tao') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Tiêu đề</label>
        <input type="text" class="form-control" name="name" placeholder="Mời bạn nhập tên loại bài viết...">
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
</form>