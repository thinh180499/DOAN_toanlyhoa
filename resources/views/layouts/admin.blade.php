<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Tool toán lý hóa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin1\assets\images\favicon.ico') }}">
    <!-- App css -->
    <link href="{{ asset('admin1\assets\css\bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet">
    <link href="{{ asset('admin1\assets\css\icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin1\assets\css\app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet">
    @yield('css')
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">

            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">

                        <span class="pro-user-name ml-1">
                            {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown" style="">


                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>


            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="<?php echo route('home'); ?>" class="logo text-center logo-dark">
                    <h3 class="my-3">Admin</h3>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>

                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm kiếm...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <!-- end Topbar -->
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">


            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Chức năng</li>

                    {{-- Chức năng --}}
                    <li>
                        <a href="javascript: void(0);">
                            <i class="ti-light-bulb"></i>
                            <span> Chức năng </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="<?php echo route('admin.khainiem.index'); ?>">Khái niệm</a>
                            </li>
                            <li>
                                <a href="<?php echo route('admin.hangso.index'); ?>">Hằng số</a>
                            </li>
                            <li>
                                <a href="<?php echo route('admin.bieuthuc.index'); ?>">Biểu thức</a>
                            </li>
                            <li>
                                <a href="<?php echo route('admin.congthuc.index'); ?>">Công thức</a>
                            </li>
                            <li>
                                <a href="<?php echo route('admin.donvi.index'); ?>">Đơn vị</a>
                            </li>
                            <li>
                                <a href="<?php echo route('admin.loaipheptoan.index'); ?>">Loại phép toán</a>
                            </li>
                            <li>
                                <a href="<?php echo route('admin.loaidonvi.index'); ?>">Loại đơn vị</a>
                            </li>
                            <li>
                                <a href="<?php echo route('admin.mon.index'); ?>">Môn</a>
                            </li>
                            <li>
                                <a href="<?php echo route('admin.chuyendonvi.index'); ?>">chuyển đổi đơn vị</a>
                            </li>
                        </ul>
                    </li>

                    {{-- <li>
                        <a href="javascript: void(0);">
                            <i class=" mdi mdi-math-integral"></i>
                            <span> Toán </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo route('toan.luythuamunguyenduong'); ?>">lũy thừa với mũ nguyên dương n</a></li>
                        </ul>
                    </li> --}}

                    {{-- <li>
                        <a href="javascript: void(0);">
                            <i class=" mdi mdi-flask-outline"></i>
                            <span> Hóa học </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo route('hoa.moltheokhoiluong'); ?>">tính số mol theo khối lượng</a></li>
                        </ul>
                    </li> --}}

                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>


        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start container-fluid -->

                <!-- main start   -->
                {{-- <div class="row"> --}}
                {{-- <div class="col-12"> --}}
                @yield('content')
                {{-- </div> --}}
                {{-- </div> --}}
                <!-- main end -->

            </div>
            <!-- end container-fluid -->



            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2023 - Tool toán lý hóa
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
        <!-- end content -->

    </div>
    <!-- END content-page -->

    </div>
    <!-- END wrapper -->


    <!-- Vendor js -->
    <script src="{{ asset('admin1\assets\js\vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin1\assets\js\app.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    @yield('script')

</body>

</html>
