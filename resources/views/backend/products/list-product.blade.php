@extends('backend.backend_layout.layout')
@section('title','Danh sách sản phẩm')
@section('name','Danh sách sản phẩm')
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
                <h4>Danh sách sản phẩm</h4>
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
                        @foreach($product as $pro)
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
                        @endforeach
                    </tbody>
                </table>
                {{$product->links()}}
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
                text: "Bạn có chắc chắn muốn xóa sản phẩm này ?",
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