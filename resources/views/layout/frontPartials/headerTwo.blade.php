 <header class="header">
    <div class="top-menu">
        <section class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="logo">
                        <h1>Learning</h1>
                    </div>                    
                </div>
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
                                <a href="{!! route('user.personal') !!}">Profile</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{!! route('user.personal') !!}">Personal Details</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('user.carDetail') !!}">Car Details</a>
                                    </li>
                                </ul>
                            </li>
                            @if(Sentinel::check())
                            <li>
                                <a href="{!! route('logout') !!}">
                                    Log out
                                </a>
                            </li>
                            @endif
                        </ul>
                    </nav>                    
                </div>
            </div>
        </section>
    </div>
</header>