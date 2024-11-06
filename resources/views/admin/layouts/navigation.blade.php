<!-- Navigation -->
<nav class="navbar navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <i class="material-icons">apps</i>
        </button>
        <a class="navbar-brand" href="index.html">
            <img class="main-logo" src="assets/dist/img/light-logo.png" id="bg" alt="logo">
            <!--<span>AdminPage</span>-->
        </a>
    </div>
    <div class="nav-container">
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="material-icons">add_alert</i>
                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    <!--<i class="ti-announcement"></i>-->
                    <!--<i class="ti-angle-down"></i>-->
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <!--<li class="ui_popover_tooltip"></li>-->
                    <li class="rad-dropmenu-header"><a href="#">Your Notifications</a></li>
                    <li>
                        <a class="rad-content" href="#">
                            <div class="pull-left"><i class="fa fa-html5 fa-2x color-red"></i>
                            </div>
                            <div class="rad-notification-body">
                                <div class="lg-text">Introduction to fetch()</div>
                                <div class="sm-text">The fetch API</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="rad-content" href="#">
                            <div class="pull-left"><i class="fa fa-bitbucket fa-2x color-violet"></i>
                            </div>
                            <div class="rad-notification-body">
                                <div class="lg-text">Check your BitBucket</div>
                                <div class="sm-text">Last Chance</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="rad-content" href="#">
                            <div class="pull-left"><i class="fa fa-google fa-2x color-info"></i>
                            </div>
                            <div class="rad-notification-body">
                                <div class="lg-text">Google Account</div>
                                <div class="sm-text">example@gmail.com</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="rad-content" href="#">
                            <div class="pull-left"><i class="fa fa-amazon fa-2x color-green"></i>
                            </div>
                            <div class="rad-notification-body">
                                <div class="lg-text">Amazon Simple Notification ...</div>
                                <div class="sm-text">Lorem Ipsum is simply dummy text...</div>
                            </div>
                        </a>
                    </li>
                    <li class="rad-dropmenu-footer"><a href="#">See all notifications</a></li>
                </ul>  <!-- /.dropdown-alerts -->
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.Dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="material-icons">person_add</i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="profile.html"><i class="ti-user"></i>&nbsp; Profile</a></li>
                    <li><a href="mailbox.html"><i class="ti-email"></i>&nbsp; My Messages</a></li>
                    <li><a href="lockscreen.html"><i class="ti-lock"></i>&nbsp; Lock Screen</a></li>
                    <li><a href="#"><i class="ti-settings"></i>&nbsp; Settings</a></li>
                    <li><a href="login.html"><i class="ti-layout-sidebar-left"></i>&nbsp; Logout</a></li>
                </ul><!-- /.dropdown-user -->
            </li><!-- /.Dropdown -->
        </ul> <!-- /.navbar-top-links -->
    </div>
</nav>
<div class="sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-heading "> <span>Main Navigation&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
            <li class="active"><a href="{{ url('admin/dashboard') }}" class="material-ripple"><i class="material-icons">home</i> Dashboard</a></li>
            <li class=""><a href="{{ url('admin/car-category/list') }}" class="material-ripple"><i class="material-icons">assignment_ind</i>Category List</a></li>
            <li class=""><a href="{{ url('admin/car-rental/list') }}" class="material-ripple"><i class="material-icons">directions_car</i>Car List</a></li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
