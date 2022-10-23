@extends('backend.layouts.full.mainlayout')

@section('title')
    <title>Services | CodeCloud Technology CMS</title>
@endsection

@section('styles')
    <link href="{{ asset('assets_backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endsection

@section('page-title')
    Services
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="border-bottom title-part-padding">
                        <a href="{{ route('admin.service.create') }}" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-plus feather-sm">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Add
                        </a>
                    </div>
                    <div class="card-body">
                        {{-- <h6 class="card-subtitle mb-3">Data table example</h6> --}}
                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>Icon</th>
                                        <th>Service Title</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('uploads/images/' . $service->icon) }}" width="100px">
                                            </td>
                                            <td>{{ $service->title }}</td>
                                            <td>{{ $service->slug }}</td>
                                            <td>
                                                <a href="{{ route('admin.service.edit', $service->id) }}"
                                                    class="btn btn-info">Edit</a>

                                                <button class="btn waves-effect waves-light btn-danger delete-button"
                                                    data-id="{{ $service->id }}">
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
        $(function() {
            $(document).on('click', '.delete-button', function(e) {
                e.preventDefault();
                $('#danger-header-modal').modal('show');
                var id = $(this).data('id');
                console.log(id);
                //$('#del_id').val(id);
                document.getElementById("delete-form").action = "../admin/service/" + id;
            });
        });
    </script>
@endsection
