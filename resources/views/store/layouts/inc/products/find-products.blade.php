<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
        <li><a href="{{url('/')}}">الرئيسية</a></li>
            <li class="active">بحث عن منتجات</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE IN LARGE SCREEN -->
            <div id="aside" class="hidden-xs hidden-sm col-md-3">
                <!-- aside widget -->
                {{-- @include('store.layouts.inc.products.shop-by') --}}
                <!-- /aside widget -->

                <!-- aside widget -->
                {{-- @include('store.layouts.inc.products.filter-by-price') --}}
                <!-- aside widget -->

                <!-- aside widget -->
                {{-- @include('store.layouts.inc.products.filter-by-color') --}}
                <!-- /aside widget -->

                <!-- aside widget -->
                {{-- @include('store.layouts.inc.products.filter-by-size') --}}
                <!-- /aside widget -->

                <!-- aside widget -->
                {{-- @include('store.layouts.inc.products.filter-by-brand') --}}
                <!-- /aside widget -->

                <!-- aside widget -->
                {{-- @include('store.layouts.inc.products.filter-by-gender') --}}
                <!-- /aside widget -->

                <!-- aside widget -->
                @include('store.layouts.inc.products.top-rated-product')
                <!-- /aside widget -->
            </div>
            <!-- /ASIDE -->

            <!-- MAIN -->
            <div id="main" class="col-md-9">
                <!-- store top filter -->
                @include('store.layouts.inc.products.store-filter')
                <!-- /store top filter -->

                <!-- STORE -->
                <div id="store">
                    <div class="row" id="load_products">
                        @if($products->count()>0)
                        @foreach($products as $index => $product)
                        <!-- Product Single -->
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="product product-single">
                    
                                <div class="product-rating pull-left">
                                    <div name="products_ratings" data-rating="{{get_product_reating_from_id($product->id)}}"></div>
                                    <div class='product-star-{{$index}} starrr'></div>
                                </div>
                    
                                <div class="product-thumb">
                                    <div class="product-label">
                                        @if(is_new_product($product->created_at))
                                        <span>جديد</span>
                                        @endif
                                        @if(has_discount($product->id))
                                        <span class="sale">- %{{$product->discount->discount}}</span>
                                        @endif
                                    </div>
                                    <a href="{{route('store.product.details',$product->slug)}}"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> إضغط للمشاهدة</button></a>
                                    {{-- <img src="{{url('store')}}/img/product01.jpg" alt=""> --}}
                                    <img src="{{url('/admin-css/uploads/images/products/'.$product->image)}}" alt="{{$product->name}}" height="350" width="262">
                                </div>
                                <div class="product-body"> 
                                    <h3 class="product-price">@if(has_discount($product->id)){{price_with_discount($product->selling_price,get_product_discount($product->id))}} د.ج <del class="product-old-price">{{$product->selling_price}} د.ج </del>@else {{$product->selling_price}} د.ج @endif</h3>
                                    
                                <h2 class="product-name"><a href="{{route('store.product.details',$product->slug)}}">{{substr($product->name,0,100)}}</a></h2>
                                    <div class="product-btns">
                                        @if(Auth::guard('consumer')->check()) 
                                        <a id="wish_list_button{{$product->id}}" onclick="add_to_wish_list({{$product->id}})" class="main-btn icon-btn" @if(in_wish_list(Auth::guard('consumer')->user()->id,$product->id))style="color:#F8694A"@endif><i class="fa fa-heart"></i></a>
                                        <a id="compar_list_button{{$product->id}}" onclick="add_to_compar_list({{$product->id}})" class="main-btn icon-btn" @if(in_compar_list(Auth::guard('consumer')->user()->id,$product->id))style="color:#F8694A"@endif><i class="fa fa-exchange"></i></a>
                                        @endif
                                        {{-- <a href="{{route('cart.add',$product->id)}}"><button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> أضف للسلة</button></a> --}}
                                        <a onclick="add_to_cart({{$product->id}})"><button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> أضف للسلة</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Single -->
                        <div class="clearfix visible-sm visible-xs"></div>    
                        @endforeach
                        @else 
                        <p class="text-danger text-center"><i class="fa fa-frown-o fa-2x"></i> ما تبحث عنة غير موجود!</p>
                        @endif
                    </div>
                </div>
                <!-- /STORE -->

                <!-- store bottom filter -->
                @include('store.layouts.inc.products.store-filter')
                <!-- /store bottom filter -->
            </div>
            <!-- /MAIN -->
            <!-- ASIDE IN SMALL SCREEN -->
            <div id="aside" class="hidden-md hidden-lg col-md-3">
                <!-- aside widget -->
                @include('store.layouts.inc.products.top-rated-product')
                <!-- /aside widget -->
            </div>
            <!-- /ASIDE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
