@extends("backend.layouts.default", ['title' => "Translation Post"])

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

    <link rel="stylesheet" href="{{ asset("backend/plugins/summernote/summernote-bs4.min.css") }}">

@endsection

@section("content")

    <div class="container-fluid">

        <form method="post" action="@if(isset($translation->title)) {{ route("translation.post.update", ["lang" => app()->getLocale(), "post" => $post->id, "to_lang" => $to_lang]) }} @else {{ route("translation.post.store", ["lang" => app()->getLocale(), "post" => $post->id, "to_lang" => $to_lang]) }} @endif" class="row pb-5" enctype="multipart/form-data">

            @csrf

            @if(isset($translation->title))

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
                        <label>{{ __("Title") }}</label>
                        <input type="text" class="form-control" value="{{ $post->title }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __("Sub title") }}</label>
                        <textarea rows="4" class="form-control"> {{ $post->sub_title }} </textarea>
                    </div>

                    <div class="form-group">
                        <label for="">{{ __("Details") }}</label>

                        <textarea id="summernote">
                            {{ $post->details }}
                        </textarea>

                    </div>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-outline card-primary px-2">

                    @include("backend.layouts.translation_languages", ["model" => "post"])

                    <div class="form-group mt-3">

                        <label>{{ __("Title") }}</label>

                        <input type="text" name="title" class="form-control" value="@if(isset($translation->title)) {{ $translation->title }} @else {{ old("title") }} @endif">

                        @error('title')
                          <span style="font-style: normal; color: red">{{ $errors->first('title') }}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label>Sub title</label>
                        <textarea name="sub_title" rows="4" class="form-control"> @if(isset($translation->sub_title)) {{ $translation->sub_title }} @else {{ old("sub_title") }}  @endif</textarea>

                        @error('sub_title')
                           <span style="font-style: normal; color: red">{{ $errors->first('sub_title') }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="">Details</label>

                        <textarea id="summernote1" name="details">
                           @if(isset($translation->details)) {{ $translation->details }} @else {{ old("details") }}  @endif
                        </textarea>

                        @error('details')
                        <span style="font-style: normal; color: red">{{ $errors->first('details') }}</span>
                        @enderror

                    </div>




                </div>
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">@if(isset($translation->title)) {{ __("Update") }}  @else {{ __("Create") }} @endif</button>
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

    <!-- Summernote -->
    <script src="{{ asset("backend/plugins/summernote/summernote-bs4.min.js") }}"></script>

    <script>
        $(function () {
            // Summernote
            $('#summernote,#summernote1 ').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>

@endsection


@section("scripts")

    @include("backend.scripts.script_category")

@endsection


