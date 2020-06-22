@extends('frontend.frontend_layout.layout')
@section('title','Cửa hàng')
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
<div class="features_items">
	<!--features_items-->
	<h2 class="title text-center">Cửa hàng</h2>
	@foreach($products as $pro)
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<a href={{asset('products')}}/{{$pro->id}}><img src={{asset('uploads')}}/{{$pro->product_image}} alt="" /></a>
					<h4>Đơn giá: ${{$pro->product_price}}</h4>
					<h4>Giá khuyến mãi: ${{$pro->product_sale_price}}</h4>
					<a href={{asset('products')}}/{{$pro->id}}>
						<p>{{$pro->product_name}}</p>
					</a>
					@if($pro->product_quantity>0)
						<a href={{asset('addCart')}}/{{$pro->id}} class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
					@else
						<h4 class="text-danger">Đã hết hàng</h4>
					@endif
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
<div class="row">
	{{$products->links()}}
	</div>
@endsection