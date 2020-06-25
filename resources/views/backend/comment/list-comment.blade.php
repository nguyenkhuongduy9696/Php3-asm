@extends('backend.backend_layout.layout')
@section('title','Danh sách bình luận')
@section('name','Danh sách bình luận')
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
                <h4>Danh sách bình luận của sản phẩm {{$pro_name}} </h4>
                <div class="options">
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tài khoản bình luận</th>
                            <th>Ngày đăng</th>
                            <th>Nội dung</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>
                                @php
                                $parent = $comment->getUser();
                                @endphp
                                @if($parent !== false)
                                <?= $parent->username; ?>
                                @endif
                            </td>
                            <td>{{$comment->created_at}}</td>
                            <td>{{$comment->detail}}</td>
                            <td>
                                <a href={{asset('admin/comment/product')}}/{{$pro_id}}/remove/{{$comment->id}} class="btn-danger btn btn-remove">Xóa</a>    
                            </td>
                        </tr>
                        @empty
                        <p class="text-success">Chưa có bình luận nào cho sản phẩm này.</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{$comments->links()}}
        </div>
        <a href={{asset('admin/products')}} class="btn btn-warning">Quay lại</a>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            if($('#msg').length > 0){
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: $('#msg').val(),
                    showConfirmButton: false,
                    timer: 2000
                })
            }
            $('.btn-remove').click(function(){
                var redirectUrl = $(this).attr('href');
                Swal.fire({
                    title: 'Thông báo!',
                    text: "Bạn có chắc chắn muốn xóa bình luận này ?",
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