@extends('backend.layouts.full.mainlayout')

@section('title')
    <title>Meta Information | CodeCloud Technology CMS</title>
@endsection

@section('styles')
@endsection

@section('page-title')
    Meta Information
@endsection

@section('body')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-body">
                    <h4 class="card-title">Meta Information</h4>
                    <h5 class="card-subtitle mb-3 border-bottom pb-3">
                        Meta information of your website wich will visible all over the site.
                    </h5>

                    <form action="{{ route('admin.setup.meta.update') }}" method="POST" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ $meta->meta_title }}">
                        </div>
                        <div class="mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="5">{{ $meta->meta_description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="example-email">Keywords
                                <span class="help"> Separate with coma</span>
                            </label>
                            <input type="text" name="keywords" class="form-control" value="{{ $meta->keywords }}">
                        </div>

                        <div class="mb-3">
                            <label>Meta Image
                                <span class="help"> Leave empty if you do not want to change</span>
                            </label>
                            <input type="file" name="meta_image" accept="image/*" class="form-control">
                        </div>

                        <div class="form-actions">
                            <div class="card-body border-top">
                                <button type="submit" class="btn btn-success rounded-pill px-4">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-save feather-sm me-1 fill-icon">
                                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z">
                                            </path>
                                            <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                            <polyline points="7 3 7 8 15 8"></polyline>
                                        </svg>
                                        Save
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection

@section('scripts')
@endsection
