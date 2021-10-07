@if ($paginator->hasPages())
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.first')">
                <span class="page-link" aria-hidden="true">В начало</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ \Request::url() }}" rel="prev" aria-label="@lang('pagination.first')">В начало</a>
            </li>
        @endif


            @foreach ($elements as $element)

                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif



                @if (is_array($element))
                    @foreach ($element as $page => $url)


                        @if ($page == $paginator->currentPage() && $page)
                            <li class="page-item active_page"><span class="page-link activepagination">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach


        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ \Request::url().'?page='.$paginator->lastPage() }}" rel="last" aria-label="@lang('pagination.last')">В конец</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.last')">
                <span class="page-link" aria-hidden="true">В конец</span>
            </li>
        @endif
    </ul>
@endif
