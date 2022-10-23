@extends('backend.layouts.full.mainlayout')

@section('title')
    <title>Add Hardware Product | CodeCloud Technology CMS</title>
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
    Add Hardware Product
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
                        <h4 class="card-title mb-0">Product details</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.hardware.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="title" onkeyup="makeSlug(this.value)" class="form-control"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label>Product Slug</label>
                                <input type="text" name="slug" id="slug" onkeyup="checkSlug(this.value)"
                                    class="form-control" required>
                                <p id="slug_status"></p>
                            </div>

                            <div class="mb-3">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" accept="image/*" class="form-control" required>
                            </div>


                            <div class="mb-3">
                                <label>Description</label>
                                <textarea id="editor" name="content" required></textarea>
                            </div>



                            <br><br>
                            <button class="btn btn-success" id="submit_button" type="submit" type="button">
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
    {{-- <script>
        /************************************/
        //default editor
        /************************************/
        $(".summernote").summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false, // set focus to editable area after initializing summernote
        });

        /************************************/
        //inline-editor
        /************************************/
        $(".inline-editor").summernote({
            airMode: true,
        });

        /************************************/
        //edit and save mode
        /************************************/
        (window.edit = function() {
            $(".click2edit").summernote();
        }),
        (window.save = function() {
            $(".click2edit").summernote("destroy");
        });

        var edit = function() {
            $(".click2edit").summernote({
                focus: true
            });
        };

        var save = function() {
            var markup = $(".click2edit").summernote("code");
            $(".click2edit").summernote("destroy");
        };

        /************************************/
        //airmode editor
        /************************************/
        $(".airmode-summer").summernote({
            airMode: true,
        });
    </script> --}}


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

                const button = document.getElementById('submit_button');

                $.ajax({
                    type: "GET",
                    url: "../../admin/check_slug",
                    data: "slug=" + val,
                    success: function(msg) {

                        if (msg == 'OK') {
                            $("#slug_status").html('<span class="text-success">Available!</span>');
                            button.disabled = false;
                        } else {
                            $("#slug_status").html('<span class="text-danger">Not Available!</span>');
                            button.disabled = true;
                        }

                    }

                });


            } else {
                $("#slug_status").html('');
            }
        }
    </script>
@endsection
