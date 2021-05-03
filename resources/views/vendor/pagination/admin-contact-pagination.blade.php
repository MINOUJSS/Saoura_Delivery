@if ($paginator->hasPages())
<div class="btn-group">
    @if ($paginator->onFirstPage())
@else
<a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><button class="btn btn-default btn-sm"><i class="fa fa-chevron-right" aria-hidden="true"></i></button></a>
@endif            
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><button class="btn btn-default btn-sm"><i class="fa fa-chevron-left" aria-hidden="true"></i></button></a>        
    @endif
</div>
@endif