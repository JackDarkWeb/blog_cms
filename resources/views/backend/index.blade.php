@extends("backend.layouts.default", ['title' => "Dashboard"])

@section("scripts_css")

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset("backend/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("backend/dist/css/adminlte.min.css") }}">

@endsection


@section("content")

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <!-- CATEGORY LIST -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recently Added Categories</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">

                            @foreach($categories as $category)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{ asset($category->thumbnail ?? "backend/dist/img/default-150x150.png") }}" alt="Post Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">{{ $category->name }}</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.card-body -->
                    @if($categories->count())
                        <div class="card-footer text-center">
                            <a href="{{ route_name("manage-categories.index") }}" class="uppercase">View All Categories</a>
                        </div>
                    @endif
                    <!-- /.card-footer -->
                </div>


                <!-- POST LIST -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recently Added Posts</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach($posts as $post)
                               <li class="item">
                                <div class="product-img">
                                    <img src="{{ asset($post->thumbnail ?? "backend/dist/img/default-150x150.png") }}" alt="Post Image" class="img-size-50">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">{{ $post->title }}</a>
                                    <span class="product-description">
                                        {{ $post->sub_title }}
                                    </span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.card-body -->
                    @if($posts->count())
                        <div class="card-footer text-center">
                            <a href="{{ route_name("manage-posts.index") }}" class="uppercase">View All Posts</a>
                        </div>
                    @endif
                    <!-- /.card-footer -->
                </div>


                <!-- PAGE LIST -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recently Added Pages</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">

                            @foreach($pages as $page)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{ asset($page->thumbnail ?? "backend/dist/img/default-150x150.png") }}" alt="Post Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">{{ $page->title }}</a>
                                        <span class="product-description">

                                        </span>
                                    </div>
                                </li>
                            @endforeach
                            <!-- /.item -->
                        </ul>
                    </div>
                    <!-- /.card-body -->

                    @if($pages->count())
                        <div class="card-footer text-center">
                            <a href="{{ route_name("manage-pages.index") }}" class="uppercase">View All Pages</a>
                        </div>
                    @endif
                    <!-- /.card-footer -->
                </div>



                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->


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
