<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LAUNDRY PRO</title>   
        <!-- Bootstrap -->
        <link href="{{ asset('assets') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link href="{{ asset('assets') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{ asset('assets') }}/vendors/nprogress/nprogress.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{ asset('assets') }}/build/css/custom.min.css" rel="stylesheet">
        <link href="{{ asset('assets') }}/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>Maulana</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                <div class="profile_pic">
                    <img  alt="" >
                </div>
                <div class="profile_info">
                    <span>Welcome</span>
                    <h2>MALIK</h2>
                </div>
                <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                @if(auth()->user()->role == 'admin')
                    @include('side-content.sidebar-admin')
                @elseif(auth()->user()->role == 'kasir')
                    @include('side-content.sidebar-kasir')
                @elseif(auth()->user()->role == 'owner')
                    @include('side-content.sidebar-owner')

                @endif

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                    <li class="nav-item dropdown open" style="padding-left: 15px;">
                        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="images/img.jpg" alt="">John Doe
                        </a>
                        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"  href="javascript:;"> Profile</a>
                            <a class="dropdown-item"  href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                            </a>
                        <a class="dropdown-item"  href="javascript:;">Help</a>
                        {{-- <a class="dropdown-item"  href="login.html"> --}}
                            {{-- Log Out</a> --}}
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="border-0">
                                        <i class="fa fa-sign-out pull-right">Log Out</i>
                                    </button>
                                </form>
                        </div>
                    </li>
    
                    <li role="presentation" class="nav-item dropdown open">
                        <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                        </a>
                        <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        <li class="nav-item">
                            <a class="dropdown-item">
                            <span class="image"><img src="" alt="Profile Image" /></span>
                            <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were where{{ asset('assets') }}.
                            </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were where{{ asset('assets') }}.
                            </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were where{{ asset('assets') }}.
                            </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were where{{ asset('assets') }}.
                            </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="text-center">
                            <a class="dropdown-item">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                            </div>
                        </li>
                        </ul>
                    </li>
                    </ul>
                </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                <div class="title_left">
                    <h3>DATAS</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Link GG {{ asset('assets') }}.">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                    </div>
                </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                    <div class="x_title">
                        <h2>THE DATA OF E-LAUNDRY</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        
                        <!-- Content Dari Index -->
                        @yield('content')
                        
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
            <div class="pull-right">
                Template gantelella GG Gaming <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
        </div>

        <!-- jQuery -->
        <script src="{{ asset('assets') }}/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
    <script src="{{ asset('assets') }}/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
        <!-- FastClick -->
        <script src="{{ asset('assets') }}/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="{{ asset('assets') }}/vendors/nprogress/nprogress.js"></script>
        
        <!-- Custom Theme Scripts -->
        <script src="{{ asset('assets') }}/build/js/custom.min.js"></script>

        <script src="{{ asset('assets') }}/js/sweetalert.min.js"></script>

        <script src="{{ asset('assets') }}/vendors/datatables.net/js/jquery.dataTables.js"></script>
        <script src="{{ asset('assets') }}/vendors/switchery/dist/switchery.min.js"></script>
        <script>
            $('.delete').click(function(e){
                e.preventDefault()
                let data = $(this).closest('form').find('buttom').text()
                swal({
                    title: "Apakah Kamu Yakin?", 
                    text: "Data ini Ingin Dihapus?",
                    icon: "warning",
                    buttons:true,
                    dangerMode: true,
                })
                .then((req) => {
                    if(req) $(e.target).closest('form').submit()
                    else swal.close()
                })
            })
        </script>

        @stack('script')

    </body>
    </html>
