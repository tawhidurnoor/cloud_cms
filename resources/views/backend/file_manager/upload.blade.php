@extends('backend.layouts.full.mainlayout')

@section('title')
    <title>Upload Files | CodeCloud Technology CMS</title>
@endsection

@section('styles')
    <!-- Popup CSS -->
    <link href="{{ asset('assets_backend/libs/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet" />
@endsection

@section('page-title')
    Upload Files
@endsection

@section('body')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-body">
                    <h4 class="card-title">Upload Files</h4>
                    <h5 class="card-subtitle mb-3 border-bottom pb-3">
                        Drag and drop your files.
                    </h5>




                    <div class="container-fluid">
                        <!-- -------------------------------------------------------------- -->
                        <!-- Start Page Content -->
                        <!-- -------------------------------------------------------------- -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('admin.upload.upload.store') }}" id="recommendationDiv"
                                            method="POST" class="dropzone" enctype="multipart/form-data">
                                            @csrf
                                            <div class="fallback">
                                                <input name="file" type="file" accept="image/*" multiple />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- -------------------------------------------------------------- -->
                        <!-- End PAge Content -->
                        <!-- -------------------------------------------------------------- -->
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
    <script src="{{ asset('assets_backend/libs/dropzone/dist/min/dropzone.min.js') }}"></script>


    <script>
        Dropzone.options.recommendationDiv = {
            acceptedFiles: 'image/*'
        };
    </script>
@endsection
