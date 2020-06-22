<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
	<a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title="Toggle Sidebar"></a>
	<ul class="nav navbar-nav pull-right toolbar">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle username" data-toggle="dropdown">
				<span class="hidden-xs">{{Auth::user()->username}} <i class="fa fa-caret-down"></i></span>
				<img src={{asset('uploads')}}/{{Auth::user()->avatar}} alt="Sample logo" /></a>
			<ul class="dropdown-menu userinfo arrow">
				@if(Auth::check())
				<li class="username">
					<a href="#">
						<div class="pull-left"><img src={{asset('uploads')}}/{{Auth::user()->avatar}} alt="Sample logo" /></div>
						<div class="pull-right">
							<h5>Xin chào</h5><small>Đăng nhập bằng <span>{{Auth::user()->username}}</span></small>
						</div>
					</a>

				</li>
				<li class="userlinks">
					<ul class="dropdown-menu">
						<li><a href={{asset('admin/user')}}/{{Auth::user()->id}}>Tài khoản<i class="pull-right fa fa-cog"></i></a></li>
						<li class="divider"></li>
						<li><a href={{route('Auth.logout')}} class="text-right">Đăng xuất</a></li>
					</ul>
				</li>
				@endif
			</ul>
		</li>
	</ul>
</header>