@extends('backend.layouts.full.mainlayout')

@section('title')
    <title>Add a Service | CodeCloud Technology CMS</title>
@endsection

@section('styles')
    <link href="{{ asset('assets_backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets_backend/ajax/libs/codemirror/5.41.0/codemirror.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_backend/ajax/libs/codemirror/5.41.0/theme/blackboard.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_backend/ajax/libs/codemirror/5.41.0/theme/monokai.min.css') }}" />
@endsection

@section('page-title')
    Add a Service
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
                        <h4 class="card-title mb-0">Service details</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.service.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label>Service Title</label>
                                <input type="text" name="title" onkeyup="makeSlug(this.value)" class="form-control"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label>Service Slug</label>
                                <input type="text" name="slug" id="slug" onkeyup="checkSlug(this.value)"
                                    class="form-control" required>
                                <p id="slug_status"></p>
                            </div>

                            <div class="mb-3">
                                <label>Service Type</label>
                                <select name="service_group_id" class="form-select mr-sm-2" required>
                                    <option selected>Choose...</option>
                                    @foreach ($serviceGroup as $sG)
                                        <option value="{{ $sG->id }}">
                                            {{ $sG->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="5" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Keywords
                                    <span class="help"> Separate with coma</span>
                                </label>
                                <input type="text" name="keywords" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Icon</label>
                                <input type="file" name="icon" accept="image/*" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Short Description</label>
                                <textarea name="short_description" class="form-control" rows="5" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Content</label>
                                <textarea id="editor" name="description"></textarea>
                            </div>


                            <div class="mb-3">
                                <label>Color</label>
                                <input type="color" name="div_color" value="#ffffff" class="form-control"
                                    style="height: 70px" required>
                            </div>

                            <div class="mb-3">
                                <label>Top right banner</label>
                                <input type="file" name="right_banner" accept="image/*" class="form-control" required>
                            </div>

                            <br>
                            <hr>
                            <br>

                            <div class="mb-3">
                                <div class="col-md-4 col-xl-3">
                                    <label>Enable Bottom Div 1</span>
                                </div>
                                <div class="col-md-8 col-xl-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input success" type="radio" name="is_bottom_div_1"
                                            value="1">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input danger" type="radio" name="is_bottom_div_1"
                                            value="0">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Bottom Div 1</label>
                                <textarea id="editor_bottom_div_1" name="bottom_div_1"></textarea>
                            </div>

                            <div class="mb-3">
                                <div class="col-md-4 col-xl-3">
                                    <label>Enable Bottom Div Button 1</span>
                                </div>
                                <div class="col-md-8 col-xl-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input success" type="radio" name="is_bottom_div_button_1"
                                            value="1">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input danger" type="radio"
                                            name="is_bottom_div_button_1" value="0">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Bottom Div Button 1 Text</label>
                                <input name="bottom_div_button_1_text" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Bottom Div Button 1 Link</label>
                                <input name="bottom_div_button_1_link" class="form-control" required>
                            </div>


                            <br>
                            <hr>
                            <br>

                            <div class="mb-3">
                                <div class="col-md-4 col-xl-3">
                                    <label>Enable Bottom Div 2</span>
                                </div>
                                <div class="col-md-8 col-xl-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input success" type="radio" name="is_bottom_div_2"
                                            value="1">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input danger" type="radio" name="is_bottom_div_2"
                                            value="0">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Bottom Div 2</label>
                                <textarea id="editor_bottom_div_2" name="bottom_div_2"></textarea>
                            </div>

                            <div class="mb-3">
                                <div class="col-md-4 col-xl-3">
                                    <label>Enable Bottom Div Button 2</span>
                                </div>
                                <div class="col-md-8 col-xl-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input success" type="radio"
                                            name="is_bottom_div_button_2" value="1">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input danger" type="radio"
                                            name="is_bottom_div_button_2" value="0">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Bottom Div Button 2 Text</label>
                                <input name="bottom_div_button_2_text" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Bottom Div Button 2 Link</label>
                                <input name="bottom_div_button_2_link" class="form-control" required>
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

    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('editor');
        CKEDITOR.replace('editor_bottom_div_1');
        CKEDITOR.replace('editor_bottom_div_2');
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
