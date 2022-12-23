<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Dashboard | Electronics, Cars, Property and Jobs in Bangladesh </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="base_url" content="{{ url('/') }}" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
        <!-- dropify -->
        <link href="{{ asset('assets/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
      

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.1/css/fixedHeader.bootstrap5.min.css">
        
        <!-- icons -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

        
        <!-- Vendor -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <!-- file upload -->
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
        
        
       
        <script src="{{ asset('assets/js/jquery.multifield.min.js') }}"></script>


    </head>

    <!-- body start -->
    <body class="loading" data-layout-color="light"  data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>
 
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-end mb-0">

            

                <li class="dropdown d-inline-block d-lg-none">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-search noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                        <form class="p-3">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                        </form>
                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <!-- <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-bell noti-icon"></i>
                        <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                    </a> -->
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-end">
                                    <a href="" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>

                        <div class="noti-scroll" data-simplebar>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon">
                                    <img src="{{ asset('assets/images/users/user-1.jpg') }}" class="img-fluid rounded-circle" alt="" />
                                </div>
                                <p class="notify-details">Cristina Pride</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Hi, How are you? What about our next meeting</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">1 min ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <img src="{{ asset('assets/images/users/user-4.jpg') }}" class="img-fluid rounded-circle" alt="" />
                                </div>
                                <p class="notify-details">Karen Robinson</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Wow ! this admin looks good and awesome design</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning">
                                    <i class="mdi mdi-account-plus"></i>
                                </div>
                                <p class="notify-details">New user registered.
                                    <small class="text-muted">5 hours ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">4 days ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-secondary">
                                    <i class="mdi mdi-heart"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked
                                    <b>Admin</b>
                                    <small class="text-muted">13 days ago</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fe-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ms-1">
                        {{$user_data->name}} <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="{{route('backend.my_account')}}" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>
                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fe-log-out mdi-24px"></i>
                            <span>Logout 
                            </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                        </a>

                    </div>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{route('backend.dashboard')}}" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="42">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="42">
                    </span>
                </a>
                <a href="{{route('backend.dashboard')}}" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="42">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="42">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <h4 class="page-title-main">@yield('page')</h4>
                </li>
    
            </ul>

            <div class="clearfix"></div>

        </div>
        <!-- end Topbar -->