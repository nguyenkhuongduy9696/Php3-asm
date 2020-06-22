@extends('frontend.frontend_layout.layout')
@section('title')
Liên hệ
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
<h3 class="text-center">Liên hệ</h3>
@if(Session::get('msg'))
<div class="alert alert-success">
    {{ session('msg') }}
</div>
@endif
<div class="col-sm-3"></div>
<div class="col-sm-6 shopper-info">
    <form action="" id="contact-form" method="post">
        @csrf
        <input type="text" name="name" id="name" class="form-control" placeholder="Họ và tên" value="{{old('name')}}">
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
        <br>
        <input type="text" name="phone" id="phone" class="form-control" placeholder="Điện thoại" value="{{old('phone')}}">
        @error('phone')
        <small class="text-danger">{{ $message }}</small>
        @enderror
        <br>
        <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}">
        @error('email')
        <small class="text-danger">{{ $message }}</small>
        @enderror
        <button type="submit" class="btn btn-default check_out">Gửi</button>
    </form>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        jQuery.validator.addMethod('valid_phone', function(value) {
            var regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            return value.trim().match(regex);
        });
        $('#contact-form').validate({
            rules: {
                name: {
                    required: true
                },
                phone: {
                    required: true,
                    valid_phone: true
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                name: {
                    required: "Tên người nhận không được để trống!"
                },
                phone: {
                    required: "Số điện thoại không được để trống!",
                    valid_phone: "Số điện thoại phải đúng dạng!"
                },
                email: {
                    required: "Email không được để trống!",
                    email: "Email phải đúng dạng!"
                }

            }
        })
    });
</script>
@endsection