@extends("backend.layouts.default", ['title' => "Setting Contact"])

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
                                    <h2>Setting <b>{{ __("Contact") }}</b></h2>
                                </div>

                                @if(!$settingContact)
                                    <div class="col-sm-6">
                                        <a href="{{ route_name("setting-contacts.create") }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>{{ __("Add Content Contact") }}</span></a>
                                    </div>
                                @endif
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
                                <th>Sub Title</th>
                                <th>Description</th>
                                <th>image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($settingContact)
                                <tr>
                                    <td class="d-none">
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox3" name="options[]" value="1">
                                                <label for="checkbox3"></label>
                                            </span>
                                    </td>

                                    <td>{!! $settingContact->date_post !!}</td>
                                    <td>{{ $settingContact->title }}</td>
                                    <td>{{ $settingContact->sub_title }}</td>
                                    <td>{{ $settingContact->short_description }}</td>
                                    <td><img src="{{ asset( $settingContact->thumbnail ?? "backend/dist/img/default-150x150.png") }}" alt="" width="100"></td>
                                    <td>
                                        <a href="{{ route("translation.contact", ["lang" => app()->getLocale(), "contact" => $settingContact->id, "to_lang" => "en"]) }}" class="create"><i class="material-icons" data-toggle="tooltip" title="Translate">translate</i></a>
                                        <a href="{{ route("setting-contacts.edit", ["lang" => app()->getLocale(), "setting_contact" => $settingContact->id]) }}" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    </td>
                                </tr>


                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

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
