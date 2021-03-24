@extends("backend.layouts.default", ['title' => __("Create Gallery")])

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.css">

@endsection

@section("content")

    <div class="container-fluid">

             <div class="row justify-content-center">
                <div class="col-md-8 m-2">
                    <form method="post" action="{{ route_name('manage-galleries.store') }}" enctype="multipart/form-data" class="dropzone" id="my-awesome-dropzone">
                        @csrf

                        <div class="dz-message" data-dz-message><span>{{ __("Drop files here or click to upload") }}</span></div>

                    </form>
                </div><!-- End .col-md-8 -->
             </div><!-- End .row -->

            <div class="mb-4"></div><!-- margin -->

            <div class="form-footer justify-content-center">
                <a href="{{ route_name('manage-galleries.index') }}" class="btn btn-success btn-md">{{strtoupper(__('View all images'))}}</a>
            </div><!-- End .form-footer -->
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.js"></script>

@endsection
