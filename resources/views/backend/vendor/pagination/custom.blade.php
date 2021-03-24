
@if ($paginator->hasPages())

    <div class="news_pagination">
        <ul>

            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <a class="left_side-navigation__button"><img src="{{ asset('img/arrow-down-sign-to-navigate.svg') }}" alt=""></a>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="left_side-navigation__button">
                        <img src="{{ asset('img/arrow-down-sign-to-navigate.svg') }}" alt="">
                    </a>
                </li>
            @endif



            @foreach ($elements as $element)

                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif



                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active my-active"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach



            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"  class="left_side-navigation__button">
                        <img src="{{ asset('img/arrow-down-sign-to-navigate.svg') }}" alt="">
                    </a>
                </li>
            @else
                <li class="disabled">

                    <a class="disabled left_side-navigation__button">
                        <img src="{{ asset('img/arrow-down-sign-to-navigate.svg') }}" alt="">
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif
