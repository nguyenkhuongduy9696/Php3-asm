@extends('frontend.frontend_layout.layout')
@section('title')
@isset($cate)
Danh mục {{$cate->cate_name}}
@endisset
@empty($cate)
Không tìm thấy thông tin danh mục
@endempty
@endsection
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
	<h2 class="title text-center">Các sản phẩm {{$cate->cate_name}} </h2>
	@forelse($products as $pro)
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
	{{$products->links()}}
	@empty
	<p class="text-success">Danh mục này vẫn chưa có sản phẩm.</p>
	@endforelse
</div>
@endsection