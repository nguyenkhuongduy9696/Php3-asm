@extends('frontend.frontend_layout.layout')
@section('title','Thanh toán')
@section('slider')
<br>
<section id="slider">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<img src={{asset('assets/frontend/images/slider/5OOCTC.jpg')}} alt="" width="100%">
			</div>
		</div>
	</div>
</section>
<br>
@endsection
@section('content')
<section id="cart_items">
	<form action={{asset('order')}} id="checkout-form" method="post">
		@csrf
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href={{asset('/')}}>Home</a></li>
				<li class="active">Thanh toán</li>
			</ol>
		</div>
		<div class="register-req">
			<p>Kiểm tra thông tin thanh toán của bạn để hoàn tất quá trình mua hàng</p>
		</div>
		<!--/register-req-->
		@if(session('cart'))
		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-6">
					<div class="shopper-info">
						<h3>Tài khoản mua hàng</h3>
						@if(Auth::check())
						<input type="hidden" value="{{Auth::user()->id}}" name="user_id">
						<p>Tên tài khoản: {{Auth::user()->username}}</p>
						<p>Email: {{Auth::user()->email}}</p>
						@endif
					</div>
				</div>
				<div class="col-sm-4">
					<div class="shopper-info">
						<h3>Thông tin giao hàng</h3>
						<input type="text" name="name" id="name" class="form-control" placeholder="Họ tên người nhận" value="{{old('name')}}">
						@error('name')
						<small class="text-danger">{{ $message }}</small>
						@enderror
						<br>
						<input type="text" name="phone" id="phone" class="form-control" placeholder="Điện thoại" value="{{old('phone')}}">
						@error('phone')
						<small class="text-danger">{{ $message }}</small>
						@enderror
						<br>
						<input type="text" name="address" id="address" class="form-control" placeholder="Địa chỉ giao hàng" value="{{old('address')}}">
						@error('address')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
				</div>
			</div>
		</div>
		<div class="review-payment">
			<h3>Danh sách mặt hàng</h3>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Sản phẩm</td>
						<td class="description"></td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Thành tiền</td>
					</tr>
				</thead>
				<tbody>
					@foreach($carts as $key=>$cart)
					@foreach($products as $pro)
					@if($key==$pro->id)
					<tr>
						<td class="cart_product">
							<img src={{asset('uploads')}}/{{$pro->product_image}} width="100px" alt="">
						</td>
						<td class="cart_description">
							<h4><a href={{asset('products')}}/{{$pro->id}}>{{$pro->product_name}}</a></h4>
						</td>
						<td class="cart_price">
							<p>${{$pro->product_sale_price}}</p>
						</td>
						<td class="cart_quantity">
							<p class="text-center">{{$cart}}</p>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">$<?php echo $pro->product_sale_price * $cart ?></p>
						</td>
					</tr>
					@endif
					@endforeach
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-sm-12">
			<div class="total_area">
				<ul>
					<input type="hidden" value="{{$total}}" name="total_price">
					<li>Tổng giá trị đơn hàng <span>${{$total}}</span></li>
					<li>Phí giao hàng <span>Miễn phí</span></li>
					<li>Tổng cộng <span>${{$total}}</span></li>
				</ul>
				<button type="submit" class="btn btn-default check_out">Hoàn tất thanh toán</button>
			</div>
		</div>
	</form>
	@endif
	@empty($carts)
	<p class="text-success">Giỏ hàng của bạn vẫn chưa có sản phẩm nào, hãy xem qua các
		sản phẩm mới nhất tại <a href={{asset('shop')}}>Cửa hàng</a></p class="text-success">
	@endempty
</section>
@endsection
@section('script')
<script>
	$(document).ready(function() {
		jQuery.validator.addMethod('valid_phone', function(value) {
			var regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
			return value.trim().match(regex);
		});
		$('#checkout-form').validate({
			rules: {
				name: {
					required: true
				},
				phone: {
					required: true,
					valid_phone: true
				},
				address:{
					required: true
				}
			},
			messages: {
				name: {
					required: "Tên người nhận không được để trống!"
				},
				phone:{
					required: "Số điện thoại không được để trống!",
					valid_phone: "Số điện thoại phải đúng dạng!"
				},
				address:{
					required: "Địa chỉ người nhận không được để trống!"
				}

			}
		})
	});
</script>
@endsection