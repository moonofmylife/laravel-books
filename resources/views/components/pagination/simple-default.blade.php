@if ($paginator->hasPages())
    <ul class="uk-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="uk-disabled" uk-tooltip="@lang('pagination.previous')">
                <a href="#"><span uk-pagination-previous></span></a>
            </li>
        @else
            <li uk-tooltip="@lang('pagination.previous')">
                <a href="{{ $paginator->previousPageUrl() }}"><span uk-pagination-previous></span></a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li uk-tooltip="@lang('pagination.next')">
                <a href="{{ $paginator->nextPageUrl() }}"><span uk-pagination-next></span></a>
            </li>
        @else
            <li class="uk-disabled" uk-tooltip="@lang('pagination.next')">
                <a href="{{ $paginator->nextPageUrl() }}"><span uk-pagination-next></span></a>
            </li>
        @endif
    </ul>
@endif
