<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Avant">
    <meta name="author" content="The Red Team">
    @include('backend.backend_layout.style')
</head>

<body class="">
    @include('backend.backend_layout.header')
    <div id="page-container">
        <!-- BEGIN SIDEBAR -->
        @include('backend.backend_layout.sidebar')
        <div id="page-content">
            <div id='wrap'>
                <div id="page-heading">
                    <ol class="breadcrumb">
                        <h2>@yield('name')</h2>
                    </ol>
                </div>
                <div class="container">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!--wrap -->
        </div> <!-- page-content -->
        <footer role="contentinfo">
            <div class="clearfix">
                <ul class="list-unstyled list-inline pull-left">
                    <li>Duynkph07116 - PHP3</li>
                </ul>
                <button class="pull-right btn btn-inverse-alt btn-xs hidden-print" id="back-to-top"><i class="fa fa-arrow-up"></i></button>
            </div>
        </footer>

    </div> <!-- page-container -->
    @include('backend.backend_layout.script')
    @yield('script')
</body>

</html>