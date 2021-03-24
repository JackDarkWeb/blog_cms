@extends("backend.layouts.default", ['title' => "Edit Content Contact"])

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

        <form method="post" action="{{ route("setting-contacts.update", ["lang" => app()->getLocale(), "setting_contact" => $settingContact->id]) }}" class="row pb-5" enctype="multipart/form-data">

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
                            <label for="">Company Name</label>
                            <input type="text" name="company_name" class="form-control" id="" placeholder="Ex: JK Blog" value="{{ old("company_name") ?? $settingContact->company_name}}">

                            @error('company_name')
                            <span style="font-style: normal; color: red">{{ $errors->first('company_name') }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Location</label>
                            <input type="text" name="address" class="form-control" id="" placeholder="Ex: 327 Duffy Street" value="{{ old("address") ?? $settingContact->address }}">

                            @error('address')
                            <span style="font-style: normal; color: red">{{ $errors->first('address') }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" id="" placeholder="Ex:+1-202-555-0163" value="{{ old("phone") ?? $settingContact->phone }}">

                            @error('phone')
                            <span style="font-style: normal; color: red">{{ $errors->first('phone') }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="text" name="website" class="form-control" id="" placeholder="https://jk.com" value="{{ old("website") ?? $settingContact->website}}">

                            @error('website')
                            <span style="font-style: normal; color: red">{{ $errors->first('website') }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">WORKING DAYS/HOURS</label>
                            <input type="text" name="program" class="form-control" id="" placeholder="Ex: Mon to Sat: 09:30 AM - 10.30 PM" value="{{ old("program") ?? $settingContact->program }}">

                            @error('program')
                            <span style="font-style: normal; color: red">{{ $errors->first('program') }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Make the phone field required or optional</label>
                            <div class="card-body">
                                <input type="checkbox" name="required_facultative_field_phone" @if($settingContact->required_facultative_field_phone) checked @endif data-toggle="toggle" data-on="Required" data-off="Optional" data-onstyle="success" value="1" data-offstyle="danger">
                            </div>
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
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
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


