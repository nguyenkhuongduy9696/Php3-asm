<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Danh mục sản phẩm</h2>
        <div class="panel-group category-products" id="accordian">
            <!--category-productsr-->
            @foreach($cates as $cate)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href={{asset('category')}}/{{$cate->id}}>{{$cate->cate_name}}</a></h4>
                </div>
            </div>
            @endforeach
            
        </div>
        <!--/category-products-->
        <div class="shipping text-center">
            <!--shipping-->
            <a href="#"><img src={{asset('uploads/sidebar.jpg')}} alt="" width="100%" style="border-radius:10px;" /></a>
        </div>
        

    </div>
</div>