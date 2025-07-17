<!doctype html>
<html lang="en" dir="ltr">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="ecommerce">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/brand/favicon.ico') }}">

    <!-- TITLE -->
    <title>ecommerce</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="{{ asset('/css/plugins.cs') }}s" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('/css/icons.css') }}" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="{{ asset('/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('/switcher/demo.cs') }}s" rel="stylesheet">

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    @yield('css')

</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                            href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="index.html">
                            {{-- <img src="{{ asset('/images/brand/logo-white.png') }}" class="header-brand-img desktop-logo"
                                alt="logo"> --}}
                            {{-- <img src="{{ asset('/images/brand/logo-dark.png') }}" class="header-brand-img light-logo1"
                                alt="logo"> --}}
                        </a>
                        <!-- LOGO -->
                        <div class="main-header-center ms-3 d-none d-lg-block">
                            <input type="text" class="form-control" id="typehead"
                                placeholder="Search for results...">
                            <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
                        </div>
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <!-- SEARCH -->
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">
                                        <div class="dropdown d-lg-none d-flex">
                                            <a href="javascript:void(0)" class="nav-link icon"
                                                data-bs-toggle="dropdown">
                                                <i class="fe fe-search"></i>
                                            </a>
                                            <div class="dropdown-menu header-search dropdown-menu-start">
                                                <div class="input-group w-100 p-2">
                                                    <input type="text" class="form-control" placeholder="Search....">
                                                    <div class="input-group-text btn btn-primary">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex">
                                            <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                                <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                                <span class="light-layout"><i class="fe fe-sun"></i></span>
                                            </a>
                                        </div>

                                        <div class="dropdown d-flex">
                                            <a class="nav-link icon full-screen-link nav-link-bg">
                                                <i class="fe fe-minimize fullscreen-button"></i>
                                            </a>
                                        </div>

                                        <div class="dropdown d-flex profile-1">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                                class="nav-link leading-none d-flex">
                                                <img src="{{ asset('/images/users/21.jpg') }}" alt="profile-user"
                                                    class="avatar  profile-user brround cover-image">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading">
                                                    <div class="text-center">
                                                        {{-- <h5 class="text-dark mb-0 fs-14 fw-semibold">{{ ucfirst(auth()->user()->firstname) . ' ' . ucfirst(auth()->user()->lastname) }}</h5>
                                                        <small class="text-muted">{{ auth()->user()->account_type }}</small> --}}
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider m-0"></div>
                                                <a class="dropdown-item" href="#">
                                                    <i class="dropdown-icon fe fe-user"></i> Profile
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                                </form>

                                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="index.html">
                            <img src="{{ asset('/images/brand/logo-dark.png') }}"
                                class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{ asset('/images/brand/logo-dark.png') }}"
                                class="header-brand-img toggle-logo" alt="logo">
                            <img src="{{ asset('/images/brand/logo-dark.png') }}" class="header-brand-img light-logo"
                                alt="logo">
                            <img src="{{ asset('/images/brand/logo-dark.png') }}"
                                class="header-brand-img light-logo1" alt="logo">
                        </a>
                        <!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg></div>
                        <ul class="side-menu">
                            <li class="sub-category">
                                <h3>Main</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('dashboard.view') }}"><i
                                        class="side-menu__icon fe fe-home"></i><span
                                        class="side-menu__label">Dashboard</span></a>
                            </li>

                             <li>
                                <a class="side-menu__item has-link" href="{{ route('products.index') }}">
                                    <i class="side-menu__icon fe fe-zap"></i>
                                    <span class="side-menu__label">Products</span>
                                </a>
                            </li>
                            
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-users"></i><span
                                        class="side-menu__label">Users</span><i class="angle fe fe-chevron-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li class="panel sidetab-menu">
                                        <div class="panel-body tabs-menu-body p-0 border-0">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="side1">
                                                    <ul class="sidemenu-list">
                                                        <li class="side-menu-label1"><a
                                                                href="javascript:void(0)">Apps</a></li>
                                                        @if(auth()->user()->hasPermissionTo('add-user'))
                                                        <li><a href="{{ route('users.create') }}"
                                                                class="slide-item">Add</a>
                                                        </li>
                                                        @endif
                                                        @if(auth()->user()->hasPermissionTo('list-user'))
                                                        <li><a href="{{ route('users.index') }}"
                                                                class="slide-item">List</a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                    </li>
                                </ul>
                            </li>

                            <li class="sub-category">
                                <h3>Setting</h3>
                            </li>
                            <li>
                                @if(auth()->user()->hasPermissionTo('list-role'))
                                <a class="side-menu__item has-link" href="{{ route('roles.index') }}">
                                    <i class="side-menu__icon fe fe-zap"></i>
                                    <span class="side-menu__label">Roles</span>
                                </a>
                                @endif
                            </li>
                    </div>
                </div>
            </div>
            <!--/APP-SIDEBAR-->

            <!-- FOOTER -->
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 text-center">
                            Copyright © <span id="year"></span> <a href="javascript:void(0)"></a>,
                            <a href="javascript:void(0)"> All rights reserved.
                        </div>
                    </div>
                </div>
            </footer>
            <!-- FOOTER END -->

            <!-- BACK-TO-TOP -->
            <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <!-- Bootstrap JS -->
            {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}
            <!-- DataTables JS -->
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

            <script src="{{ asset('/js/jquery.min.js') }}"></script>
            <script src="{{ asset('/plugins/bootstrap/js/popper.min.js') }}"></script>
            <script src="{{ asset('/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

            <!-- SPARKLINE JS-->
            <script src="{{ asset('/js/jquery.sparkline.min.js') }}"></script>

            <!-- Sticky js -->
            <script src="{{ asset('/js/sticky.js') }}"></script>

            <!-- CHART-CIRCLE JS-->
            <script src="{{ asset('/js/circle-progress.min.js') }}"></script>

            <!-- PIETY CHART JS-->
            <script src="{{ asset('/plugins/peitychart/jquery.peity.min.js') }}"></script>
            <script src="{{ asset('/plugins/peitychart/peitychart.init.js') }}"></script>

            <!-- SIDEBAR JS -->
            <script src="{{ asset('/plugins/sidebar/sidebar.js') }}"></script>

            <!-- Perfect SCROLLBAR JS-->
            <script src="{{ asset('/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
            <script src="{{ asset('/plugins/p-scroll/pscroll.js') }}"></script>
            <script src="{{ asset('/plugins/p-scroll/pscroll-1.js') }}"></script>

            <!-- INTERNAL CHARTJS CHART JS-->
            <script src="{{ asset('/plugins/chart/Chart.bundle.js') }}"></script>
            <script src="{{ asset('/plugins/chart/utils.js') }}"></script>

            <!-- INTERNAL SELECT2 JS -->
            <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>

            <!-- INTERNAL Data tables js-->
            <script src="{{ asset('/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
            <script src="{{ asset('/plugins/datatable/dataTables.responsive.min.js') }}"></script>

            <!-- INTERNAL APEXCHART JS -->
            <script src="{{ asset('/js/apexcharts.js') }}"></script>
            <script src="{{ asset('/plugins/apexchart/irregular-data-series.js') }}"></script>

            <!-- INTERNAL Flot JS -->
            <script src="{{ asset('/plugins/flot/jquery.flot.js') }}"></script>
            <script src="{{ asset('/plugins/flot/jquery.flot.fillbetween.js') }}"></script>
            <script src="{{ asset('/plugins/flot/chart.flot.sampledata.js') }}"></script>
            <script src="{{ asset('/plugins/flot/dashboard.sampledata.js') }}"></script>

            <!-- INTERNAL Vector js -->
            <script src="{{ asset('/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
            <script src="{{ asset('/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

            <!-- SIDE-MENU JS-->
            <script src="{{ asset('/plugins/sidemenu/sidemenu.js') }}"></script>

            <!-- TypeHead js -->
            <script src="{{ asset('/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
            <script src="{{ asset('/js/typehead.js') }}"></script>

            <!-- INTERNAL INDEX JS -->
            <script src="{{ asset('/js/index1.js') }}"></script>

            <!-- Color Theme js -->
            <script src="{{ asset('/js/themeColors.j') }}s"></script>

            <!-- CUSTOM JS -->
            <script src="{{ asset('/js/custom.js') }}"></script>

            <!-- Custom-switcher -->
            <script src="{{ asset('/js/custom-swicher.js') }}"></script>

            <!-- Switcher js -->
            <script src="{{ asset('/switcher/js/switcher.js') }}"></script>

            <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
            @yield('js')

</body>

</html>
