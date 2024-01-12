<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </link>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/js/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('guest/assets/bootstrap/css/bootstrap.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('admin/images/logo.png')}}" />
    <style>
    .mdi-file-import {
        font-size: 20px;
    }
    </style>

    @yield('custom-css')

</head>

<body>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="flex-row p-0 navbar default-layout col-lg-12 fixed-top d-flex align-items-top">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <!-- {{asset('')}} -->
                    <a class="navbar-brand brand-logo" href="">
                        <img src="{{asset('admin/images/logo2.png')}}" alt="logo" width="100" height="100" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="">
                        <img src="{{asset('admin/images/logo2.png')}}" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Selamat Datang, <span class="text-black fw-bold"
                                style="text-transform: capitalize;">{{auth()->user()->name}}</span></h1>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="{{asset('admin/images/logo.png')}}"
                                alt="Profile image" width="120px" height="120px" type="file" name="foto_new"
                                class="form-control" accept="image/jpg, image/jpeg, image/png">

                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                aria-labelledby="UserDropdown">
                                <div class="text-center dropdown-header">
                                    <img class="img-xs rounded-circle" src="{{asset('admin/images/logo.png')}}"
                                        alt="Profile image" width="120px" height="120px" type="file" name="foto_new"
                                        class="form-control" accept="image/jpg, image/jpeg, image/png">
                                    <p class="mt-3 mb-1 font-weight-semibold" style="color:white;">{{auth()->user()->name}}</p>
                                </div>
                                <a class="dropdown-item" href="/">
                                    <i class="dropdown-item-icon mdi mdi-home me-2"></i>Home
                                </a>
                                <a class="dropdown-item" href="{{route('logout')}}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="dropdown-item-icon mdi mdi-logout me-2"></i>Keluar
                                </a>
                                <form id="logout-form" action="{{route('logout')}}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="border img-ss rounded-circle bg-light me-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="border img-ss rounded-circle bg-dark me-3"></div>Dark
                    </div>
                    <p class="mt-2 settings-heading">HEADER SKINS</p>
                    <div class="px-4 mx-0 color-tiles">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/dashboard')}}">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#kriteria" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-view-list"></i>
                            <span class="menu-title">Kriteria</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="kriteria">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/bobot')}}">Bobot</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/pengalaman')}}">Pengalaman</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/keahlian')}}">Keahlian</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/pendidikan')}}">Pendidikan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/posisi-jabatan')}}">Posisi Jabatan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/usia')}}">Usia</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/pegawai')}}">
                            <i class="mdi mdi-account menu-icon"></i>
                            <span class="menu-title">Pegawai</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#hasil-perhitungan" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-calculator"></i>
                            <span class="menu-title">Hasil Perhitungan</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="hasil-perhitungan">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/data-alternatif')}}">Data Alternatif</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/data-ranking')}}">Data Ranking</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">
                @yield('content')
            </div>
            <!-- partial -->
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!-- plugins:js -->
    <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('admin/vendors/progressbar.js/progressbar.min.js')}}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/js/template.js')}}"></script>
    <script src="{{asset('admin/js/settings.js')}}"></script>
    <script src="{{asset('admin/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('admin/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/js/dashboard.js')}}"></script>
    <script src="{{asset('admin/js/Chart.roundedBarCharts.js')}}"></script>
    <!-- End custom js for this page-->

    @yield('script')
</body>

</html>