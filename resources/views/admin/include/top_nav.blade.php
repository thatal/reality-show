<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">{{config('app.name')}} </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i>@if(Auth::check()) {{Auth::user()->name}} @else User Name @endif<b class="caret"></b></a>
            <ul class="dropdown-menu">
              {{-- <li><a href="{{route('admin.profile')}}">Profile</a></li> --}}
              <li><a href="{{route('admin.change_pass')}}"><i class="icon-key"></i>  Change Password</a></li>
              <li><a href="{{route('admin.logout')}}"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
        <!-- <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form> -->
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>