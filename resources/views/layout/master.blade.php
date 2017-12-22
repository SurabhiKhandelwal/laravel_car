<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="{{asset('/public/admin_theme/bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">        
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- admin_theme style -->
        <link rel="stylesheet" href="{{asset('/public/admin_theme/dist/css/AdminLTE.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('/public/admin_theme/plugins/iCheck/square/blue.css')}}">
        <link rel="stylesheet" href="{{asset('/public/admin_theme/dist/css/skins/_all-skins.min.css')}}">       
    </head>
    <body class="skin-green sidebar-mini">
        <div class="wrapper">
            @include('layout.partials.header')
            @include('layout.partials.dashboardmenus')
            <div class="content-wrapper" style="min-height: 903px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>@yield('page-title')</h1>
                </section>
                <section class="content">
                    @yield('content')                    
                </section>
            </div>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                  <b>Version</b> 1.0.0
                </div>
                <strong>Copyright &copy; {{date('Y')}} <a href="/">Surabhi</a>.</strong> All rights reserved.
            </footer><div class="control-sidebar-bg" style="position: fixed; height: auto;"></div>
            <!--===================================================-->
        </div>
         <script src="{{asset('/public/admin_theme/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="{{asset('/public/admin_theme/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- iCheck -->
        <script src="{{asset('/public/admin_theme/plugins/iCheck/icheck.min.js')}}"></script>
       <!-- Slimscroll -->
    <script src="{{asset('/public/admin_theme/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('/public/admin_theme/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/public/admin_theme/dist/js/app.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/public/admin_theme/dist/js/demo.js')}}"></script>

    </body>
</html>


