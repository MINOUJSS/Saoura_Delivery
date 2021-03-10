@if ($paginator->hasPages())
<ul class="reviews-pages">
    {{-- <li><span class="text-uppercase">الصفحة:</span></li> --}}
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
@else
<li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-caret-right"></i></a></li>    
@endif
{{-- Pagination Elements --}}
@foreach ($elements as $element)
{{-- "Three Dots" Separator --}}
@if (is_string($element))
    <li class="disabled" aria-disabled="true">{{ $element }}</li>
@endif

{{-- Array Of Links --}}
@if (is_array($element))
    @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
            <li class="active" aria-current="page">{{ $page }}</li>
        @else
            <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
    @endforeach
@endif
@endforeach            
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-caret-left"></i></a></li>        
    @endif
@endif