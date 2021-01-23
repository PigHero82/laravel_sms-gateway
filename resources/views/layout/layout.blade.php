
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    {{-- Meta --}}
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Sistem SMS Gateway">
    <meta name="keywords" content="sms, sms gateway">
    <meta name="author" content="PT. ARCOM Bali">

    {{-- Title --}}
    <title>@yield('title') | SMS Gateway</title>

    {{-- Icon --}}
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/ui/prism.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.min.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    @yield('css')
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        {{-- FullScreen --}}
                        <li class="nav-item d-none d-lg-block" data-toggle="tooltip" data-placement="bottom" title="Fullscreen"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        {{-- Kirim Email --}}
                        <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Kirim Email"><a class="nav-link" href="#modalKirimEmail" data-toggle="modal"><i class="ficon feather icon-mail"></i></a></li>
                        {{-- Signal --}}
                        <li class="dropdown dropdown-notification nav-item" data-toggle="tooltip" data-placement="bottom" title="Signal"><a class="nav-link"><i class="ficon feather icon-bar-chart"></i><span class="badge badge-pill badge-primary badge-up">0</span></a></li>
                        {{-- Notifikasi --}}
                        <li class="dropdown dropdown-notification nav-item" data-toggle="tooltip" data-placement="bottom" title="Pemberitahuan"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">0</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <span class="text-white">Notifikasi SMS</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list">
                                    <a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-inbox font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">SMS Masuk</h6><small class="notification-text">Kosong</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Lihat Semua SMS</a></li>
                            </ul>
                        </li>

                        {{-- User --}}
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name text-bold-600">Admin</span>
                                    <span class="user-status">admin@mail.com</span>
                                </div>
                                <span><img class="round" src="{{ asset('app-assets/images/portrait/small/avatar-s-11.jpg') }}" alt="avatar" height="40" width="40"></span>
                            </a>
                            {{-- Menu User --}}
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#modalInfo" data-toggle="modal"><i class="feather icon-alert-octagon"></i> Info</a>
                                <a class="dropdown-item" href="#modalProfil" data-toggle="modal"><i class="feather icon-user"></i> Profil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="feather icon-power"></i> Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        {{-- Logo --}}
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">SMS</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>

        <div class="shadow-bottom"></div>

        {{-- Menu --}}
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                @include('layout.menu')
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            {{-- Title --}}
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">@yield('title')</h2>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Content --}}
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    
    {{-- Modal Kirim Email --}}
    <div class="modal fade text-left" id="modalKirimEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Kirim Email</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email Tujuan</label>
                                    <input type="email" class="form-control" name="fname" placeholder="Pilih Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email Pengirim</label>
                                    <input type="email" class="form-control" name="email-id" placeholder="Email Pengirim">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" name="contact" placeholder="Judul">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password-vertical">Isi Pesan</label>
                                    <textarea class="form-control" name="" cols="30" rows="5" placeholder="Isi Pesan"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kirim</button>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Modal Info --}}
    <div class="modal fade text-left" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Ubah Info</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nama App</label>
                                    <input type="text" class="form-control" name="fname" placeholder="Nama App" value="SMS Gateway">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Pembuat</label>
                                    <input type="text" class="form-control" name="email-id" placeholder="Pembuat" value="PT. ARCOM">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="contact" placeholder="Email" value="email@mail.com">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>No. HP</label>
                                    <input type="number" class="form-control" name="contact" placeholder="No. HP" value="081234567890">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ubah</button>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Modal Profil --}}
    <div class="modal fade text-left" id="modalProfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Ubah Profil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="fname" placeholder="Username" value="Admin">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="email-id" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="contact" placeholder="Email" value="email@mail.com">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="contact" placeholder="Nama Lengkap" value="PT. ARCOM">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ubah</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/ui/prism.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.min.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    @yield('js')
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>