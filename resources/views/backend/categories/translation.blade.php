@extends("backend.layouts.default", ['title' => "Translation Category"])

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

        <form method="post" action="@if(isset($translation->name)) {{ route("translation.category.update", ["lang" => app()->getLocale(), "category" => $category->id, "to_lang" => $to_lang]) }} @else {{ route("translation.category.store", ["lang" => app()->getLocale(), "category" => $category->id, "to_lang" => $to_lang]) }} @endif" class="row pb-5" enctype="multipart/form-data">

            @csrf

            @if(isset($translation->name))

                @method("PUT")

            @endif

            <div class="col-lg-6">

                <div class="card card-outline card-primary px-2">

                    <label>{{ __("From language") }}</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">

                        <label class="btn bg-olive active">
                            <input type="radio"  autocomplete="off">
                            {{ \Illuminate\Support\Str::upper(app()->getLocale()) }}
                        </label>

                    </div>


                    <div class="form-group mt-3">
                        <label>{{ __("Name") }}</label>
                        <input type="text" class="form-control" value="{{ $category->name }}">
                    </div>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-outline card-primary px-2">
                    @include("backend.layouts.translation_languages", ["model" => "category"])

                    <div class="form-group mt-3">

                        <label>{{ __("Name") }}</label>

                        <input type="text" name="name" class="form-control" value="@if(isset($translation->name)) {{ $translation->name }} @endif">

                        @error('name')
                        <span style="font-style: normal; color: red">{{ $errors->first('name') }}</span>
                        @enderror

                    </div>
                </div>
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">@if(isset($translation->name)) {{ __("Update") }}  @else {{ __("Create") }} @endif</button>
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


