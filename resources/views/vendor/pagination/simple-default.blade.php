{{-- @if ($paginator->hasPages())
    <ul class="pagination" role="navigation"> --}}
        {{-- Previous Page Link --}}
        {{-- @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
        @endif --}}

        {{-- Next Page Link --}}
        {{-- @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
        @else
            <li class="disabled" aria-disabled="true"><span>@lang('pagination.next')</span></li>
        @endif
    </ul>
@endif --}}


@if ($paginator->hasPages())
    <nav class="flexbox mt-30">
    
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Previous</a>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-white"><i class="ti-arrow-left fs-9 mr-4"></i> Previous</a>
    @endif
    
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-white">Next <i class="ti-arrow-right fs-9 ml-4"></i></a>
    @else
        <a class="btn btn-white disabled">Next <i class="ti-arrow-right fs-9 ml-4"></i></a>
    @endif
    
    </nav>
@endif