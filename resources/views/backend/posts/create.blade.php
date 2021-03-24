@extends("backend.layouts.default", ['title' => "Create Post"])

@section("scripts_css")

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset("backend/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("backend/dist/css/adminlte.min.css") }}">

    <link rel="stylesheet" href="{{ asset("backend/plugins/summernote/summernote-bs4.min.css") }}">



@endsection


@section("content")

<!-- Main content -->

       <div class="container-fluid">

           <form method="post" action="{{ route_name("manage-posts.store") }}" enctype="multipart/form-data" class="row">

               @csrf

               <div class="col-lg-8">
                   <!-- general form elements -->
                   <div class="card  card-primary ">
                       <div class="card-header">
                           <h3 class="card-title">Create Post</h3>
                       </div>
                       <!-- /.card-header -->
                       <!-- form start -->
                       <div class="card-body">

                           <div class="form-group">

                               <label>{{ __("Origin language") }}</label>

                               <select class="form-control select2" name="origin_lang" style="width: 100%;">
                                   <option selected value="{{ app()->getLocale() }}">{{ \Illuminate\Support\Str::upper(app()->getLocale()) }}</option>
                               </select>
                           </div>

                           <div class="form-group">
                               <label for="">Title</label>
                               <input type="text" name="title" class="form-control" id="" placeholder="Enter a tile post" value="{{ old("title") }}">

                               @error('title')
                                 <span style="font-style: normal; color: red">{{ $errors->first('title') }}</span>
                               @enderror
                           </div>

                           <div class="form-group">
                               <label>Sub title</label>
                               <textarea name="sub_title" rows="4" class="form-control"> {{ old("sub_title") }}</textarea>

                               @error('sub_title')
                                  <span style="font-style: normal; color: red">{{ $errors->first('sub_title') }}</span>
                               @enderror
                           </div>

                           <div class="form-group">
                               <label for="">Details</label>

                               <textarea id="summernote" name="details">
                                       {{ old("details") ?? 'Place <em>some</em> <u>text</u> <strong>here</strong>' }}
                               </textarea>

                               @error('details')
                                   <span style="font-style: normal; color: red">{{ $errors->first('details') }}</span>
                               @enderror

                           </div>

                       </div>


                   </div>

               </div>
               <!-- /.col-md-8 -->

               <div class="col-lg-4">
                   <div class="card card-primary">
                       <div class="card-header">
                           <h3 class="card-title">Post</h3>
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

                                   @error('file')
                                       <span style="font-style: normal; color: red">{{ $errors->first('file') }}</span>
                                   @enderror
                               </div>

                           </div>

                           <div class="form-group">

                               <label for="exampleInputFile">Categories</label>

                               @foreach(menu_categories() as $category)

                                   <div class="custom-control custom-checkbox">
                                       <input class="custom-control-input" type="checkbox" name="category[]" id="customCheckbox{{ $category->id }}" value="{{ $category->id }}">
                                       <label for="customCheckbox{{ $category->id }}" class="custom-control-label">{{ $category->name }}</label>
                                   </div>

                               @endforeach
                           </div>

                           <div class="form-group">
                               <label>Publish</label>
                               <select name="is_published" class="form-control select2" style="width: 100%;">
                                   <option value="1" selected="selected">Yes</option>
                                   <option value="0">No</option>
                               </select>
                           </div>
                       </div>
                       <!-- /.card-body -->

                       <div class="card-footer">
                           <button type="submit" class="btn btn-primary">Submit</button>
                       </div>
                   </div>
               </div>
               <!-- /.card -->
           </form>
           <!-- /.row -->
       </div>

<!-- /.content -->


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
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>

@endsection
