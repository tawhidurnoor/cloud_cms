<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    @include('backend.layouts.partials.meta')

    @yield('title')

    @include('backend.layouts.partials.styles')

    @yield('styles')
</head>

<body>

    @include('backend.layouts.partials.placeholder')

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        @include('backend.layouts.partials.topbar')

        @include('backend.layouts.partials.leftSideBar')

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">
                            @yield('page-title')
                        </h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            @yield('body')

            @include('backend.layouts.partials.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    {{-- @include('backend.layouts.partials.customizer') --}}

    <div class="chat-windows"></div>

    @include('backend.layouts.partials.scripts')

    @yield('modals')

    @yield('scripts')
</body>

</html>
