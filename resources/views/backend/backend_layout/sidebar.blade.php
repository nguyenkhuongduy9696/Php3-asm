<nav id="page-leftbar" role="navigation">
                <!-- BEGIN SIDEBAR MENU -->
            <ul class="acc-menu" id="sidebar">
                
                <li id="search">
                    <a href="javascript:;"><i class="fa fa-search opacity-control"></i></a>
                     <form action={{asset('admin/search')}} method="post" id="search-form">
                     @csrf
                        <input type="text" class="search-query" name="txt_search" placeholder="Tìm kiếm...">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </li>
                <li class="divider"></li>
                <li><a href={{asset('/')}}><i class="fa fa-home"></i> <span>Trang chủ Frontend</span></a></li>
                <li class="divider"></li>
                <li><a href={{asset('admin')}}><i class="fa fa-home"></i> <span>Trang chủ quản trị</span></a></li>
                <li><a href="javascript:;"><i class="fa fa-group"></i> <span>Thành viên</span></a>
                    <ul class='acc-menu'>
                        <li><a href={{asset('admin/user')}}>Danh sách thành viên</a></li>
                    </ul>
                </li>
                <li><a href="javascript:;"><i class="fa fa-reorder"></i> <span>Danh mục</span></a>
                    <ul class='acc-menu'>
                        <li><a href={{asset('admin/category')}}>Danh sách danh mục</a></li>
                        <li><a href={{asset('admin/category/add')}}>Thêm danh mục</a></li>
                    </ul>
                </li>  
                <li><a href="javascript:;"><i class="fa fa-suitcase"></i> <span>Sản phẩm</span></a>
                    <ul class='acc-menu'>
                        <li><a href={{asset('admin/products')}}>Danh sách sản phẩm</a></li>
                        <li><a href={{asset('admin/products/add')}}>Thêm sản phẩm</a></li>
                    </ul>
                </li>
                <li><a href={{asset('admin/order')}}><i class="fa fa-shopping-cart"></i> <span>Quản lý đơn hàng</span></a>
                </li> 
            </ul>
            <!-- END SIDEBAR MENU -->
        </nav>