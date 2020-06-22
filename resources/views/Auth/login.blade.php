<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Avant">
    <meta name="author" content="The Red Team">

    <link rel="stylesheet" href={{asset('assets/backend/css/styles.minc726.css?=140')}}>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
    <style>
        .form-group label.error {
            color: red;
        }
    </style>
</head>

<body class="focusedform">
    <div class="verticalcenter">
        <a href={{asset('/')}}><img src={{asset('assets/frontend/images/slider/logo.png')}} alt="Logo" class="brand" /></a>
            @isset($errs)
            @foreach($errs as $e)
            <p style="color: red">
                @if(is_array($e))
                {{implode('<br>',$e)}}
                @else
                {{$e}}
                @endif
            </p>
            @endforeach
            @endisset
        <div class="panel panel-primary">
            <form action="" class="form-horizontal" style="margin-bottom: 0px !important;" method="post" id="login-form">
                @csrf
                <div class="panel-body">
                @if (session('msg'))
                    <div class="alert alert-success">
                        {{ session('msg') }}
                    </div>
                @endif
                    <h4 class="text-center" style="margin-bottom: 25px;">Đăng nhập</h4>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Tên tài khoản">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" id="pass" name="pass" placeholder="Mật khẩu">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="pull-left">
                        <a href={{asset('/')}} class="btn btn-default">Về trang chủ</a>
                        <a href={{asset('signup')}} class="btn btn-default">Đăng ký</a>
                    </div>

                    <div class="pull-right">
                        <button type="submit" class="btn btn-success">Đăng nhập</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script type='text/javascript' src={{asset('assets/backend/js/jquery-1.10.2.min.js')}}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function() {
        if ($('#msg').length > 0) {
            Swal.fire({
                position: 'center',
                icon: 'info',
                title: $('#msg').val(),
                showConfirmButton: false,
                timer: 2000
            })
        }
        $('#login-form').validate({
            rules: {
                username: {
                    required: true
                },
                pass: {
                    required: true
                }
            },
            messages: {
                username: {
                    required: "Tên tài khoản không được để trống!"
                },
                pass: {
                    required: "Mật khẩu không được để trống!"
                }
            }
        })
    })
</script>

</html>