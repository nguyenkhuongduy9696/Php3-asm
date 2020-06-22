@extends('backend.backend_layout.layout')
@section('title','Danh sách đơn hàng')
@section('name','Danh sách đơn hàng')
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
                <h4>Danh sách đơn hàng</h4>
                <div class="options">
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Người nhận</th>
                            <th>Địa chỉ giao hàng</th>
                            <th>Giá trị đơn hàng</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->address}}</td>
                            <td>${{$order->total_price}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>
                                @if($order->order_status==1)
                                    <span class="text-danger">Đang xử lý</span>
                                @else
                                    <span class="text-success">Đã giao hàng</span>
                                @endif
                            </td>
                            <td>
                                <a href={{asset('admin/order')}}/{{$order->id}} class="btn-success btn">Xem chi tiết</a>
                                @if($order->order_status==1)
                                <a href={{asset('admin/order/done')}}/{{$order->id}} class="btn-primary btn btn-done">Đã giao hàng</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$orders->links()}}
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
            $('.btn-done').click(function(){
                var redirectUrl = $(this).attr('href');
                Swal.fire({
                    title: 'Thông báo!',
                    text: "Thay đổi trạng thái đơn hàng thành đã giao hàng ?",
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