<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('assets_backend/libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('assets_backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- apps -->
<script src="{{ asset('assets_backend/dist/js/app.min.js') }}"></script>
<script src="{{ asset('assets_backend/dist/js/app.init.js') }}"></script>
<script src="{{ asset('assets_backend/dist/js/app-style-switcher.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('assets_backend/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('assets_backend/extra-libs/sparkline/sparkline.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('assets_backend/dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('assets_backend/dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('assets_backend/dist/js/feather.min.js') }}"></script>
<script src="{{ asset('assets_backend/dist/js/custom.min.js') }}"></script>
<!--This page JavaScript -->
<script src="{{ asset('assets_backend/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets_backend/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
{{-- <script src="{{ asset('assets_backend/libs/apexcharts/dist/apexcharts.min.js') }}"></script> --}}
<script src="{{ asset('assets_backend/dist/js/pages/dashboards/dashboard1.js') }}"></script>


<script src="{{ asset('assets_backend/extra-libs/toastr/dist/build/toastr.min.js') }}"></script>
<script src="{{ asset('assets_backend/extra-libs/toastr/toastr-init.js') }}"></script>


<!-- Toaster -->

@if (Session::has('success'))
    <script>
        // Slide Down / Slide Up
        toastr.success(
            "{{ Session::get('success') }}",
            "Success!", {
                showMethod: "slideDown",
                hideMethod: "slideUp",
                timeOut: 3000
            }
        );
    </script>
@endif

@if (Session::has('warning'))
    <script>
        // Slide Down / Slide Up
        toastr.warning(
            "{{ Session::get('warning') }}",
            "Warning!", {
                showMethod: "slideDown",
                hideMethod: "slideUp",
                timeOut: 3000
            }
        );
    </script>
@endif
