<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    @include('frontend.frontend_layout.style')
</head>
<!--/head-->

<body>
    @include('frontend.frontend_layout.header')
    @yield('slider')
    <section>   
        <div class="container">
            <div class="row">
                @include('frontend.frontend_layout.sidebar')
                <div class="col-sm-9 padding-right">
                    @yield('content')
                </div>
            </div>
        </div>
    </section><br><br><br>
    @include('frontend.frontend_layout.footer')
    @include('frontend.frontend_layout.script')
    @yield('script')
</body>

</html>