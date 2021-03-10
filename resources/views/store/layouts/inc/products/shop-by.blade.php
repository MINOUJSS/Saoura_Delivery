<div id="searcher_data" class="aside">
    <h3 class="aside-title">تسوق مع مراعات:</h3>
    @if(session()->has('searcher'))
    @if(count(session()->get('searcher')->query['colors']) > 0)
    <ul class="filter-list">        
        <li><span class="text-uppercase">الألوان:</span></li>
        @foreach(session()->get('searcher')->query['colors'] as $index=>$color_id)
        <li><a onclick="delete_color_to_searcher({{$index}})" style="color:#FFF; background-color:{{get_color_code_from_id($color_id)}};">{{get_color_name_from_id($color_id)}}</a></li>
        @endforeach        
    </ul>
    @endif
    @if(count(session()->get('searcher')->query['sizes']) > 0)
    <ul class="filter-list">
        <li><span class="text-uppercase">المقاسات:</span></li>
        @foreach(session()->get('searcher')->query['sizes'] as $index=>$size_id)
        <li><a onclick="delete_size_to_searcher({{$index}})">{{get_product_size_form_id_size($size_id)}}</a></li>
        @endforeach        
    </ul>
    @endif
    @if(count(session()->get('searcher')->query['brands']) > 0)
    <ul class="filter-list">
        <li><span class="text-uppercase">العلامات التجارية:</span></li>
        @foreach(session()->get('searcher')->query['brands'] as $index=>$brand_id)
        <li><a onclick="delete_size_to_searcher({{$index}})">{{get_product_brand_name_form_id_brand($brand_id)}}</a></li>
        @endforeach        
    </ul>
    @endif
    @if((session()->get('searcher')->query['min_price']!=0 || session()->get('searcher')->query['max_price']!=0))
    <ul class="filter-list">
        <li><span class="text-uppercase">الأسعار:</span></li>
        @if(session()->get('searcher')->query['min_price']!=0)
        <li><a onclick="delete_min_price_to_searcher()">إبتداءا من: <span id="min_price_value">{{session()->get('searcher')->query['min_price']}}</span> د.ج</a></li>
        @endif
        @if(session()->get('searcher')->query['max_price']!=0)
        <li><a onclick="delete_max_price_to_searcher()">إلى غاية: <span id="max_price_value">{{session()->get('searcher')->query['max_price']}}</span> د.ج</a></li>
        @endif
    </ul>
    @endif
    <!-- <ul class="filter-list">
        <li><span class="text-uppercase">Gender:</span></li>
        <li><a href="#">Men</a></li>
    </ul> -->

    <a href="{{route('searcher.forget')}}"><button class="primary-btn">إمسح الكل</button></a>
    @else
<ul class="filter-list">
    <li><span class="text-uppercase">لم يتم بعد إختيار التقيدات لفرز المنتجات</span></li>
</ul>
@endif
</div>
