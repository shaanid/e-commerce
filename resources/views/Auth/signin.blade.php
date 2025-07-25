<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/brand/favicon.ico') }}">

    <!-- TITLE -->
    <title>ecommerce</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="{{ asset('/css/plugins.css') }}" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('/css/icons.css') }}" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="{{ asset('/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('/switcher/demo.css') }}" rel="stylesheet">

</head>

<body class="app sidebar-mini ltr login-img">

    <!-- BACKGROUND-IMAGE -->
    <div class="">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{ asset('/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">
                <!-- Theme-Layout -->

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        {{-- <a href="index.html"><img src="{{ asset('/images/brand/logo-white.png') }}" class="header-brand-img" alt=""></a> --}}
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form action="{{ route('signIn') }}" method="post" class="login100-form validate-form">
                            @csrf
                            <span class="login100-form-title pb-5">
                                Signin
                            </span>
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">

                                </div>
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
                                            <div class="wrap-input100 validate-input input-group"
                                                data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)"
                                                    class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" type="email"
                                                    name="email" placeholder="email">
                                                   
                                            </div>
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)"
                                                    class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" type="password"
                                                    name="password" placeholder="Password">
                                                   
                                            </div>
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            {{-- <div class="text-end pt-4">
                                                <p class="mb-0"><a href="forgot-password.html" class="text-primary ms-1">Forgot Password?</a></p>
                                            </div> --}}
                                            <div class="container-login100-form-btn">
                                                <button type="submit" class="login100-form-btn btn-primary">
                                                    Login
                                                </button>
                                            </div>
                                            <div class="text-center pt-3">
                                                <p class="text-dark mb-0">Not a member?<a href="register.html"
                                                        class="text-primary ms-1">Sign UP</a></p>
                                            </div>
                                            <label class="login-social-icon"><span>Login with Social</span></label>
                                            <div class="d-flex justify-content-center">
                                                <a href="javascript:void(0)">
                                                    <div class="social-login me-4 text-center">
                                                        <i class="fa fa-google"></i>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <div class="social-login me-4 text-center">
                                                        <i class="fa fa-facebook"></i>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <div class="social-login text-center">
                                                        <i class="fa fa-twitter"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('/js/show-password.min.js') }}"></script>

    <!-- GENERATE OTP JS -->
    <script src="{{ asset('/js/generate-otp.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('/js/custom.js') }}"></script>

    <!-- Custom-switcher -->
    <script src="{{ asset('/js/custom-swicher.js') }}"></script>

    <!-- Switcher js -->
    <script src="{{ asset('/switcher/js/switcher.js') }}"></script>

</body>

<script>
    $(document).ready(function() {
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    });
</script>

</html>
