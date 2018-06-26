<div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse          ace-save-state">
                <script type="text/javascript">
                    try{ace.settings.loadState('sidebar')}catch(e){}
                </script>

                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    {{-- <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-success">
                            <i class="ace-icon fa fa-signal"></i>
                        </button>

                        <button class="btn btn-info">
                            <i class="ace-icon fa fa-pencil"></i>
                        </button>

                        <button class="btn btn-warning">
                            <i class="ace-icon fa fa-users"></i>
                        </button>

                        <button class="btn btn-danger">
                            <i class="ace-icon fa fa-cogs"></i>
                        </button>
                    </div>

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div> --}}
                </div><!-- /.sidebar-shortcuts -->

                <ul class="nav nav-list">
                    <li class="hover">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="hover">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text">
                                Masters
                            </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            {{-- <li class="hover">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>

                                    Layouts
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>

                                <b class="arrow"></b>

                                <ul class="submenu">
                                    <li class="active hover">
                                        <a href="#">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Top Menu
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="hover">
                                        <a href="#">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Two Menus 1
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                </ul>
                            </li> --}}

                            <li class="hover">
                                <a href="{{route('admin.contestant.create')}}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Contestant
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="hover">
                                <a href="{{route('admin.rounds.index')}}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Rounds
                                </a>

                                <b class="arrow"></b>
                            </li>
                            </li>
                            <li class="hover">
                                <a href="{{route('admin.contestant_rounds.create')}}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Conts. to Round.
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
{{-- 
                    <li class="hover">
                        <a href="calendar.html">
                            <i class="menu-icon fa fa-calendar"></i>

                            <span class="menu-text">
                                Calendar

                                <span class="badge badge-transparent tooltip-error" title="2 Important Events">
                                    <i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
                                </span>
                            </span>
                        </a>

                        <b class="arrow"></b>
                    </li> --}}

                    <li class="hover">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-file-o"></i>

                            <span class="menu-text">
                                Reports

                                {{-- <span class="badge badge-primary">5</span> --}}
                            </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="hover">
                                <a href="{{route('overall.votiing')}}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Overall Voting Reports
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="hover">
                                <a href="{{route('voters.report')}}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Voters Reports
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                </ul><!-- /.nav-list -->
            </div>