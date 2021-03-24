@extends("backend.layouts.default", ['title' => "Edit Categories"])

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

        <form method="post" action="{{ route("manage-categories.update", ["lang" => app()->getLocale(), "manage_category" => $category->id]) }}" class="row pb-5" enctype="multipart/form-data">

            @csrf

            @method("PUT")

            <div class="col-lg-12">
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
                                <option value="1" @if($category->is_published == 1) selected="selected" @endif>Yes</option>
                                <option @if($category->is_published == 0) selected="selected" @endif value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __("Update") }}</button>
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


