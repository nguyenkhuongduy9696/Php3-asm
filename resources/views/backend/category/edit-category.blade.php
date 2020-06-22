@extends('backend.backend_layout.layout')
@section('title','Sửa danh mục')
@section('name','Sửa danh mục')
@section('content')
<div class="container">
    <form action={{asset('admin/category/saveEdit')}} method="post" id="edit-cate-form" class="form-horizontal">
    @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" id="id" name="id" value="{{$obj->id}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-3 control-label">Tên danh mục</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="cate_name" value="@if(!old('cate_name')){{$obj->cate_name}}@else{{old('cate_name')}}@endif" name="cate_name"  placeholder="Nhập tên danh mục...">
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
                        <button type="submit" class="btn btn-primary">Sửa danh mục</button>
                        <a href={{asset('admin/category')}} class="btn btn-danger">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

