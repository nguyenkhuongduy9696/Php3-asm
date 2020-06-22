@extends('backend.backend_layout.layout')
@section('title','Sửa thông tin thành viên')
@section('name','Cập nhật quyền hạn thành viên')
@section('content')
<div class="container">
    <h2>Sửa thành viên có id là {{$id}}</h2>
    <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <img src={{asset('assets/backend/img/avatar/sample.jpg')}} alt="" width="100%" style="border-radius:50%;margin-bottom:20px;">
        </div>
        <div class="col-md-7 col-md-offset-1">
            <form action={{asset('admin/user/saveEdit')}} method="post" class="form-horizontal">
            @csrf
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="text-primary">Tên tài khoản: admin123</h3>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="id" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selector1" class="col-sm-4 control-label">Quyền hạn</label>
                            <div class="col-sm-7">
                                <select name="selector1" id="selector1" class="form-control">
                                    <option>Thành viên</option>
                                    <option>Quản trị viên</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selector1" class="col-sm-4 control-label">Trạng thái hoạt động</label>
                            <div class="col-sm-7">
                                <select name="selector1" id="selector1" class="form-control">
                                    <option>Hoạt động</option>
                                    <option>Ngừng hoạt động</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a href={{asset('admin/user/1')}} class="btn btn-danger">Quay lại</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function encodeImageFileAsURL(element) {
        var file = element.files[0];
        if (file === undefined) {
            $('#preview-img').attr('src', "{{asset('img/nopreview.png')}}");
        } else {
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#preview-img').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection