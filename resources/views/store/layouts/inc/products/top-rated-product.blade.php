@php
 $reatings=App\reating::orderBy('id','desc')->paginate(5);
 $reating_products=[];
 foreach($reatings as $reating)
 {
     if(!in_array(App\product::findOrFail($reating->product_id),$reating_products))
     {
        $reating_products[]=App\product::findOrFail($reating->product_id);
     }    
 }
@endphp
@if(count($reating_products)>0)
<div class="aside">
    <h3 class="aside-title">آخر المنتجات التي تم تقييمها</h3>
    <!-- widget product -->
    @foreach($reating_products as $index=>$product)
    @if($product->status!=1)
    <div class="product product-widget">
        <div class="product-thumb">
        <img src="{{url('/admin-css/uploads/images/products/'.$product->image)}}" alt="">
        </div>
        <div class="product-body">
            <h2 class="product-name"><a href="{{url('/product/'.$product->slug)}}">{{$product->name}}</a></h2>
            {{-- <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3> --}}
            {{-- <h3 class="product-price">@if(has_discount($product->id)){{price_with_discount($product->selling_price,get_product_discount($product->id))}} د.ج <del class="product-old-price">{{$product->selling_price}} د.ج </del>@else {{$product->selling_price}} د.ج @endif</h3> --}}
            <h3 class="product-price">@if(has_discount($product->id)){{price_with_discount($product->id)}} د.ج <del class="product-old-price">{{$product->selling_price}} د.ج </del>@else {{$product->selling_price}} د.ج @endif</h3>
            <div class="product-rating">
                {{-- <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o empty"></i> --}}
                <div name="sid_products_ratings" data-rating="{{get_product_reating_from_id($product->id)}}"></div>
                <div class='sid-product-star-{{$index}} starrr'></div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    <!-- /widget product -->
@endif

    <!-- widget product -->
    {{-- <div class="product product-widget">
        <div class="product-thumb">
            <img src="{{url('store')}}/img/thumb-product01.jpg" alt="">
        </div>
        <div class="product-body">
            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
            <h3 class="product-price">$32.50</h3>
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o empty"></i>
            </div>
        </div>
    </div> --}}
    <!-- /widget product -->
</div>