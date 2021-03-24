<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route_name("home") }}">

            @if(setting_logo_and_app_name()["active_logo"])
                <img src="{{ asset( setting_logo_and_app_name()["logo"] ) }}" style="border:0;outline:none;text-decoration:none;height:auto;width:45px;font-size:10px;">
            @endif

            @if(setting_logo_and_app_name()["active_app_name"])
                {{ setting_logo_and_app_name()["app_name"] }}
            @endif
        </a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route_name("home") }}">{{ __("Home") }}</a>
                </li>

                @foreach(all_pages() as $page)

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route_name("page.show", ["slug" => $page->slug]) }}">{{ __( $page->title ) }}</a>
                    </li>

                @endforeach

                <li class="nav-item">
                    <a class="nav-link" href="{{ route_name("contact.form") }}">{{ __("Contact") }}</a>
                </li>

                <li class="dropdown nav-item" style="display: inline-block;">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink78" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ active_language() }}</a>
                    <span class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink78">
                        @foreach(app_languages() as $lang)
                            <a class="dropdown-item" href="{{ change_language($lang["iso_code"]) }}"><span class="flag-icon flag-icon-{{ $lang["iso_code"] === "en" ? "us" :  $lang["iso_code"]}}"></span> {{ $lang["name"] }}</a>
                        @endforeach
                    </span>

                </li>
            </ul>
        </div>
    </div>
</nav>
