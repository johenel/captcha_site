<html>
<head>
    <title>@yield('title')</title>
    @include('includes.templates.head-admin-ela')
</head>
<body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                @if(session()->get('user')->account_type == 2)
                    <ul class="nav navbar-nav">
                        <li class="">
                            <a href="/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                        </li>
                        <li class="menu-title">Admin Menu</li><!-- /.menu-title -->
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>USERS</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-user"></i><a href="/users">ALL</a></li>
                                <li><i class="fa fa-id-badge"></i><a href="/users?status=pending">PENDING</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-money"></i>PAYMENT REQUESTS</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-user"></i><a href="/users">PENDING</a></li>
                                <li><i class="fa fa-id-badge"></i><a href="/users?status=pending">PROCESSED</a></li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <ul class="nav navbar-nav user-side-bar" style="padding-top:20px;">
                        <li>
                            <a href="/"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                        </li>
                        <li class="">
                            <a href="/typing-captcha"><i class="menu-icon fa fa-keyboard-o"></i>TYPING CAPTCHA </a>
                        </li>
                        <li class="">
                            <a href="/referrals"><i class="menu-icon fa fa-group"></i>REFERRAL LIST</a>
                        </li>
                        <li class="">
                            <a href="/encashment"><i class="menu-icon fa fa-money"></i>ENCASHMENT</a>
                        </li>
                        <li class="">
                            <a href="/history"><i class="menu-icon fa fa-calendar"></i>HISTORY</a>
                        </li>
                        {{--<li class="">--}}
                            {{--<a href="/code-list"><i class="menu-icon fa fa-laptop"></i>CODELIST</a>--}}
                        {{--</li>--}}
                    </ul>
                @endif
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./">CAPTCHASITE</a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">


                    </div>
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="/logout"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
               @yield('content')
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
    </div>


</body>
</html>
