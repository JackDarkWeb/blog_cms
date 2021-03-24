@extends("backend.layouts.default", ['title' => "Translation Content Contact"])

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

        <form method="post" action="@if(($translation)) {{ route("translation.contact.update", ["lang" => app()->getLocale(), "contact" => $contact->id, "to_lang" => $to_lang]) }} @else {{ route("translation.contact.store", ["lang" => app()->getLocale(), "contact" => $contact->id, "to_lang" => $to_lang]) }} @endif" class="row pb-5">

            @csrf

            @if($translation)

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
                        <input type="text" class="form-control" value="{{ $contact->title }}">
                    </div>

                    <div class="form-group mt-3">
                        <label>{{ __("Sub Title") }}</label>
                        <input type="text" class="form-control" value="{{ $contact->sub_title }}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>

                        <textarea name="description" rows="4" class="form-control" placeholder="Ex : Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!">{{ $contact->description }}</textarea>
                    </div>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-outline card-primary px-2">

                    @include("backend.layouts.translation_languages", ["model" => "contact"])

                    <div class="form-group mt-3">

                        <label>{{ __("Title") }}</label>

                        <input type="text" name="title" class="form-control" value="@if(isset($translation->title)) {{ $translation->title }} @else {{ old("title") }} @endif">

                        @error('title')
                           <span style="font-style: normal; color: red">{{ $errors->first('title') }}</span>
                        @enderror

                    </div>

                    <div class="form-group mt-3">

                        <label>{{ __("Sub Title") }}</label>

                        <input type="text" name="sub_title" class="form-control" value="@if(isset($translation->sub_title)) {{ $translation->sub_title }} @else {{ old("sub_title") }} @endif">

                        @error('sub_title')
                        <span style="font-style: normal; color: red">{{ $errors->first('sub_title') }}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label>Description</label>

                        <textarea name="description" rows="4" class="form-control" placeholder="Ex : Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!">@if(isset($translation->description)) {{ $translation->description }} @else {{ old("description") }} @endif</textarea>
                        @error('description')
                        <span style="font-style: normal; color: red">{{ $errors->first('description') }}</span>
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

@endsection


@section("scripts")

    @include("backend.scripts.script_category")

@endsection


