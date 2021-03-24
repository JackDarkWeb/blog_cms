
@if ($paginator->hasPages())


        <ul class="pagination">

            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    Previous
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-item">
                        Previous
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
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"  class="page-item">
                        Next
                    </a>
                </li>
            @else
                <li class="disabled">

                    <a class="disabled page-item">
                        Next
                    </a>
                </li>
            @endif
        </ul>
  
@endif
