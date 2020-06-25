@extends('backend.backend_layout.layout')
@section('title','Danh sách thành viên')
@section('name','Danh sách thành viên')
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
                <h4>Danh sách thành viên</h4>
                <div class="options">
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên tài khoản</th>
                            <th>Ảnh đại diện</th>
                            <th>Email</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td><img src={{asset('uploads')}}/{{$user->avatar}} alt="" width="80px" style="border-radius:50%;"></td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href={{asset('admin/user')}}/{{$user->id}} class="btn-success btn">Chi tiết</a>
                                <a href={{asset('admin/user/edit')}}/{{$user->id}} class="btn-primary btn">Sửa</a>
                                <a href={{asset('admin/user/remove')}}/{{$user->id}} class="btn-danger btn btn-remove">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$users->links()}}
            </div>
        </div>
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
                    text: "Bạn có chắc chắn muốn xóa thành viên này ?",
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
