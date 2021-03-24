@extends("frontend.layouts.default", ["title" => $post->title])


@section("page_header")

    <header class="masthead" style="background-image: url({{ asset($post->thumbnail) }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">

                        <h1>{{ $post->title }}</h1>

                        <h2 class="subheading">{{ $post->sub_title }}</h2>

                        <span class="meta">{{ __("Posted by") }}

                            <a href="#">{{ $post->user->name }}</a>

                            {{ __("on") }} {{ $post->date_post }}
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
                    {!! $post->details !!}
                </div>
            </div>
        </div>
    </article>

@endsection
