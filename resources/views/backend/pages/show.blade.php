@extends("frontend.layouts.default", ["title" => $page->title])


@section("page_header")

    <header class="masthead" style="background-image: url({{ asset($page->thumbnail) }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">

                        <h1>{{ $page->title }}</h1>

                        <h2 class="subheading">{{ $page->sub_title }}</h2>

                        <span class="meta">{{ __("Posted by") }}

                            <a href="#">{{ $page->user->name }}</a>

                            {{ __("on") }} {{ $page->date_post }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection


@section("content")

    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $page->details !!}
                </div>
            </div>
        </div>
    </article>

@endsection
