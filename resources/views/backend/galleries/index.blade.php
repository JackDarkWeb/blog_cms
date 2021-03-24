@extends("backend.layouts.default", ['title' => __("Gallery")])

@section("scripts_css")

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset("backend/plugins/fontawesome-free/css/all.min.css") }}">

    <link rel="stylesheet" href="{{ asset("backend/plugins/ekko-lightbox/ekko-lightbox.css") }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("backend/dist/css/adminlte.min.css") }}">

    <link rel="stylesheet" href="{{ asset("backend/dist/css/style-post-list.css") }}">

@endsection

@section("content")


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">
                            Manage Gallery
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="mb-2">
                                <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle=""> Shuffle images </a>

                                <div class="float-right">
                                    <div class="btn-group">
                                        <a class="btn btn-success" href="{{ route_name("manage-galleries.create") }}" data-sortdesc=""> Add New Gallery </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>

                            <div class="filter-container p-0 row" style="padding: 3px; position: relative; width: 100%; display: flex; flex-wrap: wrap; height: 3627px;">

                                @foreach($galleries as $gallery)
                                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 306px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">

                                        <a href="{{ route("manage-galleries.edit", ["lang" => app()->getLocale(), "manage_gallery" => $gallery->id]) }}" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href="#deleteGalleryModal{{ $gallery->id }}"  class="delete text-danger" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>

                                        <a href="{{ asset( $gallery->url) }}" data-toggle="lightbox" data-title="{{ $gallery->user->name }}">
                                            <img src="{{ asset( $gallery->url) }}" class="img-fluid mb-2" style="height: 150px; width: 150px" alt="{{ $gallery->user->name }}">
                                        </a>
                                    </div>

                                    @include("backend.galleries.delete")
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{ $galleries->links("paginate/vendor/pagination/bootstrap-4") }}
        </div>
    </div>


@endsection


@section("scripts_js")

    <script src="{{ asset("backend/plugins/jquery/jquery.min.js") }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset("backend/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset("backend/plugins/ekko-lightbox/ekko-lightbox.min.js") }}"></script>

    <script src="{{ asset("backend/dist/js/adminlte.js") }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset("backend/dist/js/demo.js") }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset("backend/dist/js/pages/dashboard3.js") }}"></script>

    <script src="{{ asset("backend/plugins/filterizr/jquery.filterizr.min.js") }}"></script>

    <script>
        $(function () {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({gutterPixels: 3});
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>


@endsection
