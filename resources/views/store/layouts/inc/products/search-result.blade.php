<div class="row">
    @if($products->count()>0)
    @foreach($products as $index => $product)
    <!-- Product Single -->
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="product product-single">

            <div class="product-rating pull-left">
                {{-- <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o empty"></i> --}}
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
                <a href="{{url('/product/'.$product->id)}}"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> إضغط للمشاهدة</button></a>
                {{-- <img src="{{url('store')}}/img/product01.jpg" alt=""> --}}
                <img src="{{url('/admin-css/uploads/images/products/'.$product->image)}}" alt="{{$product->name}}" height="350" width="262">
            </div>
            <div class="product-body"> 
                <h3 class="product-price">@if(has_discount($product->id)){{price_with_discount($product->selling_price,get_product_discount($product->id))}} د.ج <del class="product-old-price">{{$product->selling_price}} د.ج </del>@else {{$product->selling_price}} د.ج @endif</h3>
                
            <h2 class="product-name"><a href="#">{{substr($product->name,0,20)}}</a></h2>
                <div class="product-btns">
                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                    <a href="{{route('cart.add',$product->id)}}"><button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> أضف للسلة</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Product Single -->
    @endforeach
    @else 
    <p class="text-danger text-center"><i class="fa fa-frown-o fa-2x"></i> لا توجد منتجات بالمتجر!</p>
    @endif

    {{-- <!-- Product Single -->
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="product product-single">
            <div class="product-thumb">
                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                <img src="{{url('store')}}/img/product02.jpg" alt="">
            </div>
            <div class="product-body">
                <h3 class="product-price">$32.50</h3>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                <div class="product-btns">
                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Product Single -->

    <div class="clearfix visible-sm visible-xs"></div>

    <!-- Product Single -->
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="product product-single">
            <div class="product-thumb">
                <div class="product-label">
                    <span>New</span>
                    <span class="sale">-20%</span>
                </div>
                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                <img src="{{url('store')}}/img/product03.jpg" alt="">
            </div>
            <div class="product-body">
                <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                <div class="product-btns">
                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Product Single -->

    <div class="clearfix visible-md visible-lg"></div>

    <!-- Product Single -->
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="product product-single">
            <div class="product-thumb">
                <div class="product-label">
                    <span>New</span>
                </div>
                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                <img src="{{url('store')}}/img/product04.jpg" alt="">
            </div>
            <div class="product-body">
                <h3 class="product-price">$32.50</h3>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                <div class="product-btns">
                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Product Single -->

    <div class="clearfix visible-sm visible-xs"></div>

    <!-- Product Single -->
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="product product-single">
            <div class="product-thumb">
                <div class="product-label">
                    <span>New</span>
                </div>
                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                <img src="{{url('store')}}/img/product05.jpg" alt="">
            </div>
            <div class="product-body">
                <h3 class="product-price">$32.50</h3>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                <div class="product-btns">
                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Product Single -->

    <!-- Product Single -->
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="product product-single">
            <div class="product-thumb">
                <div class="product-label">
                    <span>New</span>
                    <span class="sale">-20%</span>
                </div>
                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                <img src="{{url('store')}}/img/product06.jpg" alt="">
            </div>
            <div class="product-body">
                <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                <div class="product-btns">
                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Product Single -->

    <div class="clearfix visible-md visible-lg visible-sm visible-xs"></div>

    <!-- Product Single -->
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="product product-single">
            <div class="product-thumb">
                <div class="product-label">
                    <span>New</span>
                    <span class="sale">-20%</span>
                </div>
                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                <img src="{{url('store')}}/img/product07.jpg" alt="">
            </div>
            <div class="product-body">
                <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                <div class="product-btns">
                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Product Single -->

    <!-- Product Single -->
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="product product-single">
            <div class="product-thumb">
                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                <img src="{{url('store')}}/img/product08.jpg" alt="">
            </div>
            <div class="product-body">
                <h3 class="product-price">$32.50</h3>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                <div class="product-btns">
                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Product Single -->

    <div class="clearfix visible-sm visible-xs"></div>

    <!-- Product Single -->
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="product product-single">
            <div class="product-thumb">
                <div class="product-label">
                    <span class="sale">-20%</span>
                </div>
                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                <img src="{{url('store')}}/img/product01.jpg" alt="">
            </div>
            <div class="product-body">
                <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                <div class="product-btns">
                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Product Single --> --}}
</div>