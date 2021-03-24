@extends("backend.layouts.default", ['title' => "Pages"])

@section("scripts_css")

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset("backend/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("backend/dist/css/adminlte.min.css") }}">

    <link rel="stylesheet" href="{{ asset("backend/dist/css/style-post-list.css") }}">

@endsection

@section("content")

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title bg-primary">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Manage <b>Pages</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{ route_name("manage-pages.create") }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>{{ __("Add New Page") }}</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="d-none">
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll">
                                        <label for="selectAll"></label>
                                    </span>
                                </th>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Images</th>
                                <th>Status</th>
                                <th>{{ __("Created By") }}</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($pages as $page)

                                    <tr>
                                        <td class="d-none">
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox3" name="options[]" value="1">
                                                <label for="checkbox3"></label>
                                            </span>
                                        </td>

                                        <td>{{ $page->date_post }}</td>

                                        <td>{{ $page->short_title }}</td>

                                        <td><img src="{{ asset( $page->thumbnail ??  "backend/dist/img/news1.png") }}" alt="" width="100"></td>

                                        <td>{{ $page->is_published ? __("Published") : __("Not published") }}</td>

                                        <td>{{ $page->user->name }}</td>

                                        <td>
                                            <a href="{{ route("translation.page", ["lang" => app()->getLocale(), "page" => $page->id, "to_lang" => "en"]) }}" class="create"><i class="material-icons" data-toggle="tooltip" title="Translate">translate</i></a>
                                            <a href="{{ route("manage-pages.edit", ["lang" => app()->getLocale(), "manage_page" => $page->id]) }}" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                            <a href="#deletePageModal{{ $page->id }}"  class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                            <a href="{{ route("manage-pages.show", ["lang" => app()->getLocale(), "manage_page" => $page->id]) }}" target="_blank"  class="text-primary" ><i class="fa" data-toggle="tooltip" title="Show">&#xf06e;</i></a>
                                        </td>
                                    </tr>

                                    @include("backend.pages.delete")

                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                {{ $pages->links("paginate/vendor/pagination/bootstrap-4") }}
            </div>
        </div>
        <!-- /.row -->
    </div>


@endsection


@section("scripts_js")

    <script src="{{ asset("backend/plugins/jquery/jquery.min.js") }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset("backend/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset("backend/dist/js/adminlte.js") }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset("backend/dist/js/demo.js") }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset("backend/dist/js/pages/dashboard3.js") }}"></script>

@endsection
