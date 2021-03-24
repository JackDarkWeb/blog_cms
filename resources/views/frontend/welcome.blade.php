@extends("frontend.layouts.default", ["title" => "Home"])


@section("page_header")

    <header class="masthead" style="background-image: url({{ asset("frontend/img/home-bg.jpg") }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

@endsection




@section("content")



    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 mx-auto">

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

            <div class="col-lg-4 col-md-4">
                <div class="category">
                    <h2 class="category-title">Categories</h2>
                    <ul class="category-list">


                        @foreach(menu_categories() as $category)
                            <li>
                                <a href="{{ route_name("category.show", ["slug" => $category->slug]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>


    </div>


@endsection
