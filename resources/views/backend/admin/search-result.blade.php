@extends('backend.backend_layout.layout')
@section('title','Kết quả tìm kiếm')
@section('name','Kết quản tìm kiếm')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Danh sách sản phẩm có chứa từ khóa "{{$search}}"</h4>
                <div class="options">
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Giá khuyến mãi</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $pro)
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
                            <td>{{$pro->product_price}} $</td>
                            <td>{{$pro->product_sale_price}} $</td>
                            <td>
                                <a href={{asset('admin/products')}}/{{$pro->id}} class="btn-success btn">Chi tiết</a>
                                <a href={{asset('admin/products/edit')}}/{{$pro->id}} class="btn-primary btn">Sửa</a>
                                <a href={{asset('admin/products/remove')}}/{{$pro->id}} class="btn-danger btn btn-remove">Xóa</a>
                                <a href={{asset('admin/comment/product')}}/{{$pro->id}} class="btn-warning btn">Bình luận</a>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-success">
                            Không tìm thấy sản phẩm nào mà bạn muốn tìm!
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row">
	            {{$products->links()}}
            </div>
        </div>
    </div>
</div>
@endsection