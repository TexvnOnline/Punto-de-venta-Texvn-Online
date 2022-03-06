@if ($paginator->hasPages())
    <ul class="pagination-box">
        @if ($paginator->onFirstPage())
            {{--  <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a class="Previous" aria-hidden="true">Anterior</a>
            </li>  --}}
        @else
            <li>
                <a class="Previous" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Anterior</a>
            </li>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <li>
                    <a>{{ $element }}</a>
                </li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">
                            <a>{{ $page }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li>
                <a class="Next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Siguiente</a>
            </li>
        @else
            {{--  <li aria-disabled="true" aria-label="@lang('pagination.next')">
                <a class="Next" aria-hidden="true">Siguiente</a>
            </li>  --}}
        @endif
    </ul>
@endif
