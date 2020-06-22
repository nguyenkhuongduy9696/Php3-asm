<header id="header">
    <!--header-->
    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href={{asset('/')}}><img src={{asset('assets/frontend/images/slider/logo.png')}} alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            
                            <li><a href={{asset('cart')}}><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                            <!-- <li><a href="#"><i class="fa fa-lock"></i> Đăng nhập</a></li> -->
                            @if(Auth::check())
                            <li><a href={{asset('checkout')}}><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            <li><a href={{asset('user')}}/{{Auth::user()->id}}><i class="fa fa-user"></i>{{Auth::user()->username}}</a></li>
                            <li><a href={{route('Auth.logout')}}>Đăng xuất</a></li>
                            @else
                            <li><a href={{route('Auth.login')}}><i class="fa fa-user"></i>Đăng nhập</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href={{asset('/')}}>Trang chủ</a></li>
                            <li><a href={{asset('shop')}}>Cửa hàng</a></li>
                            <li><a href="#">Tin tức</a></li>
                            <li><a href={{asset('contact')}}>Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Tìm kiếm..." />
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
<!--/header-->