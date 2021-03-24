
@if(Session::has("message"))
    <div class="row alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get("message") }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(Session::has("error"))
    <div class="row alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get("error") }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
