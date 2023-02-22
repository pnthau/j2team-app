<div class="sidebar" data-color="orange" data-image="{{ asset('img/full-screen-image-3.jpg') }}">
    <!--s
 Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
 Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            Ct
        </a>

        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y"
        data-ps-id="1a02c5fc-f385-70cd-6e54-3ccc73b83566">
        <div class="user">
            <div class="info">
                <div class="photo">
                    <img src="{{ session()->get('user')['avatar'] }}">
                </div>
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        {{ session()->get('user')['name'] }}
                        <p>
                            <small>({{ session()->get('user')['level'] ? 'Super Admin' : 'Admin' }})</small>
                        </p>
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#pablo">
                                <span class="sidebar-mini">MP</span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>

                        <li>
                            <a href="#pablo">
                                <span class="sidebar-mini">EP</span>
                                <span class="sidebar-normal">Edit Profile</span>
                            </a>
                        </li>

                        <li>
                            <a href="#pablo">
                                <span class="sidebar-mini">S</span>
                                <span class="sidebar-normal">Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}">
                                <span class="sidebar-mini">O</span>
                                <span class="sidebar-normal">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <ul class="nav">
            <li class="active">
                <a href="dashboard.html">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#componentsExamples">
                    <i class="pe-7s-plugin"></i>
                    <p>Components
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="componentsExamples">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('course.index') }}">
                                <span class="sidebar-mini">C</span>
                                <span class="sidebar-normal">Courses</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('students.index') }}">
                                <span class="sidebar-mini">S</span>
                                <span class="sidebar-normal">Students</span>
                            </a>
                        </li>
                        <li>
                            <a href="components/panels.html">
                                <span class="sidebar-mini">P</span>
                                <span class="sidebar-normal">Panels</span>
                            </a>
                        </li>
                        <li>
                            <a href="components/sweet-alert.html">
                                <span class="sidebar-mini">SA</span>
                                <span class="sidebar-normal">Sweet Alert</span>
                            </a>
                        </li>
                        <li>
                            <a href="components/notifications.html">
                                <span class="sidebar-mini">N</span>
                                <span class="sidebar-normal">Notifications</span>
                            </a>
                        </li>
                        <li>
                            <a href="components/icons.html">
                                <span class="sidebar-mini">I</span>
                                <span class="sidebar-normal">Icons</span>
                            </a>
                        </li>
                        <li>
                            <a href="components/typography.html">
                                <span class="sidebar-mini">T</span>
                                <span class="sidebar-normal">Typography</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#formsExamples">
                    <i class="pe-7s-note2"></i>
                    <p>Forms
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="formsExamples">
                    <ul class="nav">
                        <li>
                            <a href="forms/regular.html">
                                <span class="sidebar-mini">Rf</span>
                                <span class="sidebar-normal">Regular Forms</span>
                            </a>
                        </li>
                        <li>
                            <a href="forms/extended.html">
                                <span class="sidebar-mini">Ef</span>
                                <span class="sidebar-normal">Extended Forms</span>
                            </a>
                        </li>
                        <li>
                            <a href="forms/validation.html">
                                <span class="sidebar-mini">Vf</span>
                                <span class="sidebar-normal">Validation Forms</span>
                            </a>
                        </li>
                        <li>
                            <a href="forms/wizard.html">
                                <span class="sidebar-mini">W</span>
                                <span class="sidebar-normal">Wizard</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#tablesExamples">
                    <i class="pe-7s-news-paper"></i>
                    <p>Tables
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="tablesExamples">
                    <ul class="nav">
                        <li>
                            <a href="tables/regular.html">
                                <span class="sidebar-mini">RT</span>
                                <span class="sidebar-normal">Regular Tables</span>
                            </a>
                        </li>
                        <li>
                            <a href="tables/extended.html">
                                <span class="sidebar-mini">ET</span>
                                <span class="sidebar-normal">Extended Tables</span>
                            </a>
                        </li>
                        <li>
                            <a href="tables/bootstrap-table.html">
                                <span class="sidebar-mini">BT</span>
                                <span class="sidebar-normal">Bootstrap Table</span>
                            </a>
                        </li>
                        <li>
                            <a href="tables/datatables.net.html">
                                <span class="sidebar-mini">DT</span>
                                <span class="sidebar-normal">DataTables.net</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#mapsExamples">
                    <i class="pe-7s-map-marker"></i>
                    <p>Maps
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="mapsExamples">
                    <ul class="nav">
                        <li>
                            <a href="maps/google.html">
                                <span class="sidebar-mini">GM</span>
                                <span class="sidebar-normal">Google Maps</span>
                            </a>
                        </li>
                        <li>
                            <a href="maps/vector.html">
                                <span class="sidebar-mini">VM</span>
                                <span class="sidebar-normal">Vector maps</span>
                            </a>
                        </li>
                        <li>
                            <a href="maps/fullscreen.html">
                                <span class="sidebar-mini">FSM</span>
                                <span class="sidebar-normal">Full Screen Map</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="charts.html">
                    <i class="pe-7s-graph1"></i>
                    <p>Charts</p>
                </a>
            </li>

            <li>
                <a href="calendar.html">
                    <i class="pe-7s-date"></i>
                    <p>Calendar</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#pagesExamples">
                    <i class="pe-7s-gift"></i>
                    <p>Pages
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="pagesExamples">
                    <ul class="nav">
                        <li>
                            <a href="pages/user.html">
                                <span class="sidebar-mini">UP</span>
                                <span class="sidebar-normal">User Page</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/login.html">
                                <span class="sidebar-mini">LP</span>
                                <span class="sidebar-normal">Login Page</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/register.html">
                                <span class="sidebar-mini">RP</span>
                                <span class="sidebar-normal">Register Page</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/lock.html">
                                <span class="sidebar-mini">LSP</span>
                                <span class="sidebar-normal">Lock Screen Page</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps-scrollbar-y-rail" style="top: 0px; height: 198px; right: 3px;">
            <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 69px;"></div>
        </div>
    </div>
    <div class="sidebar-background" style="background-image: url({{ asset('img/full-screen-image-3.jpg') }}) ">
    </div>
</div>
