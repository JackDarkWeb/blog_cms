@extends("backend.layouts.default", ['title' => "Users"])

@section("scripts_css")

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Font Awesome Icons -->
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset("backend/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("backend/dist/css/adminlte.min.css") }}">
    <link rel="stylesheet" href="{{ asset("backend/dist/css/style-post-list.css") }}">
@endsection


@section("content")

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title bg-primary">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Manage <b>Users</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="d-none">
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="selectAll">
                                                <label for="selectAll"></label>
                                            </span>
                                    </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                               <tr>

                                   <td class="d-none">
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox3" name="options[]" value="1">
                                                <label for="checkbox3"></label>
                                            </span>
                                   </td>

                                   <td>{{ $user->name }}</td>
                                   <td>{{ $user->email }}</td>
                                   <td>89 Chiaroscuro Rd, Portland, USA</td>
                                   <td>(171) 555-2222</td>
                                   <td></td>
                                   <td>
                                       <a href="#editEmployeeModal"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                       <a href="#deleteEmployeeModal{{ $user->id }}"  class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                   </td>

                                </tr>

                                @include("backend.users.edit")

                                @include("backend.users.delete")

                                @include("backend.nopermission")

                            @endforeach

                            </tbody>
                        </table>
                        <div class="clearfix">
                            <div class="hint-text">Showing <b>{{ $users->count() }}</b> out of <b>{{ $users->total() }}</b> entries</div>

                            {{ $users->links('backend.vendor.pagination.custom2') }}

                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal HTML -->
            @include("backend.users.create")

        </div>
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

    @include("backend.scripts.script_create_user")

@endsection
