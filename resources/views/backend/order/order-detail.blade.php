@extends('backend.backend_layout.layout')
@section('title','Chi tiết đơn hàng')
@section('content')
<div class="container">
    <h3 class="text-success">Chi tiết đơn hàng có id {{$order->id}}</h3> <br>
    <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <img src={{asset('uploads')}}/{{$user->avatar}} alt="" width="100%" style="border-radius:50%;margin-bottom:20px;">
        </div>
        <div class="col-md-6 col-md-offset-1">
            <h3 class="text-primary">Thông tin người mua</h3>
            <h4>Username: {{$user->username}}</h4>
            <h4>Email: {{$user->email}}</h4>
            <h4>Họ tên người nhận: {{$order->name}}</h4>
            <h4>Số điện thoại: {{$order->phone}}</h4>
            <h4>Địa chỉ: {{$order->address}}</h4>
            <h4>Giá trị đơn hàng: ${{$order->total_price}}</h4>
        </div>
    </div><br><br>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Danh sách sản phẩm trong đơn hàng</h4>
                    <div class="options">
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Giá khuyến mãi</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order_details as $order_detail)
                                @foreach($products as $pro)
                                    @if($order_detail->product_id==$pro->id)
                                        <tr>
                                            <td>{{$pro->id}}</td>
                                            <td>{{$pro->product_name}}</td>
                                            <td>
                                                @php
                                                    $parent = $pro->getCate();
                                                @endphp
                                                @if($parent !== false)
                                                <?= $parent->cate_name; ?>
                                                @endif
                                            </td>
                                            <td><img src={{asset('uploads')}}/{{$pro->product_image}} alt="" width="70px"></td>
                                            <td>{{$pro->product_sale_price}}$</td>
                                            <td>{{$order_detail->quantity}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <a href={{asset('admin/order')}} class="btn btn-warning">Quay lại</a>
        </div>
    </div>
</div>
@endsection