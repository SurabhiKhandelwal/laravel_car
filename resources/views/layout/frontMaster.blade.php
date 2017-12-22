<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>My ride - @yield('title')</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('/public/admin_theme/bootstrap/css/bootstrap.min.css')}}">
        <!-- Forms -->
        <link href="{{asset('/public/css/jquery.idealforms.css')}}" rel="stylesheet">
        <!-- Select  -->
        <link href="{{asset('/public/css/jquery.idealselect.css')}}" rel="stylesheet">
        <!-- Slicknav  -->
        <link href="{{asset('/public/css/slicknav.css')}}" rel="stylesheet">
        <!-- Main style -->
        <link href="{{asset('/public/css/style.css')}}" rel="stylesheet">

        <!-- Modernizr -->
        <script src="{{asset('/public/js/modernizr.js')}}"></script>

        <!-- Fonts -->
        <link href="{{asset('/public/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    </head>
    <body>
        @include('layout.frontPartials.header')
        <section class="main-content">
            <div class="container">
                <div class="row">
                    <div class="page-content">
                        @if(Request::is('/'))
                            @include('layout.frontPartials.service')
                        @endif
                        <a href="{{ url('login/google')}}" class=" btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Google signin</a>
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>
        @include('layout.frontPartials.footer')
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="{{asset('/public/admin_theme/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- Main jQuery -->
        <script type="text/javascript" src="{{asset('/public/js/jquery.main.js')}}"></script>
        <!-- Form -->
        <script type="text/javascript" src="{{asset('/public/js/jquery.idealforms.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/public/js/jquery.idealselect.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/public/js/jquery-ui-1.10.4.custom.min.js')}}"></script>
        <!-- Menu -->
        <script type="text/javascript" src="{{asset('/public/js/hoverIntent.js')}}"></script>
        <script type="text/javascript" src="{{asset('/public/js/superfish.js')}}"></script>
        <!-- Counter-Up  -->
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script type="text/javascript" src="{{asset('/public/js/jquery.counterup.min.js')}}"></script>
        <!-- Rating  -->
        <script type="text/javascript" src="{{asset('/public/js/bootstrap-rating-input.min.js')}}"></script>
        <!-- Slicknav  -->
        <script type="text/javascript" src="{{asset('/public/js/jquery.slicknav.min.js')}}"></script>
        
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO0OuZWfr-qE790TVsHcd8n-OkF-XHp1w&libraries=places"></script>
       <script type="text/javascript" src="{{asset('/public/js/map.js')}}"></script>
    </body>
</html>


