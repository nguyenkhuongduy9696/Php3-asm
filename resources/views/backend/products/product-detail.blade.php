@extends('backend.backend_layout.layout')
@section('title','Chi tiết sản phẩm')
@section('content')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel panel-heading">
            <h4 class="text-center">Chi tiết sản phẩm</h4> <br>
        </div>
        <div class="panel panel-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <img src={{asset('uploads')}}/{{$pro->product_image}} alt="" width="100%">
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <h2 class="text-primary">{{$pro->product_name}}</h2>
                    <h4>Loại sản phẩm:
                        @php
                        $parent = $pro->getCate();
                        @endphp
                        @if($parent !== false)
                        <?= $parent->cate_name; ?>
                        @endif
                    </h4>
                    <h4>Đơn giá: {{$pro->product_price}}$</h4>
                    <h4>Giá khuyến mãi: {{$pro->product_sale_price}}$</h4>
                    <h4>Số lượng đã bán: {{$pro->sold_number}}</h4>
                    <h4>Tồn kho: {{$pro->product_quantity}}</h4>
                    <h4>Ngày đăng: {{$pro->created_at}}</h4>
                    <h3></h3>
                </div>
            </div><br><br>
            <h2 class="col-md-offset-1 text-primary">Thông tin sản phẩm</h2>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <p>{{$pro->product_detail}}</p>
                </div>
            </div><br>
            <a href={{asset('admin/products')}} class="btn btn-primary col-md-offset-1">Quay lại</a>
        </div>
    </div>
</div>
@endsection