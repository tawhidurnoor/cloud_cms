<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ri-close-line fs-6 ri-menu-2-line"></i>
            </a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <a href="{{ route('admin.home') }}" class="logo">

                    <!-- Logo icon -->
                    {{-- <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="{{ asset('assets_backend/images/logo-icon.png') }}" alt="homepage"
                            class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="{{ asset('assets_backend/images/logo-light-icon.png') }}" alt="homepage"
                            class="light-logo" />
                    </b> --}}
                    <!--End Logo icon -->

                    <!-- Logo text -->
                    <span class="logo-text">
                        <!-- dark Logo text -->
                        {{-- <img src="{{ asset('assets_backend/images/logo-text.png') }}" alt="homepage"
                            class="dark-logo" /> --}}
                        <!-- Light Logo text -->
                        <img src="{{ asset('uploads/images/' . getSettings('logo_light')) }}" class="light-logo"
                            alt="homepage" />
                    </span>
                </a>
                <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                    <i class="mdi mdi-toggle-switch mdi-toggle-switch-off fs-6"></i>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i data-feather="more-horizontal" class="feather-sm"></i>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto">
                <!-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li> -->
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark text-info" href="{{ route('index') }}"
                        target="_blank">
                        <i data-feather="eye"></i> Visit Site
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark text-success"
                        href="{{ route('admin.cache.clear') }}">
                        <i data-feather="x-circle"></i> Clear Cache
                    </a>
                </li>

            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav">
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="
                    nav-link
                    dropdown-toggle
                    waves-effect waves-dark
                    pro-pic
                  "
                        href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('assets_backend/images/users/2.jpg') }}" alt="user"
                            class="rounded-circle" width="40" />
                        <span class="ms-1 font-weight-medium d-none d-sm-inline-block">{{ auth()->user()->name }}
                            <i data-feather="chevron-down" class="feather-sm"></i></span>
                    </a>
                    <div
                        class="
                    dropdown-menu dropdown-menu-end
                    user-dd
                    animated
                    flipInY
                  ">
                        <span class="with-arrow">
                            <span class="bg-primary"></span>
                        </span>
                        <div
                            class="
                      d-flex
                      no-block
                      align-items-center
                      p-3
                      bg-primary
                      text-white
                      mb-2
                    ">
                            <div class="">
                                <img src="{{ asset('assets_backend/images/users/5.jpg') }}" alt="user"
                                    class="rounded-circle" width="60" />
                            </div>
                            <div class="ms-2">
                                <h4 class="mb-0 text-white">{{ auth()->user()->name }}</h4>
                                <p class="mb-0">{{ auth()->user()->email }}</p>
                            </div>
                        </div>



                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i data-feather="log-out" class="feather-sm text-danger me-1 ms-1"></i>
                            Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        <a href="{{ route('admin.profile.index') }}"
                            class="btn d-block w-100 btn-primary rounded-pill">View
                            Profile</a>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
