@extends("backend.layouts.default", ['title' => "Edit Language"])

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

        <form method="post" action="{{ route("setting-languages.update", ["lang" => app()->getLocale(), "setting_language" => $language->id]) }}" class="row pb-5">

            @csrf

            @method("PUT")

            <div class="col-lg-12">
                <div class="card card-outline card-primary px-2">
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="form-group">
                            <label>{{ __("Iso Code") }}</label>
                            <input type="text" class="form-control" placeholder="Ex: en Or fr" name="iso_code" value="{{ old("iso_code") ?? $language->iso_code }}">

                            @error('iso_code')
                            <span style="font-style: normal; color: red">{{ $errors->first('iso_code') }}</span>
                            @enderror
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


