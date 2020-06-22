@extends('backend.backend_layout.layout')
@section('title','Danh sách danh mục sản phẩm')
@section('name','Danh sách danh mục sản phẩm')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            @if(Session::get('msg'))
		        <div class="alert alert-success">
        	        {{ session('msg') }}
    	        </div>
            @endif
            <div class="panel-heading">
                <h4>Danh sách danh mục sản phẩm</h4>
                <div class="options">
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên danh mục</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($obj as $cate)
                        <tr>
                            <td>{{$cate->id}}</td>
                            <td>{{$cate->cate_name}}</td>
                            <td>
                                <a href={{asset('admin/category/edit')}}/{{$cate->id}} class="btn-primary btn">Sửa</a>
                                <a href={{asset('admin/category/remove')}}/{{$cate->id}} class="btn-danger btn btn-remove">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$obj->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.btn-remove').click(function() {
            var redirectUrl = $(this).attr('href');
            Swal.fire({
                title: 'Thông báo!',
                text: "Bạn có chắc chắn muốn xóa danh mục này ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = redirectUrl;
                }
            })
            return false;
        });
    });
</script>
@endsection