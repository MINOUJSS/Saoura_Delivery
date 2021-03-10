<div class="aside">
    <div id="min_price" data-price="@if(session()->has('searcher') && session()->get('searcher')->query['min_price']!=0){{session()->get('searcher')->query['min_price']}}@else{{$min_price}}@endif"></div>
    <div id="max_price" data-price="@if(session()->has('searcher') && session()->get('searcher')->query['max_price']!=0){{session()->get('searcher')->query['max_price']}}@else{{$max_price}}@endif"></div>
    <h3 class="aside-title">فرز حسب السعر</h3>
    <div id="price-slider"></div>
</div>