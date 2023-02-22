@include('layouts.header')

<body>

    <div class="wrapper">
        @include('layouts.sidebar')
        <div class="main-panel ps-container ps-theme-default" data-ps-id="628769e1-a4ad-ca77-b999-efb5b31d7c43">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon">
                            <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                            <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Dashboard PRO</a>
                    </div>
                    <div class="collapse navbar-collapse">

                        <form class="navbar-form navbar-left navbar-search-form" role="search">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input type="text" value="" class="form-control" placeholder="Search...">
                            </div>
                        </form>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="charts.html">
                                    <i class="fa fa-line-chart"></i>
                                    <p>Stats</p>
                                </a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-gavel"></i>
                                    <p class="hidden-md hidden-lg">
                                        Actions
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Create New Post</a></li>
                                    <li><a href="#">Manage Something</a></li>
                                    <li><a href="#">Do Nothing</a></li>
                                    <li><a href="#">Submit to live</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Another Action</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="notification">5</span>
                                    <p class="hidden-md hidden-lg">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Notification 1</a></li>
                                    <li><a href="#">Notification 2</a></li>
                                    <li><a href="#">Notification 3</a></li>
                                    <li><a href="#">Notification 4</a></li>
                                    <li><a href="#">Another notification</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-with-icons">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-list"></i>
                                    <p class="hidden-md hidden-lg">
                                        More
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu dropdown-with-icons">
                                    <li>
                                        <a href="#">
                                            <i class="pe-7s-mail"></i> Messages
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="pe-7s-help1"></i> Help Center
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="pe-7s-tools"></i> Settings
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="pe-7s-lock"></i> Lock Screen
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-danger">
                                            <i class="pe-7s-close-circle"></i>
                                            Log out
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <div class="main-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>


            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>2022 <a href="http://www.creative-tim.com">Creative Tim</a>, made with
                        love for a
                        better web
                    </p>
                </div>
            </footer>

            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
                <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;">
                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body><!--   Core JS Files  -->

</html>
