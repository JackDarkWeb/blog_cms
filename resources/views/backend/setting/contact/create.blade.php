@extends("backend.layouts.default", ['title' => "Create Content Contact"])

@section("scripts_css")

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset("backend/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("backend/dist/css/adminlte.min.css") }}">

    <link rel="stylesheet" href="{{ asset("backend/plugins/summernote/summernote-bs4.min.css") }}">



@endsection


@section("content")

<!-- Main content -->

       <div class="container-fluid">

           <form method="post" action="{{ route_name("setting-contacts.store") }}" enctype="multipart/form-data" class="row">

               @csrf

               <div class="col-lg-7">
                   <!-- general form elements -->
                   <div class="card  card-primary ">
                       <div class="card-header">
                           <h3 class="card-title">Create Content Contact</h3>
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
                               <label for="">Title</label>
                               <input type="text" name="title" class="form-control" id="" placeholder="Ex: Contact Me" value="{{ old("title") }}">

                               @error('title')
                                 <span style="font-style: normal; color: red">{{ $errors->first('title') }}</span>
                               @enderror
                           </div>

                           <div class="form-group">
                               <label for="">Sub Title</label>
                               <input type="text" name="sub_title" class="form-control" id="" placeholder="Ex: Have questions? I have answers." value="{{ old("sub_title") }}">

                               @error('sub_title')
                                 <span style="font-style: normal; color: red">{{ $errors->first('sub_title') }}</span>
                               @enderror
                           </div>

                           <div class="form-group">
                               <label>Description</label>

                               <textarea name="description" rows="4" class="form-control" placeholder="Ex : Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!"></textarea>
                               @error('description')
                                  <span style="font-style: normal; color: red">{{ $errors->first('description') }}</span>
                               @enderror
                           </div>


                       </div>


                   </div>

               </div>
               <!-- /.col-md-8 -->

               <div class="col-lg-5">
                   <div class="card card-primary">
                       <div class="card-header">
                           <h3 class="card-title">Information</h3>
                       </div>
                       <!-- /.card-header -->
                       <div class="card-body">

                           <div class="form-group">
                               <label for="">Company Name</label>
                               <input type="text" name="company_name" class="form-control" id="" placeholder="Ex: JK Blog" value="{{ old("company_name") }}">

                               @error('company_name')
                               <span style="font-style: normal; color: red">{{ $errors->first('company_name') }}</span>
                               @enderror
                           </div>

                           <div class="form-group">
                               <label for="">Location</label>
                               <input type="text" name="address" class="form-control" id="" placeholder="Ex: 327 Duffy Street" value="{{ old("address") }}">

                               @error('address')
                               <span style="font-style: normal; color: red">{{ $errors->first('address') }}</span>
                               @enderror
                           </div>

                           <div class="form-group">
                               <label for="">Phone</label>
                               <input type="text" name="phone" class="form-control" id="" placeholder="Ex:+1-202-555-0163" value="{{ old("phone") }}">

                               @error('phone')
                               <span style="font-style: normal; color: red">{{ $errors->first('phone') }}</span>
                               @enderror
                           </div>

                           <div class="form-group">
                               <label for="">Website</label>
                               <input type="text" name="website" class="form-control" id="" placeholder="https://jk.com" value="{{ old("website") }}">

                               @error('website')
                               <span style="font-style: normal; color: red">{{ $errors->first('website') }}</span>
                               @enderror
                           </div>

                           <div class="form-group">
                               <label for="">WORKING DAYS/HOURS</label>
                               <input type="text" name="program" class="form-control" id="" placeholder="Ex: Mon to Sat: 09:30 AM - 10.30 PM" value="{{ old("program") }}">

                               @error('program')
                               <span style="font-style: normal; color: red">{{ $errors->first('program') }}</span>
                               @enderror
                           </div>


                           <div class="form-group">
                               <label for="">Make the phone field required or optional</label>
                               <div class="card-body">
                                   <input type="checkbox" name="required_facultative_field_phone" checked data-toggle="toggle" data-on="Required" data-off="Optional" data-onstyle="success" value="1" data-offstyle="danger">
                               </div>
                           </div>

                       </div>
                       <!-- /.card-body -->
                   </div>
               </div>

               <div class="card-footer">
                   <button type="submit" class="btn btn-primary">Submit</button>
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

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
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
