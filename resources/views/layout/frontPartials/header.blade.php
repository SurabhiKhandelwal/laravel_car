 <header class="header">
    <div class="top-menu">
        <section class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="user-log">
                        <a data-toggle="modal" data-target="#loginModal">
                            Log in
                        </a> /
                        <a data-toggle="modal" data-target="#regModal">
                            Sign up
                        </a>
                    </div><!-- end .user-log -->
                </div><!-- end .col-sm-4 -->

                <div class="col-md-8 col-sm-8 col-xs-12">
                    <ul class="social-icons">
                        <li>
                            <a class="twitter" href="#">
                                test
                            </a>
                        </li>
                        <li>
                            <a class="facebook" href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a class="twitter" href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a class="google" href="#">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                    </ul>
                </div><!-- end .col-sm-8 -->
            </div><!-- end .row -->
        </section><!-- end .container -->
    </div><!-- end .top-menu -->

    <div class="main-baner">
        <div class="fullscreen background parallax clearfix" 
        style="background-image:url('/public/img/tumblr_n7yhhvUQtx1st5lhmo1_1280.jpg');" data-img-width="1600" data-img-height="1064">

            <div class="main-parallax-content">

                <div class="second-parallax-content">

                    <section class="container">
                        <div class="row">

                            <div class="main-header-container clearfix">

                                <div class="col-md-4 col-sm-12 col-xs-12">

                                    <div class="logo">
                                        <h1>Learning</h1>
                                    </div><!-- end .logo -->

                                </div><!-- end .col-sm-4 -->

                                <div class="col-md-8 col-sm-8 col-xs-12">

                                    <nav id="nav" class="main-navigation">

                                        <ul class="navigation">
                                            <li>
                                                <a href="{!! url('/') !!}">Home</a>
                                            </li>
                                            <li>
                                                <a href="{!! route('ride.list') !!}">rides</a>
                                            </li>
                                            <li>
                                                <a href="{!! route('offer.ride') !!}">Submit</a>
                                            </li>                                            
                                            <li>
                                                <a href="blog.html">Blog</a>
                                            </li>
                                            <li>
                                                <a href="contact-page.html">Contact</a>
                                            </li>
                                        </ul>

                                    </nav><!-- end .main-navigation -->

                                </div><!-- end .col-md-8 -->

                            </div><!-- end .main-header-container -->

                        </div><!-- end .row -->

                    </section><!-- end .container -->

                    @include('layout.frontPartials.search')
                </div><!-- end .second-parallax-content -->

            </div><!-- end .main-parallax-content -->

        </div><!-- end .background .parallax -->

    </div><!-- end .main-baner -->

</header><!-- end .header -->