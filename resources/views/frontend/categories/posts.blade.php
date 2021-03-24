@extends("frontend.layouts.default", ["title" => "Home"])


@section("page_header")

    <header class="masthead" style="background-image: url({{ asset($category->thumbnail) }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>{{ $category->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

@endsection




@section("content")

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 mx-auto">

                @foreach($posts as $post)

                    <div class="post-preview">
                        <a href="{{ route_name("posts.show", ["slug" => $post->slug]) }}">
                            <h2 class="post-title">
                                {{ $post->title }}
                            </h2>
                            <h3 class="post-subtitle">
                                {{ $post->sub_title }}
                            </h3>
                        </a>
                        <p class="post-meta">{{ __("Posted by") }}
                            <a href="#">{{ $post->user->name }}</a>

                            {{ __("on") }} {{ $post->date_post }}

                            <span class="post-category">

                                {{ plurals($post->categories->count(), "Category", false) }} :

                                @foreach($post->categories as $category)
                                    <a href="{{ route_name("category.show", ["slug" => $category->slug]) }}">{{ $category->name }}</a>
                                @endforeach

                            </span>
                        </p>
                    </div>
                    <hr>
                @endforeach

            <!-- Pager -->
                {{ $posts->links("paginate/vendor/pagination/bootstrap-4") }}
            </div>


        </div>


    </div>


@endsection
