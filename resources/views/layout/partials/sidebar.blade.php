<!--MAIN NAVIGATION-->
<!--===================================================-->
<nav id="mainnav-container">
    <div id="mainnav">

        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <!--Profile Widget-->
                    <!--================================-->
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap">
                            <div class="pad-btm">
                                <img class="img-circle img-md img-border" src="" alt="Profile Picture">
                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                <span class="pull-right dropdown-toggle">
                                    <i class="dropdown-caret"></i>
                                </span>
                                <p class="mnp-name">{{isset($users_name) && !empty($users_name) ? $users_name : '' }}</p>
                                <span class="mnp-desc">{{isset($users->roles[0]) && !empty($users->roles[0]) ? ucfirst($users->roles[0]) : '' }}</span>
                            </a>
                        </div>
                        <div id="profile-nav" class="collapse list-group bg-trans">
                            <a href="" class="list-group-item">
                                <i class="fa fa-user"></i> View Profile
                            </a>
                            <a href="{{route('logout')}}" class="list-group-item">
                                <i class="fa fa-close"></i> Logout
                            </a>
                        </div>
                    </div>

                    @include('layout.partials.dashboardmenus')
                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>
<!--===================================================-->
<!--END MAIN NAVIGATION-->

