<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Đăng ký</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Avant">
    <meta name="author" content="The Red Team">

    <link rel="stylesheet" href={{asset('assets/backend/css/styles.minc726.css?=140')}}>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
    <style>
        .form-group label.error{
            color: red;
        }
    </style>
</head>

<body class="focusedform">
    <div class="verticalcenter">
        <a href={{asset('/')}}><img src={{asset('assets/frontend/images/slider/logo.png')}} alt="Logo" class="brand" /></a>
        <div class="panel panel-primary">
            <form action={{asset('saveUser')}} class="form-horizontal" style="margin-bottom: 0px !important;" method="post" enctype="multipart/form-data" id="signup-form">
                @csrf
                <div class="panel-body">
                    <h4 class="text-center" style="margin-bottom: 25px;">Đăng ký thành viên</h4>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                            </div>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Tên tài khoản">
                            </div>
                            @error('username')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" id="pass" name="pass" value="{{ old('pass') }}" placeholder="Mật khẩu">
                            </div>
                            @error('pass')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" id="repass" name="repass" placeholder="Nhập lại mất khẩu">
                            </div>
                            @error('repass')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <label for="">Ảnh đại diện</label>
                    <div class="row">
                        <div class="col-sm-12 col-md-offset-3">
                            <img id="preview-img" src={{asset('img/nopreview.png')}} alt="" width="150px">
                        </div>
                    </div><br>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <span class="input-group-addon"><i class="fa fa-image"></i></span>
                            <input type="file" name="avatar" id="avatar" onchange="encodeImageFileAsURL(this)" class="form-control" name="image" id="" aria-describedby="helpId" placeholder="">
                        </div>
                        @error('avatar')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="pull-left">
                        <a href={{asset('/')}} class="btn btn-default">Về trang chủ</a>
                        <a href={{asset('login')}} class="btn btn-default">Đăng nhập</a>
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success">Đăng ký</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script type='text/javascript' src={{asset('assets/backend/js/jquery-1.10.2.min.js')}}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>
<script>
    function encodeImageFileAsURL(element) {
        var file = element.files[0];
        if (file === undefined) {
            $('#preview-img').attr('src', "{{asset('img/nopreview.png')}}");
        } else {
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#preview-img').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
    $(document).ready(function() {
        $('#signup-form').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                username: {
                    required: true,
                    rangelength: [5, 30]
                },
                pass: {
                    required: true,
                    minlength: 4
                },
                repass: {
                    equalTo: "#pass"
                },
                avatar: {
                    required: true,
                    accept: "image/*"
                }
            },
            messages: {
                email: {
                    required: "Email không được để trống!",
                    email: "Email phải đúng dạng!"
                },
                username: {
                    required: "Tên tài khoản không được để trống!",
                    rangelength: "Tên tài khoản có độ dài từ 5 đến 30 ký tự!"
                },
                pass: {
                    required: "Mật khẩu không được để trống!",
                    minlength: "Mật khẩu ít nhất 4 ký tự!"
                },
                repass: {
                    equalTo: "Mật khẩu nhập lại không khớp!"
                },
                avatar: {
                    required: "Ảnh đại diện không được để trống!",
                    accept: "Mời chọn đúng file ảnh!"
                }
            }
        })
    })
</script>
</html>