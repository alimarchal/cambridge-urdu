<!-- Topbar Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown notification-list">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle nav-link">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="pro-user-name ml-1">
                         {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome</h6>
                    </div>

                    <!-- item-->
                    <a href="#" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>Profile</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                this.closest('form').submit();" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>
                    </form>

                </div>
            </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{route('dashboard')}}" class="logo logo-light">
                <span class="logo-lg">
                    <img src="{{url('logo.png')}}" alt="" height="44">
                </span>
                <span class="logo-sm" style="width: 0px;">
                    <img src="{{url('logo.png')}}" alt="" height="44">
                </span>
            </a>
        </div>

        <div class="clearfix"></div>
    </div> <!-- end container-fluid-->
</div>
<!-- end Topbar -->

<div class="topbar-menu">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

                <li class="has-submenu">
                    <a href="{{route('dashboard')}}"><i class="mdi mdi-view-dashboard"></i>Dashboard</a>
                </li>

                <li class="has-submenu">
                    <a href="javascript:void(0)"> <i class="fa fa-pager"></i>Papers
                        <div class="arrow-down"></div>
                    </a>
                    <ul class="submenu megamenu">
                        <li>
                            <ul>
                                <li>
                                    <a href="{{route('create')}}"><i class="fa fa-plus-circle"></i> Add New paper</a>
                                </li>
                                <li>
                                    <a href="{{route('index')}}"><i class="fa fa-eye"></i> View papers</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="javascript:void(0)"> <i class="fa fa-question-circle"></i>Questions
                        <div class="arrow-down"></div>
                    </a>
                    <ul class="submenu megamenu">
                        <li>
                            <ul>
                                <li>
                                    <a href="{{route('question.create')}}"><i class="fa fa-plus-circle"></i> Add new questions</a>
                                </li>
                                <li>
                                    <a href="{{route('question.index')}}"><i class="fa fa-eye"></i> View questions</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
            <!-- End navigation menu -->

            <div class="clearfix"></div>
        </div>
        <!-- end #navigation -->
    </div>
    <!-- end container -->
</div>
<!-- end navbar-custom -->
