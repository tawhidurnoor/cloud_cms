@extends('backend.layouts.full.mainlayout')

@section('title')
    <title>Edit Blog | CodeCloud Technology CMS</title>
@endsection

@section('styles')
    <link href="{{ asset('assets_backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets_backend/ajax/libs/codemirror/5.41.0/codemirror.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_backend/ajax/libs/codemirror/5.41.0/theme/blackboard.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_backend/ajax/libs/codemirror/5.41.0/theme/monokai.min.css') }}" />

    {{-- <link rel="stylesheet" type="text/css"
        href="{{ asset('assets_backend/extra-libs/summernote/summernote-lite.min.css') }}" />

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets_backend/extra-libs/summernote/summernote-lite.min.css') }}" /> --}}


    <style>
        #container {
            width: 1000px;
            margin: 20px auto;
        }

        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 500px;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
@endsection

@section('page-title')
    Edit Blogs
@endsection

@section('body')
    <div class="container-fluid">
        <!-- -------------------------------------------------------------- -->
        <!-- Start Page Content -->
        <!-- -------------------------------------------------------------- -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="border-bottom title-part-padding">
                        <h4 class="card-title mb-0">Blog details</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.blog.update', $blog->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label>Blog Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $blog->title }}"
                                    onkeyup="makeSlug(this.value)" required>
                            </div>

                            <div class="mb-3">
                                <label>Blog Slug</label>
                                <input type="text" name="slug" id="slug" value="{{ $blog->slug }}"
                                    onkeyup="checkSlug(this.value)" class="form-control" required>
                                <p id="slug_status"></p>
                            </div>

                            <div class="mb-3">
                                <label>Blog Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" value="{{ $blog->meta_title }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="5" required>{{ $blog->meta_description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Keywords
                                    <span class="help"> Separate with coma</span>
                                </label>
                                <input type="text" name="keywords" class="form-control" value="{{ $blog->keywords }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label>Banner</label>
                                <input type="file" name="banner" accept="image/*" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Summary</label>
                                <textarea name="summary" class="form-control" rows="5" required>{{ $blog->summary }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Blog Content</label>
                                {{-- <textarea class="summernote" name="content"></textarea> --}}
                                <textarea id="editor" name="content">{{ $blog->content }}</textarea>
                            </div>



                            <br><br>
                            <button class="btn btn-success" type="submit" type="button">
                                <i class="ri-save-fill fs-5 align-middle"></i> Save
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- End PAge Content -->
        <!-- -------------------------------------------------------------- -->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets_backend/libs/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets_backend/dist/js/pages/datatable/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets_backend/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets_backend/libs/codemirror/5.41.0/codemirror.js') }}"></script>
    <script src="{{ asset('assets_backend/libs/codemirror/5.41.0/mode/xml/xml.min.js') }}"></script>
    <script src="{{ asset('assets_backend/extra-libs/summernote/summernote-lite.min.js') }}"></script>


    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('editor');
    </script>

    {{-- making slug and checking avalablity --}}
    <script>
        function makeSlug(val) {
            let str = val;
            let output = str.replace(/\s+/g, '-').toLowerCase();
            $('#slug').val(output);
            checkSlug(output);
        }

        function checkSlug(val) {
            if (val.length >= 1) {


                // $("#slug_status").html('<img src="../../assets_backend/images/loading.gif"> Checking..');
                $("#slug_status").html('<span class="text-info">Checking...</span>');

                $.ajax({
                    type: "GET",
                    url: "../../../admin/check_blog_slug",
                    data: "slug=" + val + "&id=" + "{{ $blog->id }}",
                    success: function(msg) {

                        if (msg == 'OK') {
                            $("#slug_status").html('<span class="text-success">Available!</span>');
                        } else {
                            $("#slug_status").html('<span class="text-danger">Not Available!</span>');
                        }
                        // $("#statuspass").ajaxComplete(function(event, request, settings) {

                        //     if (msg == 'OK') {
                        //         $("#name").removeClass('object_error');
                        //         $("#name").addClass("object_ok");
                        //         $(this).html(
                        //             '<img src="images/success.png" align="absmiddle"> OK<'
                        //         );
                        //     } else {
                        //         $("#name").removeClass('object_ok');
                        //         $("#name").addClass("object_error");
                        //         $(this).html(msg);
                        //     }

                        // });

                    }

                });


            } else {
                $("#slug_status").html('');
            }
        }
    </script>
@endsection
