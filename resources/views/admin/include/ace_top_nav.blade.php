<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="{{route('admin.dashboard')}}" class="navbar-brand">
                        <small>
                            <img src="{{asset('assets/images/ramdhenu_logo.png')}}" style="height: 23px;">
                            Admin Panel
                        </small>
                    </a>

                    <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
                        <span class="sr-only">Toggle user menu</span>

                        <img src="{!!asset('assets/images/avatars/user.jpg')!!}" alt="Jason's Photo" />
                    </button>

                    <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
                        <span class="sr-only">Toggle sidebar</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
                    <ul class="nav ace-nav">

                        <li class="light-blue user-min">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="{{asset('assets/images/avatars/user.jpg')}}" alt="John Doe Photo" />
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    @if(Auth::check()) {{Auth::user()->name}} @else User Name @endif
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="{{route('admin.change_pass')}}">
                                        <i class="ace-icon fa fa-key"></i>
                                        Change Password
                                    </a>
                                </li>

                                <li>
                                    <a href="profile.html">
                                        <i class="ace-icon fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="{{route('admin.logout')}}">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-container -->
        </div>