@extends("frontend.layouts.default", ["title" => $page->title])


@section("page_header")

    <header class="masthead" style="background-image: url({{ asset($page->thumbnail) }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>{{ $page->title }}</h1>
                        <span class="subheading">{{ $page->sub_title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

@endsection


@section("content")

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {!! $page->details !!}
            </div>
        </div>
    </div>

@endsection



