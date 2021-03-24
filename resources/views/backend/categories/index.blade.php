@extends("backend.layouts.default", ['title' => "Categories"])

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
                                    <h2>Manage <b>{{ __("Categories") }}</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{ route_name("manage-categories.create") }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>{{ __("Add New Category") }}</span></a>
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
                                <th>Name</th>
                                <th>Images</th>
                                <th>Created By</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)

                                    <tr>
                                        <td class="d-none">
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox3" name="options[]" value="1">
                                                <label for="checkbox3"></label>
                                            </span>
                                        </td>

                                        <td>{!! $category->date_post !!}</td>
                                        <td>{{ $category->name }}</td>
                                        <td><img src="{{ asset( $category->thumbnail ?? "backend/dist/img/default-150x150.png") }}" alt="" width="100"></td>
                                        <td>{{ $category->user->name }}</td>
                                        <td>{{ $category->is_published ? __("Published") : __("Not published") }}</td>
                                        <td>
                                            <a href="{{ route("translation.category", ["lang" => app()->getLocale(), "category" => $category->id, "to_lang" => "en"]) }}" class="create"><i class="material-icons" data-toggle="tooltip" title="Translate">translate</i></a>
                                            <a href="{{ route("manage-categories.edit", ["lang" => app()->getLocale(), "manage_category" => $category->id]) }}" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                            <a href="#deleteCategoryModal{{ $category->id }}"  class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                        </td>
                                    </tr>

                                    @include("backend.categories.delete")

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{ $categories->links("paginate/vendor/pagination/bootstrap-4") }}

            </div>
            <!-- Edit Modal HTML -->

            <!-- Edit Modal HTML -->


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
