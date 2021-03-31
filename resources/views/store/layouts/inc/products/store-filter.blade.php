<div class="store-filter clearfix">
    <div class="pull-left">
        @if(Request::url()==route('store.product.find'))
        <div class="page-filter" >
            <h4>نتائج البحث:({{$products->count().') '.products_counter($products->count())}}</h4>
        </div>
        {{-- @else
        <div class="page-filter" >
            <h4>عدد المنتجات({{$products->count().') '.products_counter($products->count())}}</h4>
        </div> --}}
        @endif
        {{-- <div class="row-filter">
            <a href="#"><i class="fa fa-th-large"></i></a>
            <a href="#" class="active"><i class="fa fa-bars"></i></a>
        </div>
        <div class="sort-filter">
            <span class="text-uppercase">Sort By:</span>
            <select class="input">
                    <option value="0">Position</option>
                    <option value="0">Price</option>
                    <option value="0">Rating</option>
                </select>
            <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
        </div> --}}
    </div>
    <div class="pull-right">        
        {{-- <div class="page-filter">
            <span class="text-uppercase">Show:</span>
            <select class="input">
                    <option value="0">10</option>
                    <option value="1">20</option>
                    <option value="2">30</option>
                </select>
        </div>
        <ul class="store-pages">
            <li><span class="text-uppercase">Page:</span></li>
            <li class="active">1</li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
        </ul>  --}}
        <a href="{{route('consumer.wish_list')}}" class="main-btn icon-btn"><i class="fa fa-heart"></i></a>
        <a href="{{route('consumer.compar_list')}}" class="main-btn icon-btn"><i class="fa fa-exchange"></i></a>       
        {{$products->links('vendor.pagination.store-pagination')}}
    </div> 
</div>