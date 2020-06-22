@extends('frontend.frontend_layout.layout')
@section('title','Trang chủ')
@section('slider')
<section id="slider">
	<!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#slider-carousel" data-slide-to="1"></li>
						<li data-target="#slider-carousel" data-slide-to="2"></li>
					</ol>

					<div class="carousel-inner">
						<div class="item active">
							<div class="col-sm-6">
								<h1><span>E</span>-SHOPPER</h1>
								<h2>Bộ sưu tập chân váy nữ mới nhất</h2>
								<p>Các thiết kế chân váy nữ mới nhất giúp bạn nữ tự tin cho một ngày dài năng động.</p>
								<button type="button" class="btn btn-default get">Xem ngay</button>
							</div>
							<div class="col-sm-6">
								<img src={{asset('assets/frontend/images/slider/6f077a0bbe33596d0022-550x550.jpg')}} class="girl img-responsive img-slider" alt="" />
							</div>
						</div>
						<div class="item">
							<div class="col-sm-6">
								<h1><span>E</span>-SHOPPER</h1>
								<h2>Đầm xinh cho ngày mới năng động</h2>
								<p> Nổi tiếng với nhiều mẫu váy đầm cao cấp với chất lượng, E-SHOPPER luôn đặt uy tín lên trên đầu và tư vấn khách hàng nhiệt tình nhất. </p>
								<button type="button" class="btn btn-default get">Xem ngay</button>
							</div>
							<div class="col-sm-6">
								<img src={{asset('assets/frontend/images/slider/71869886_2493584794054664_1235888027813806080_n.jpg')}} class="girl img-responsive img-slider" alt="" />
							</div>
						</div>

						<div class="item">
							<div class="col-sm-6">
								<h1><span>E</span>-SHOPPER</h1>
								<h2>Áo thun cá tính</h2>
								<p>Áo thun nữ mới nhất 2020 đem lại phòng cách cá tính và trẻ trung cho các bạn gái tỏa sáng.</p>
								<button type="button" class="btn btn-default get">Xem ngay</button>
							</div>
							<div class="col-sm-6">
								<img src={{asset('assets/frontend/images/slider/685d0078141090d7ac239232457b803e.jpg')}} class="girl img-responsive img-slider" alt="" />
							</div>
						</div>

					</div>

					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>

			</div>
		</div>
	</div>
</section>
<!--/slider-->
@endsection
@section('content')
<div class="features_items">
	<!--features_items-->
	@if(Session::get('msg'))
		<div class="alert alert-success">
        	{{ session('msg') }}
    	</div>
    @endif
	<h2 class="title text-center">Sản phẩm mới</h2>
	
	@foreach($new_pros as $new_pro)
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<a href={{asset('products')}}/{{$new_pro->id}}><img src={{asset('uploads')}}/{{$new_pro->product_image}} alt="" /></a>
					<h4>Đơn giá: ${{$new_pro->product_price}}</h4>
					<h4>Giá khuyến mãi: ${{$new_pro->product_sale_price}}</h4>
					<a href={{asset('products')}}/{{$new_pro->id}}>
						<p>{{$new_pro->product_name}}</p>
					</a>
					@if($new_pro->product_quantity>0)
						<a href={{asset('addCart')}}/{{$new_pro->id}} class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
					@else
						<h4 class="text-danger">Đã hết hàng</h4>
					@endif
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
<!--features_items-->

<div class="category-tab">
	<!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			@foreach($cates as $cate)
			@if($cate_count==0)
			<li class="active"><a href="#cate{{$cate->id}}" data-toggle="tab">{{$cate->cate_name}}</a></li>
			@php 
			$cate_count++
			@endphp
			@else 
			<li><a href="#cate{{$cate->id}}" data-toggle="tab">{{$cate->cate_name}}</a></li>
			@endif
			@endforeach
		</ul>
	</div>
	<div class="tab-content">
		@foreach($cates as $cate)
		@if($pro_count==0)
		<div class="tab-pane fade active in" id="cate{{$cate->id}}">
			<?php
				$dem=0;
			?>
			@foreach($pros as $pro)
			@if($pro->cate_id==$cate->id)
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
			<?php
				$dem++;
				if($dem==4){
				break;
				}
			?>
			@endif
			@endforeach
			@php
			$pro_count++;
			@endphp
		</div>
		@else
		<div class="tab-pane fade" id="cate{{$cate->id}}">
		<?php
				$dem=0;
			?>
			@foreach($pros as $pro)
			@if($pro->cate_id==$cate->id)
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
			<?php
				$dem++;
				if($dem==4){
				break;
				}
			?>
			@endif
			@endforeach
		</div>
		@endif
		@endforeach
	</div>
</div>
<!--/category-tab-->

<div class="recommended_items">
	<!--recommended_items-->
	<h2 class="title text-center">Sản phẩm bán chạy</h2>

	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				@foreach($sold_pros as $sold_pro)
				<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href={{asset('products')}}/{{$sold_pro->id}}><img src={{asset('uploads')}}/{{$sold_pro->product_image}} alt="" /></a>
							<h4>Đơn giá: ${{$sold_pro->product_price}}</h4>
							<h4>Giá khuyến mãi: ${{$sold_pro->product_sale_price}}</h4>
							<a href={{asset('products')}}/{{$sold_pro->id}}>
								<p>{{$sold_pro->product_name}}</p>
							</a>
							<p>Đã bán {{$sold_pro->sold_number}} sản phẩm</p>
							@if($sold_pro->product_quantity>0)
								<a href={{asset('addCart')}}/{{$sold_pro->id}} class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
							@else
								<h4 class="text-danger">Đã hết hàng</h4>
							@endif
						</div>
					</div>
				</div>
			</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
<!--/recommended_items-->

@endsection
@section('script')

<!-- <script>
	Swal.fire({
    	position: 'center',
        icon: 'info',
        title: 'Thêm sản phẩm vào giỏ hàng thành công!',
        showConfirmButton: false,
        timer: 2000
    })
</script> -->
@endsection