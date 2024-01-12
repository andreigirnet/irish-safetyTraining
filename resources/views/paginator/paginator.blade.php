<!-- pagination.blade.php -->

@if ($paginator->hasPages())
    <div class="paginationSection">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <div aria-disabled="true"  aria-label="@lang('pagination.previous')">
                <div aria-hidden="true"><< Previous</div>
            </div>
        @else
            <div>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> << Previous </a>
            </div>
        @endif
        {{--        Display de current page--}}
        <div>Page {{$paginator->currentPage()}} from {{$paginator->lastPage()}}</div>
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <div>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> Next >> </a>
            </div>
        @else
            <div aria-disabled="true" aria-label="@lang('pagination.next')">
                <div aria-hidden="true"> Next >> </div>
            </div>
        @endif
    </div>
@endif
