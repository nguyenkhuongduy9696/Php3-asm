@extends('frontend.frontend_layout.layout')
@section('title','Giỏ hàng')
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
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href={{asset('/')}}>Home</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
			@if(session('cart'))
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Sản phẩm</td>
							<td class="description"></td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td>Xóa</td>
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
									<div class="cart_quantity_button">
										<a class="cart_quantity_down" href={{asset('cart/down')}}/{{$pro->id}}> - </a>
										<input class="cart_quantity_input" type="text" name="quantity" value="{{$cart}}" autocomplete="off" size="2">
										<a class="cart_quantity_up" href={{asset('cart/up')}}/{{$pro->id}}> + </a>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">$<?php echo $pro->product_sale_price*$cart ?></p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href={{asset('cart/remove')}}/{{$pro->id}}><i class="fa fa-times"></i></a>
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
							<li>Tổng giá trị giỏ hàng <span>${{$total}}</span></li>
							<li>Phí giao hàng <span>Miễn phí</span></li>
							<li>Tổng cộng <span>${{$total}}</span></li>
						</ul>
							<a class="btn btn-default check_out" href={{asset('checkout')}}>Tiến hành thanh toán</a>
					</div>
				</div>
				@endif
				@empty($carts)
				<p class="text-success">Giỏ hàng của bạn vẫn chưa có sản phẩm nào, hãy xem qua các 
					sản phẩm mới nhất tại <a href={{asset('shop')}}>Cửa hàng</a></p class="text-success">
				@endempty
	</section> <!--/#cart_items-->
@endsection