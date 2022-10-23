@extends('backend.layouts.full.mainlayout')

@section('title')
    <title>Header Submenu | CodeCloud Technology CMS</title>
@endsection

@section('styles')
    <link href="{{ asset('assets_backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endsection

@section('page-title')
    Header Submenu
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="border-bottom title-part-padding">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-plus feather-sm">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Add
                        </button>
                    </div>
                    <div class="card-body">
                        {{-- <h6 class="card-subtitle mb-3">Data table example</h6> --}}
                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>Position</th>
                                        <th>Text</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody>
                                    @foreach ($headers as $head)
                                        <tr>
                                            <td>{{ $head->id }}</td>
                                            <td>{{ $head->text }}</td>
                                            <td>{{ getBaseURL() . $head->link }}</td>
                                            <td>
                                                <button class="btn btn-info edit-button"
                                                    data-id="{{ $head->id }}">Edit</button>

                                                <button class="btn waves-effect waves-light btn-danger delete-button"
                                                    data-id="{{ $head->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    {{-- add modal --}}
    <div id="add-modal" class="modal fade" tabindex="-1" aria-labelledby="add-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Add Header Submenu
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.header.submenu.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="header_id" value="{{ $header->id }}">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Text</label>
                            <input type="text" name="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Link</label>
                            <input type="text" name="link" onkeyup="getLink(this.value)" class="form-control">
                            <p id="link"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">
                            Save
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    {{-- edit modal --}}
    <div id="edit-modal" class="modal fade" tabindex="-1" aria-labelledby="add-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Add Header
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.service_group.store') }}" id="edit-form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        {{-- <div class="mb-3">
                            <label>Text</label>
                            <input type="text" name="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Link</label>
                            <input type="text" name="link" onkeyup="getLink(this.value)" class="form-control"
                                required>
                            <p id="link"></p>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">
                            Save
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- delete modal --}}
    <div id="danger-header-modal" class="modal fade" tabindex="-1" aria-labelledby="danger-header-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" id="delete-form" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header modal-colored-header bg-danger text-white">
                        <h4 class="modal-title" id="danger-header-modalLabel">
                            Are you sure?
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="mt-0">Are you sure want to delete this record?</h5>
                        <p>
                            You are about to delete something This process can't be undone.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-light-danger text-danger font-weight-medium">
                            Delete
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets_backend/libs/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets_backend/dist/js/pages/datatable/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets_backend/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>

    <script>
        function getLink(val) {
            let str = val;
            let output = "{{ getBaseURL() }}" + str;
            $("#link").html('Your link will be ' + output);
        }
    </script>
    <script>
        $(function() {
            $(document).on('click', '.edit-button', function(e) {
                e.preventDefault();
                $('#edit-modal').modal('show');
                var id = $(this).data('id');
                getEditDetails(id);
            });

            $(document).on('click', '.delete-button', function(e) {
                e.preventDefault();
                $('#danger-header-modal').modal('show');
                var id = $(this).data('id');
                document.getElementById("delete-form").action = "../admin/service/" + id;
            });
        });


        function getEditDetails(id) {
            $.ajax({
                type: 'GET',
                url: '../admin/service_group/' + id,
                dataType: 'json',
                success: function(response) {
                    $('#name').val(response.name);
                    $('#service_type').val(response.service_type);
                }
            });
            document.getElementById("edit-form").action = "../admin/service_group/" + id;
        }
    </script>
@endsection
