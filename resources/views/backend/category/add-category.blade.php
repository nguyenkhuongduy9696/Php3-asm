@extends('backend.backend_layout.layout')
@section('title','Thêm danh mục')
@section('name','Thêm danh mục')
@section('content')
<div class="container">
    <form action={{asset('admin/category/saveAdd')}} method="post" id="add-cate-form" class="form-horizontal">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-3 control-label">Tên danh mục</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{{ old('cate_name') }}" id="" name="cate_name" placeholder="Nhập tên danh mục...">
                    </div>
                    @error('cate_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div><br>
        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6">
                    <div class="btn-toolbar">
                        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#add-cate-form').validate({
            rules: {
                cate_name: {
                    required: true
                }
            },
            messages: {
                cate_name: {
                    required: "Hãy nhập tên danh mục sản phẩm!"
                }
            }
        })
    });
</script>
@endsection