<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit {{ $page->title }} Page - Code Cloud CMS</title>
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets_backend/keditor/plugins/bootstrap-3.4.1/css/bootstrap.min.css') }}"
        data-type="keditor-style" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets_backend/keditor/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}"
        data-type="keditor-style" />
    <!-- Start of KEditor styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_backend/keditor/dist/css/keditor.css') }}"
        data-type="keditor-style" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_backend/keditor/dist/css/keditor-components.css') }}"
        data-type="keditor-style" />
    <!-- End of KEditor styles -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets_backend/keditor/plugins/code-prettify/src/prettify.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_backend/keditor/css/examples.css') }}" />
    <!-- Toastr CSS -->
    <link href="{{ asset('assets_backend/extra-libs/toastr/dist/build/toastr.min.css') }}" rel="stylesheet" />
</head>

<body>
    <div data-keditor="html">
        <div id="content-area">{!! $page->content !!}</div>
    </div>

    <script type="text/javascript" src="{{ asset('assets_backend/keditor/plugins/jquery-1.11.3/jquery-1.11.3.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets_backend/keditor/plugins/bootstrap-3.4.1/js/bootstrap.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('assets_backend/keditor/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets_backend/keditor/plugins/ckeditor-4.11.4/ckeditor.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('assets_backend/keditor/plugins/formBuilder-2.5.3/form-builder.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets_backend/keditor/plugins/formBuilder-2.5.3/form-render.min.js') }}"></script>
    <!-- Start of KEditor scripts -->
    <script type="text/javascript" src="{{ asset('assets_backend/keditor/dist/js/keditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets_backend/keditor/dist/js/keditor-components.js') }}"></script>
    <!-- End of KEditor scripts -->
    <script type="text/javascript" src="{{ asset('assets_backend/keditor/plugins/code-prettify/src/prettify.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('assets_backend/keditor/plugins/js-beautify-1.7.5/js/lib/beautify.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets_backend/keditor/plugins/js-beautify-1.7.5/js/lib/beautify-html.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets_backend/keditor/js/examples.js') }}"></script>
    <!-- Toaster -->
    <script src="{{ asset('assets_backend/extra-libs/toastr/dist/build/toastr.min.js') }}"></script>
    <script src="{{ asset('assets_backend/extra-libs/toastr/toastr-init.js') }}"></script>



    <script type="text/javascript" data-keditor="script">
        $(function() {
            $('#content-area').keditor();
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        $(function() {
            $(document).on('click', '.fa-save', function(e) {
                e.preventDefault();

                var content = $('#content-area').keditor('getContent');
                $.ajax({
                    url: "{{ route('admin.page.editor2.update', $page->id) }}",
                    type: 'POST',
                    data: {
                        "content": content
                    },
                    // dataType: 'json', // added data type
                    success: function(res) {
                        console.log(res);
                        toastr.success(
                            "Page updated successfully!",
                            "Success!", {
                                showMethod: "slideDown",
                                hideMethod: "slideUp",
                                timeOut: 3000
                            }
                        );
                    },
                    error: function(res) {
                        console.log(res);
                        toastr.warning(
                            "Error updating page!",
                            "Error!", {
                                showMethod: "slideDown",
                                hideMethod: "slideUp",
                                timeOut: 3000
                            }
                        );
                    }
                });

            });
        });
    </script>
</body>

</html>
