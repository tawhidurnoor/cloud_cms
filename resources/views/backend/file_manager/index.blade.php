@extends('backend.layouts.full.mainlayout')

@section('title')
    <title>Files | CodeCloud Technology CMS</title>
@endsection

@section('styles')
    <!-- Popup CSS -->
    <link href="{{ asset('assets_backend/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet" />
@endsection

@section('page-title')
    Files
@endsection

@section('body')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-body">
                    <h4 class="card-title">Files</h4>
                    <h5 class="card-subtitle mb-3 border-bottom pb-3">
                        All of your files are here.
                    </h5>

                    <div class="row el-element-overlay">

                        @foreach ($uploads as $upload)
                            <div class="col-lg-2 col-md-2">
                                <div class="card">
                                    <div class="el-card-item pb-3">
                                        <div
                                            class="el-card-avatar mb-3 el-overlay-1 w-100 overflow-hidden position-relative text-center">
                                            <img src="{{ URL::to('uploads/images/' . $upload->file_name) }}"
                                                class="d-block position-relative w-100" alt="user">
                                            <div class="el-overlay w-100 overflow-hidden">
                                                <ul
                                                    class="list-style-none el-info text-white text-uppercase d-inline-block p-0">
                                                    <li class="el-item d-inline-block my-0 mx-1">
                                                        <a class="btn default btn-outline image-popup-vertical-fit el-link text-white border-white"
                                                            href="{{ URL::to('uploads/images/' . $upload->file_name) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-search feather-sm">
                                                                <circle cx="11" cy="11" r="8">
                                                                </circle>
                                                                <line x1="21" y1="21" x2="16.65"
                                                                    y2="16.65"></line>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li class="el-item d-inline-block my-0 mx-1">
                                                        <a class="btn default btn-outline el-link text-white border-white"
                                                            href="javascript:void(0);" onclick="copyUrl(this)"
                                                            data-url="{{ URL::to('uploads/images/' . $upload->file_name) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-link feather-sm">
                                                                <path
                                                                    d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71">
                                                                </path>
                                                                <path
                                                                    d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="el-card-content text-center">
                                            <h4 class="mb-0">{{ $upload->file_original_name }}</h4>
                                            <span class="text-muted">{{ $upload->file_size / 1024 }} kilo bytes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection

@section('scripts')
    <script src="{{ asset('assets_backend/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets_backend/libs/magnific-popup/meg.init.js') }}"></script>

    <script>
        function copyUrl(e) {
            var url = $(e).data('url');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(url).select();
            try {
                document.execCommand("copy");
                // Slide Down / Slide Up
                toastr.success(
                    "Link copied to clipboard",
                    "Success!", {
                        showMethod: "slideDown",
                        hideMethod: "slideUp",
                        timeOut: 3000
                    }
                );
            } catch (err) {

                toastr.warning(
                    "Oops, unable to copy",
                    "Warning!", {
                        showMethod: "slideDown",
                        hideMethod: "slideUp",
                        timeOut: 3000
                    }
                );

            }
            $temp.remove();
        }
    </script>
@endsection
