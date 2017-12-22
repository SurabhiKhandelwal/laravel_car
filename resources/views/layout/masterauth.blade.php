<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">        
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="{{asset('/public/admin_theme/bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">        
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- admin_theme style -->
        <link rel="stylesheet" href="{{asset('/public/admin_theme/dist/css/AdminLTE.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('/public/admin_theme/plugins/iCheck/square/blue.css')}}">
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        @yield('styleheader')
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                
                    <a href="{{ url('login')}}"><b>Admin</b>Panel</a>
                
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                @yield('content')
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
        <div class="text-center">
            Web Application by <a href="http://www.informaticsinc.com" target="blank" class="btn-link">Informatics Inc</a><br><span class="text-center" style="color: #d2d6de;">{{' '.$_SERVER['REMOTE_ADDR']}}</span>
        </div>
        <!-- jQuery 2.1.4 -->
        <script src="{{asset('/public/admin_theme/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="{{asset('/public/admin_theme/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- iCheck -->
        <script src="{{asset('/public/admin_theme/plugins/iCheck/icheck.min.js')}}"></script>
        <!----mask input--->
        <script src="{{asset('/public/js/jquery.maskedinput.js')}}"></script>

        <script>
$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
});
        </script>
        <script src="{{asset('/public/js/custom.js')}}"></script>
        @yield('scriptfooter')
    </body>
</html>
