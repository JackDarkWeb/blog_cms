@extends("backend.layouts.default", ['title' => "Create Category"])

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

@endsection

@section("content")

    <div class="container-fluid">

        <form method="post" action="{{ route_name("manage-categories.store") }}" class="row pb-5" enctype="multipart/form-data">

            @csrf

            <div class="col-lg-8">

                <div class="card card-outline card-primary px-2">

                    <div class="form-group">

                        <label>{{ __("Origin language") }}</label>

                        <select class="form-control select2" name="origin_lang" style="width: 100%;">
                            <option selected value="{{ app()->getLocale() }}">{{ \Illuminate\Support\Str::upper(app()->getLocale()) }}</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>{{ __("Name") }}</label>
                        <input type="text" class="form-control" placeholder="Enter the category name" name="name">

                        @error('name')
                           <span style="font-style: normal; color: red">{{ $errors->first('name') }}</span>
                        @enderror
                    </div>


                </div>
            </div>

            <div class="col-lg-4">
                <div class="card card-outline card-primary px-2">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputFile">Thumbnail</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                </div>

                                @error('file')
                                <span style="font-style: normal; color: red">{{ $errors->first('file') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Publish</label>
                            <select name="is_published" class="form-control select2" style="width: 100%;">
                                <option value="1" selected="selected">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __("Create") }}</button>
                    </div>
                </div>
            </div>

            <!-- /.col-md-6 -->
        </form>
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


@section("scripts")

    @include("backend.scripts.script_category")

@endsection


