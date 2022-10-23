@extends('backend.layouts.full.mainlayout')

@section('title')
    <title>Welcome | CodeCloud Technology CMS</title>
@endsection

@section('styles')
@endsection

@section('page-title')
    Welcome
@endsection

@section('body')
    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <i class="mdi mdi-book-open-page-variant fs-6 text-info"></i>
                                <p class="fs-4 mb-1">Pages</p>
                            </div>
                            <div class="col-5">
                                <h1 class="fw-light text-end mb-0">{{ count($pages) }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <i class="mdi mdi-blogger fs-6 text-success"></i>
                                <p class="fs-4 mb-1">Blogs</p>
                            </div>
                            <div class="col-5">
                                <h1 class="fw-light text-end mb-0">{{ count($blogs) }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <i class="mdi mdi-file fs-6 text-purple"></i>
                                <p class="fs-4 mb-1">Files</p>
                            </div>
                            <div class="col-5">
                                <h1 class="fw-light text-end mb-0">{{ count($files) }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <i class="mdi mdi-file fs-6 text-danger"></i>
                                <p class="fs-4 mb-1">Files(kb)</p>
                            </div>
                            <div class="col-5">
                                <h1 class="fw-light text-end mb-0">
                                    {{ number_format($files->sum('file_size') / 1024, 0, '.', ',') }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('scripts')
@endsection
