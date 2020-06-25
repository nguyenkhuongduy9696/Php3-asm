@extends('backend.backend_layout.layout')
@section('title','Sửa sản phẩm')
@section('content')
<div class="container">
    <h2>Sửa sản phẩm</h2>
    <form action={{asset('admin/products/saveEdit')}} method="post" id="edit-product-form" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="id" name="id" value='{{$pro->id}}'>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-3 control-label">Tên sản phẩm</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="" name="product_name" 
                        placeholder="Nhập tên sản phẩm..." value="@if(!old('product_name')){{$pro->product_name}}@else{{old('product_name')}}@endif">
                    </div>
                    @error('product_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="selector1" class="col-sm-3 control-label">Loại sản phẩm</label>
                    <div class="col-sm-6">
                        <select name="cate_id" id="" class="form-control">
                            @foreach ($cates as $cate):?>
                            <option @if($cate->id == $pro->cate_id):
                                selected
                                @endif
                                value="{{ $cate->id }}">{{ $cate->cate_name}}</option>
                            @endforeach;
                        </select>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-3 control-label">Giá sản phẩm</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="product_price" name="product_price" 
                        placeholder="Nhập giá sản phẩm..." value="@if(!old('product_price')){{$pro->product_price}}@else{{old('product_price')}}@endif">
                    </div>
                    @error('product_price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-3 control-label">Giá khuyến mãi</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="product_sale_price" name="product_sale_price"
                         placeholder="Nhập giá khuyến mãi..." value="@if(!old('product_sale_price')){{$pro->product_sale_price}}@else{{old('product_sale_price')}}@endif">
                    </div>
                    @error('product_sale_price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-3 control-label">Số lượng</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="" name="product_quantity" 
                        placeholder="Nhập số lượng..." value="@if(!old('product_quantity')){{$pro->product_quantity}}@else{{old('product_quantity')}}@endif">
                    </div>
                    @error('product_quantity')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-5 offset-4">
                        <img id="preview-img" src={{asset('uploads')}}/{{$pro->product_image}} alt="" width="200px">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    <input type="file" onchange="encodeImageFileAsURL(this)" name="product_image" class="fileinput-new" name="image" id="" aria-describedby="helpId" placeholder="">
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Mô tả sản phẩm</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="" name="product_detail" cols="110" rows="10">@if(!old('product_detail')){{$pro->product_detail}}@else{{old('product_detail')}}@endif</textarea>
                </div>
                @error('product_detail')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6">
                    <div class="btn-toolbar">
                        <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
                        <a href={{asset('admin/products')}} class="btn btn-danger">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script>
    function encodeImageFileAsURL(element) {
        var file = element.files[0];
        if (file === undefined) {
            $('#preview-img').attr('src', "{{asset('uploads')}}/{{$pro->product_image}}");
        } else {
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#preview-img').attr('src', reader.result);
                // console.log('RESULT', reader.result)
            }
            reader.readAsDataURL(file);
        }
    }
    $(document).ready(function() {
        $.validator.addMethod("lessThan",
            function(value, element, param) {
                var $otherElement = $(param);
                return parseFloat(value, 10) < parseFloat($otherElement.val(), 10);
            });
        $('#edit-product-form').validate({
            rules: {
                product_name: {
                    required: true,
                    minlength: 4
                },
                product_price: {
                    required: true,
                    min: 1
                },
                product_sale_price: {
                    required: true,
                    min: 1,
                    lessThan: "#product_price"
                },
                product_quantity: {
                    required: true,
                    min: 0
                },
                product_detail: {
                    required: true
                },
                product_image: {
                    accept: "image/*"
                }
            },
            messages: {
                product_name: {
                    required: "Tên sản phẩm không được để trống!",
                    minlength: "Tên sản phẩm ít nhất 4 ký tự!"
                },
                product_price: {
                    required: "Giá sản phẩm không được để trống!",
                    min: "Giá sản phẩm thấp nhất bằng 1!"
                },
                product_sale_price: {
                    required: "Giá khuyến mãi không được để trống!",
                    min: "Giá khuyến mãi thấp nhất bằng 1",
                    lessThan: "Giá khuyến mãi phải nhỏ hơn giá gốc!"
                },
                product_quantity: {
                    required: "Số lượng sản phẩm không được để trống!",
                    min: "Số lượng sản phẩm thấp nhất bằng 0!"
                },
                product_detail: {
                    required: "Mô tả sản phẩm không được để trống!"
                },
                product_image: {
                    accept: "Mời chọn đúng file ảnh!"
                }
            }
        })
    })
</script>
@endsection