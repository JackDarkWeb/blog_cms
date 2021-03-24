@extends("backend.layouts.default", ['title' => "Setting Logo Or App name"])

@section("scripts_css")

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset("backend/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("backend/dist/css/adminlte.min.css") }}">




@endsection

@section("content")


    <div class="container-fluid">

        <form method="post" action="@if($settingLogo) {{ route_name("setting.logo.update") }} @else {{ route_name("setting.logo.store") }} @endif" enctype="multipart/form-data" class="row">

            @csrf

            @if($settingLogo)
                @method("PUT")
            @endif

            <div class="col-lg-6">
                <!-- general form elements -->
                <div class="card  card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">App name</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">App name</label>
                            <input type="text" name="app_name" class="form-control" id="" placeholder="Enter your app name" value="{{ $settingLogo->app_name ?? "Blog CMS" }}">

                            @error('app_name')
                            <span style="font-style: normal; color: red">{{ $errors->first('app_name') }}</span>
                            @enderror
                        </div>

                        <div class="card-body">
                            <input type="checkbox" name="active_app_name" @if(!$settingLogo || $settingLogo->active_app_name) checked @endif data-toggle="toggle" data-on="Enable" data-off="Disable" data-onstyle="success" value="1" data-offstyle="danger">
                        </div>



                    </div>


                </div>

            </div>
            <!-- /.col-md-8 -->

            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Logo</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputFile">Thumbnail</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                </div>


                            </div>
                            @error('file')
                            <span style="font-style: normal; color: red">{{ $errors->first('file') }}</span>
                            @enderror

                        </div>

                        <div class="card-body">
                            <input type="checkbox"  name="active_logo" @if(!$settingLogo  || $settingLogo->active_logo ) checked @endif data-toggle="toggle" data-on="Enable" data-off="Disable" value="1" data-onstyle="success" data-offstyle="danger">
                        </div>

                    </div>
                    <!-- /.card-body -->


                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">@if($settingLogo) {{  "Update" }} @else {{ "Create" }} @endif</button>
            </div>
            <!-- /.card -->
        </form>
        <!-- /.row -->
    </div>


@endsection


@section("scripts_js")

    <script src="{{ asset("backend/plugins/jquery/jquery.min.js") }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset("backend/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>


    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <!-- AdminLTE -->
    <script src="{{ asset("backend/dist/js/adminlte.js") }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset("backend/dist/js/demo.js") }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset("backend/dist/js/pages/dashboard3.js") }}"></script>



@endsection
