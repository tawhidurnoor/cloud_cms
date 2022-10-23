@extends('backend.layouts.full.mainlayout')

@section('title')
    <title>Visitor Quries | CodeCloud Technology CMS</title>
@endsection

@section('styles')
    <link href="{{ asset('assets_backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endsection

@section('page-title')
    Visitor Quries
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h6 class="card-subtitle mb-3">Data table example</h6> --}}
                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Action</th>
                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td>
                                                <button class="btn waves-effect waves-light btn-primary details-button"
                                                    data-id="{{ $contact->id }}">
                                                    Details
                                                </button>

                                                <button class="btn waves-effect waves-light btn-danger delete-button"
                                                    data-id="{{ $contact->id }}">
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
    {{-- details modal --}}
    <div id="details-modal" class="modal fade" tabindex="-1" aria-labelledby="details-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info text-white">
                    <h4 class="modal-title" id="details-modal">
                        Query Details
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="details"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
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
        $(function() {
            $(document).on('click', '.details-button', function(e) {
                e.preventDefault();
                $('#details-modal').modal('show');
                var id = $(this).data('id');
                getDetails(id);
            });

            $(document).on('click', '.delete-button', function(e) {
                e.preventDefault();
                $('#danger-header-modal').modal('show');
                var id = $(this).data('id');
                document.getElementById("delete-form").action = "../admin/contact/" + id;
                console.log("../admin/contact/" + id);
            });
        });

        function getDetails(id) {
            $.ajax({
                type: 'GET',
                url: '../admin/contact/' + id,
                dataType: 'json',
                success: function(response) {
                    $('#details').html(response.message);
                }
            });
        }
    </script>
@endsection
