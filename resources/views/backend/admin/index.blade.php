@extends('backend.backend_layout.layout')
@section('title','Trang chủ quản trị')
@section('name','Trang chủ quản trị')
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-md-3 col-xs-12 col-sm-6">
            <a class="info-tiles tiles-toyo" href={{asset('admin/user')}}>
                <div class="tiles-heading">Tổng số thành viên</div>
                <div class="tiles-body-alt">
                    <div class="text-center">{{$user}}</div>
                </div>
                <div class="tiles-footer">Xem thêm</div>
            </a>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-6">
            <a class="info-tiles tiles-success" href={{asset('admin/products')}}>
                <div class="tiles-heading">Tổng số sản phẩm</div>
                <div class="tiles-body-alt">
                    <div class="text-center">{{$pro}}</div>
                </div>
                <div class="tiles-footer">Xem thêm</div>
            </a>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-6">
            <a class="info-tiles tiles-orange" href={{asset('admin/order')}}>
                <div class="tiles-heading">Tổng số đơn hàng</div>
                <div class="tiles-body-alt">
                    <div class="text-center">{{$order}}</div>
                </div>
                <div class="tiles-footer">Xem thêm</div>
            </a>
        </div>
    </div>
</div>
@endsection
