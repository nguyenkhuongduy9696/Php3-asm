@extends('backend.backend_layout.layout')
@section('title','Chi tiết tài khoản')
@section('content')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>Thông tin tài khoản</h4> <br>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    <img src={{asset('uploads')}}/{{$user->avatar}} alt="" width="100%" style="border-radius:50%;margin-bottom:20px;">
                    <a href={{asset('admin/user/edit')}}/{{$user->id}} class="btn btn-primary col-md-offset-2">Chỉnh sửa</a>
                    <a href={{asset('admin/user')}} class="btn btn-danger">Quay lại</a>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <h4 class="text-primary">Tên tài khoản: {{$user->username}}</h4>
                    <h4>Email: {{$user->email}}</h4>
                    <h4>Trạng thái hoạt động: đang hoạt động</h4>
                </div>
            </div><br><br>
        </div>
    </div>

</div>
@endsection