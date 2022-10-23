<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ getURL() }}">
    <meta name="file-base-url" content="{{ getFileBaseURL() }}">

    {{-- <meta name="description" content="{{ getMetaDescription() }}" /> --}}

    <meta property="og:url" content="{{ getURL() }}" />
    <title>Login | Code Cloud CMS</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{ asset('uploads/images/' . getSettings('favicon')) }}" />
    <!-- Custom CSS -->
    <link href="assets_backend/dist/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <svg class="tea lds-ripple" width="37" height="48" viewbox="0 0 37 48" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z"
                    stroke="#233242" stroke-width="2"></path>
                <path
                    d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34"
                    stroke="#233242" stroke-width="2"></path>
                <path id="teabag" fill="#233242" fill-rule="evenodd" clip-rule="evenodd"
                    d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z">
                </path>
                <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" stroke="#233242"></path>
                <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="#233242"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="
              auth-wrapper
              d-flex
              no-block
              justify-content-center
              align-items-center
            "
            style="
              background: url(assets_backend/images/login_bg.jpg)
                no-repeat center center;
              background-size: cover;
            ">
            <div class="auth-box p-4 bg-white rounded"
                style="border-radius: 25px !important; backdrop-filter: blur(6px); background: linear-gradient(45deg, #b0d5ff, #ffffff, #b0d5ff, #ffffff); opacity: 0.8;">
                <div id="loginform">
                    <div class="logo">
                        <h3 class="box-title mb-3">Log In</h3>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{ route('login') }}"
                                class="form-horizontal mt-3 form-material">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="">
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Email" autofocus />

                                        @error('email')
                                            <div class="alert customize-alert alert-dismissible text-danger fade show remove-close-icon"
                                                role="alert">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-x fill-white text-danger feather-sm">
                                                        <line x1="18" y1="6" x2="6" y2="18">
                                                        </line>
                                                        <line x1="6" y1="6" x2="18" y2="18">
                                                        </line>
                                                    </svg>
                                                </button>
                                                <div class="d-flex align-items-center font-weight-medium me-3 me-md-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-info text-danger fill-white feather-sm me-2">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="16" x2="12"
                                                            y2="12"></line>
                                                        <line x1="12" y1="8" x2="12"
                                                            y2="8"></line>
                                                    </svg>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="">
                                        <input id="password" type="password" class="form-control" name="password"
                                            required autocomplete="current-password" placeholder="Password" />


                                        @error('password')
                                            <div class="alert customize-alert alert-dismissible text-danger fade show remove-close-icon"
                                                role="alert">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-x fill-white text-danger feather-sm">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18">
                                                        </line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18">
                                                        </line>
                                                    </svg>
                                                </button>
                                                <div class="d-flex align-items-center font-weight-medium me-3 me-md-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-info text-danger fill-white feather-sm me-2">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="16" x2="12"
                                                            y2="12"></line>
                                                        <line x1="12" y1="8" x2="12"
                                                            y2="8"></line>
                                                    </svg>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex">
                                        <div class="checkbox checkbox-info pt-0">
                                            <input id="checkbox-signup" type="checkbox"
                                                class="material-inputs chk-col-indigo" />
                                            <label for="checkbox-signup"> Remember me </label>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="javascript:void(0)" id="to-recover"
                                                class="link font-weight-medium d-flex align-items-center"><i
                                                    class="ri-lock-line fs-5 me-1"></i> Forgot pwd?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center mt-4 mb-3">
                                    <div class="col-xs-12">
                                        <button class="btn btn-info d-block w-100 waves-effect waves-light"
                                            type="submit">
                                            Log In
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="recoverform">
                    <div class="logo">
                        <h3 class="font-weight-medium mb-3">Recover Password</h3>
                        <span class="text-muted">Enter your Email and instructions will be sent to you!</span>
                    </div>
                    <div class="row mt-3 form-material">
                        <!-- Form -->
                        <form class="col-12"
                            action="https://demos.wrappixel.com/premium-admin-templates/bootstrap/nice-bootstrap/package/html/ltr/index.html">
                            <!-- email -->
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="email" required=""
                                        placeholder="Username" />
                                </div>
                            </div>
                            <!-- pwd -->
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button class="btn d-block w-100 btn-primary text-uppercase" type="submit"
                                        name="action">
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets_backend/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets_backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader").fadeOut();
        // ==============================================================
        // Login and Recover Password
        // ==============================================================
        $("#to-recover").on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
</body>

</html>
