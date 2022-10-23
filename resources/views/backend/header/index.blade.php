@extends('backend.layouts.full.mainlayout')

@section('title')
    <title>Headers | CodeCloud Technology CMS</title>
@endsection

@section('styles')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets_backend/Drag-Drop-Menu-Builder-For-Bootstrap/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') }}">

    <style type="text/css">
        .container {
            margin: 150px auto;
        }

        body {
            background-color: #fafafa;
        }

        ol.example li.placeholder:before {
            position: absolute;
        }

        .list-group-item>div {
            margin-bottom: 5px;
        }
    </style>
    <script src="{{ asset('assets_backend/Drag-Drop-Menu-Builder-For-Bootstrap/jquery-3.6.0.js') }}"></script>
@endsection

@section('page-title')
    Headers
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h6 class="card-subtitle mb-3">Data table example</h6> --}}






                        <div class="row">
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="float-left">Menu</h5>
                                        <div class="float-right">
                                            <button id="btnReload" type="button" class="btn btn-outline-secondary">
                                                <i class="fa fa-play"></i> Reload</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul id="myEditor" class="sortableLists list-group">
                                        </ul>
                                    </div>
                                </div>
                                <br>
                                <div class="float-left">
                                    <button id="btnOutput" type="button" class="btn btn-success"><i
                                            class="fas fa-check-square"></i> Save</button>
                                </div>
                                {{-- <div class="card">
                                    <div class="card-header">JSON Output
                                        <div class="float-right">
                                            <button id="btnOutput" type="button" class="btn btn-success"><i
                                                    class="fas fa-check-square"></i> Output</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <textarea id="out" class="form-control" cols="50" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-md-4">

                                <div class="card border-primary mb-3">
                                    <div class="card-header bg-primary text-white">Edit item</div>
                                    <div class="card-body">
                                        <form id="frmEdit" class="form-horizontal">
                                            <div class="form-group">
                                                <label for="text">Text</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control item-menu" name="text"
                                                        id="text" placeholder="Text">
                                                    <div class="input-group-append">
                                                        <button type="button" id="myEditor_icon"
                                                            class="btn btn-outline-secondary"></button>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="icon" class="item-menu">
                                            </div>
                                            <div class="form-group">
                                                <label for="href">URL</label>
                                                <input type="text" class="form-control item-menu" id="href"
                                                    name="href" placeholder="URL">
                                            </div>
                                            <div class="form-group">
                                                <label for="target">Target</label>
                                                <select name="target" id="target" class="form-control item-menu">
                                                    <option value="_self">Self</option>
                                                    <option value="_blank">Blank</option>
                                                    <option value="_top">Top</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Tooltip</label>
                                                <input type="text" name="title" class="form-control item-menu"
                                                    id="title" placeholder="Tooltip">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i
                                                class="fas fa-sync-alt"></i> Update</button>
                                        <button type="button" id="btnAdd" class="btn btn-success"><i
                                                class="fas fa-plus"></i>
                                            Add</button>
                                    </div>
                                </div>

                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
@endsection

@section('scripts')
    <script>
        function getLink(val) {
            let str = val;
            let output = "{{ getBaseURL() }}" + str;
            $("#link").html('Your link will be ' + output);
            $("#link2").html('Your link will be ' + output);
        }
    </script>



    <script src='{{ asset('assets_backend/Drag-Drop-Menu-Builder-For-Bootstrap/jquery-menu-editor.js') }}'></script>
    <script type="text/javascript"
        src="{{ asset('assets_backend/Drag-Drop-Menu-Builder-For-Bootstrap/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('assets_backend/Drag-Drop-Menu-Builder-For-Bootstrap/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js') }}">
    </script>
    <script>
        jQuery(document).ready(function() {

            var editor = new MenuEditor('myEditor', {
                listOptions: sortableListOptions,
                iconPicker: iconPickerOptions
            });
            editor.setForm($('#frmEdit'));
            editor.setUpdateButton($('#btnUpdate'));

            // menu items
            var arrayjson = null;
            //getting menu items from database
            $.ajax({
                url: "{{ route('admin.header.get_content') }}",
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    console.log(res);
                    arrayjson = res;
                    editor.setData(arrayjson);
                }
            });

            // var arrayjson = [{
            //     "href": "http://home.com",
            //     "icon": "fas fa-home",
            //     "text": "Home",
            //     "target": "_top",
            //     "title": "My Home"
            // }, {
            //     "icon": "fas fa-chart-bar",
            //     "text": "Opcion2"
            // }, {
            //     "icon": "fas fa-bell",
            //     "text": "Opcion3"
            // }, {
            //     "icon": "fas fa-crop",
            //     "text": "Opcion4"
            // }, {
            //     "icon": "fas fa-flask",
            //     "text": "Opcion5"
            // }, {
            //     "icon": "fas fa-map-marker",
            //     "text": "Opcion6"
            // }, {
            //     "icon": "fas fa-search",
            //     "text": "Opcion7",
            //     "children": [{
            //         "icon": "fas fa-plug",
            //         "text": "Opcion7-1",
            //         "children": [{
            //             "icon": "fas fa-filter",
            //             "text": "Opcion7-1-1"
            //         }]
            //     }]
            // }];

            // icon picker options
            var iconPickerOptions = {
                searchText: "Buscar...",
                labelHeader: "{0}/{1}"
            };
            // sortable list options
            var sortableListOptions = {
                placeholderCss: {
                    'background-color': "#cccccc"
                }
            };


            $('#btnReload').on('click', function() {
                editor.setData(arrayjson);
            });
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $('#btnOutput').on('click', function() {
                var str = editor.getString();
                $("#out").text(str);

                $.ajax({
                    url: "{{ route('admin.header.update_content') }}",
                    type: 'GET',
                    data: {
                        "header_content": str
                    },
                    // dataType: 'json', // added data type
                    success: function(res) {
                        console.log(res);
                        toastr.success(
                            "Header saved successfully!",
                            "Success!", {
                                showMethod: "slideDown",
                                hideMethod: "slideUp",
                                timeOut: 3000
                            }
                        );
                    }
                });


                // const xhr = new XMLHttpRequest();

                // xhr.open('GET', '{{ route('admin.header.update_content') }}');
                // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                // console.log('csrf-token={{ csrf_token() }}&header_content=' + str);
                // xhr.send('header_content=' + str + '&csrf-token={{ csrf_token() }}');
            });

            $("#btnUpdate").click(function() {
                editor.update();
            });

            $('#btnAdd').click(function() {
                editor.add();
            });
            /* ====================================== */

            /** PAGE ELEMENTS **/
            $('[data-toggle="tooltip"]').tooltip();
            $.getJSON("https://api.github.com/repos/davicotico/jQuery-Menu-Editor", function(data) {
                $('#btnStars').html(data.stargazers_count);
                $('#btnForks').html(data.forks_count);
            });
        });
    </script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <script>
        try {
            fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", {
                method: 'HEAD',
                mode: 'no-cors'
            })).then(function(response) {
                return true;
            }).catch(function(e) {
                var carbonScript = document.createElement("script");
                carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
                carbonScript.id = "_carbonads_js";
                document.getElementById("carbon-block").appendChild(carbonScript);
            });
        } catch (error) {
            console.log(error);
        }
    </script>
@endsection
