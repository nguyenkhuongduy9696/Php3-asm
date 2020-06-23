@extends('frontend.frontend_layout.layout')
@section('title')
{{$pro->product_name}}
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
<div class="product-details">
        @if(Session::get('msg'))
		    <div class="alert alert-success">
        	    {{ session('msg') }}
    	    </div>
        @endif
    <!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src={{asset('uploads')}}/{{$pro->product_image}} alt="" />
        </div>
    </div>
    <div class="col-sm-7">
        <div class="product-information">
            <!--/product-information-->
            <h2>{{$pro->product_name}}</h2>
            <h3>Loại sản phẩm:
                @php
                $parent = $pro->getCate();
                @endphp
                @if($parent !== false)
                <?= $parent->cate_name; ?>
                @endif</h3>
            <h3>Đơn giá: ${{$pro->product_price}}</h3>
            <h3>Giá khuyến mãi: ${{$pro->product_sale_price}}</h3>
            @if($pro->product_quantity>0)
            <a href={{asset('addCart')}}/{{$pro->id}} class="btn btn-default cart">
                <i class="fa fa-shopping-cart"></i>
                Thêm vào giỏ
            </a>
            @else
            <h3 style="color:red;">Đã hết hàng</h3>
            @endif

        </div>
        <!--/product-information-->
    </div>
</div>
<!--/product-details-->

<div class="category-tab shop-details-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Thông tin sản phẩm</a></li>
            <li><a href="#reviews" data-toggle="tab">Bình luận</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details">
            <p>{{$pro->product_detail}}</p>
        </div>
        <div class="tab-pane fade " id="reviews">
            <div class="col-sm-12">
                @forelse($comments as $comment)
                <div class="product-comment">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>
                                @php
                                $parent = $comment->getUser();
                                @endphp
                                @if($parent !== false)
                                <?= $parent->username; ?>
                                @endif
                            </a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>{{$comment->created_at}}</a></li>
                    </ul>
                    <p>{{$comment->detail}}</p>
                </div>
                @empty
                <p><b>Chưa có bình luận nào cho sản phẩm này</b></p>
                @endforelse
                <p><b>Để lại ý kiến của bạn về sản phẩm</b></p>
                @if(Auth::check())
                <form action={{asset('saveComment')}} method="post" id="comment-form">
                    @csrf
                    <input type="hidden" name="id" value="{{$pro->id}}">
                    <textarea name="comment" id="comment"></textarea>
                    @error('comment')
						<small class="text-danger">{{ $message }}</small>
					@enderror
                    <button type="submit" class="btn btn-default pull-right">
                        Đăng bình luận
                    </button>
                </form>
                @else
                <p>Bạn chưa đăng nhập. Vui lòng <a href={{asset('login')}}>Đăng nhập</a> để đăng bình luận</p>
                @endif
            </div>
        </div>

    </div>
</div><hr><br>
<div class="recommended_items">
    <h2 class="title text-center">Sản phẩm cùng loại</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach($relate_pro as $relate)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href={{asset('products')}}/{{$relate->id}}><img src={{asset('uploads')}}/{{$relate->product_image}} alt="" /></a>
                                <h4>Đơn giá: ${{$relate->product_price}}</h4>
                                <h4>Giá khuyến mãi: ${{$relate->product_sale_price}}</h4>
                                <a href={{asset('products')}}/{{$relate->id}}>
                                    <p>{{$relate->product_name}}</p>
                                </a>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('#comment-form').validate({
			rules: {
				comment: {
					required: true
				}
			},
			messages: {
				comment: {
					required: "Mời bạn nhập nội dung bình luận!"
				}
			}
		})
</script>
@endsection