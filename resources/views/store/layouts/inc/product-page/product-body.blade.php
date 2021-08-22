<div class="col-md-6">
    <div class="product-body">
        <div class="product-label">
            @if(is_new_product($product->created_at))
            <span>جديد</span>
            @endif
            @if(has_discount($product->id))
            {{-- <span class="sale">- %{{$product->discount->discount}}</span> --}}
            <span class="sale">- %{{get_product_discount($product->id)}}</span>            
            @endif
        </div>
        <h2 class="product-name">{{$product->name}}</h2>
        {{-- <h3 class="product-price">@if(has_discount($product->id)){{price_with_discount($product->selling_price,get_product_discount($product->id))}} د.ج <del class="product-old-price">{{$product->selling_price}} د.ج </del>@else {{$product->selling_price}} د.ج @endif</h3> --}}
        <h3 class="product-price">@if(has_discount($product->id)){{price_with_discount($product->id)}} د.ج <del class="product-old-price">{{$product->selling_price}} د.ج </del>@else {{$product->selling_price}} د.ج @endif</h3>
        <div>
            {{-- <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o empty"></i>
            </div> --}}
            <div id="product_ratings" data-rating="{{get_product_reating_from_id($product->id)}}"></div>
            <div class='product-star starrr'></div>

            <a href="#tab2">{{$reviews->count()}} مراجعات / إضافة مراجعة</a>
        </div>
        <p><strong>التوفر:</strong> {{product_availability($product->id)}}</p>
        <p><strong>العلامة التجارية:</strong> {{$product->brand->name}}</p>
        <p>{!!$product->long_description!!}</p>
        <div class="product-options"> 
            @if(count($product->sizes)>0)           
            <ul class="size-option">
                <li><span class="text-uppercase">المقاس:</span></li>
                @foreach($product->sizes as $size)                
                <li class="active"><a id="size-box-{{$size->id}}" style="cursor:pointer;@if(session()->has('cart') && session()->get('cart')->items[$product->id]['size_id']==$size->id){{'border:2px solid #000;'}}@endif" onclick="select_size({{$size->id}})">{{get_product_size_name_form_id_size($size->size_id)}}</a></li>
                {{-- <li><a href="#">XL</a></li>
                <li><a href="#">SL</a></li> --}}
                @endforeach
            </ul>           
            @endif        
            @if(count($product->colors)>0) 
            <ul class="color-option">                
                <li><span class="text-uppercase">اللون:</span></li>
                @foreach($product->colors as $color)
                <li class="active"><a id="color-box-{{$color->color_id}}" style="cursor:pointer;background-color:{{get_product_color_code_form_id_color($color->color_id)}};@if(session()->has('cart') && session()->get('cart')->items[$product->id]['color_id']==$color->color_id){{'border:2px solid #000;'}}@endif" onclick="select_color({{$color->color_id}})"></a></li>
                @endforeach
            </ul>
            @endif
        </div>

        <div class="product-btns">
            <div class="col-lg-9 pull-left">
            @if(session()->has('cart') && array_key_exists($product->id,session()->get('cart')->items))
            <form name="update_cart" action="{{route('cart.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="qty-input form-group col-xs-12">
                    <span class="text-uppercase">الكمية: </span>
                    <input name="qty" class="input" type="number" value="@if(old('qty')){{old('qty')}}@else{{session()->get('cart')->items[$product->id]['qty']}}@endif">
                    <input id="color_id" name="color_id" class="input" type="hidden" value="@if(old('color_id')){{old('color_id')}}@else{{session()->get('cart')->items[$product->id]['color_id']}}@endif">
                    <input id="size_id" name="size_id" class="input" type="hidden" value="@if(old('size_id')){{old('size_id')}}@else{{session()->get('cart')->items[$product->id]['size_id']}}@endif">                
                {{-- <input class="fa fa-shopping-cart primary-btn add-to-cart" type="submit" name="submit" value="أضف إلى السلة"> --}}
                <button type="submit" name="submit" value="تعديل" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> تعديل</button>
                </div>
                <div class="form-group col-xs-12">
                <button type="submit" name="checkout" value="checkout" class="primary-btn btn-danger col-xs-12"><i class="fa fa-dollar"></i> إطلبه الآن</button>
                </div>
                </form>            
            @else 
            <form name="add_to_cart" action="{{route('cart.addwithqty',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="qty-input form-group col-xs-12 pull-left">
                    <span class="text-uppercase">الكمية: </span>
                    <input name="qty" class="input" type="number" value="1">
                    <input id="color_id" name="color_id" class="input" type="hidden" value="0">
                    <input id="size_id" name="size_id" class="input" type="hidden" value="0">                
                {{-- <input class="fa fa-shopping-cart primary-btn add-to-cart" type="submit" name="submit" value="أضف إلى السلة"> --}}
                </div>
                <div class="form-group col-xs-12 col-lg-6 pull-left">
                <button type="submit" name="submit" value="submit" class="primary-btn add-to-cart col-xs-12"><i class="fa fa-shopping-cart"></i> أضف إلى السلة</button>
                </div>
                <div class="form-group col-xs-12 col-lg-6 pull-left">
                <button type="submit" name="checkout" value="checkout" class="primary-btn btn-danger col-xs-12"><i class="fa fa-dollar"></i> إطلبه الآن</button>
                </div>
                </form>
            @endif 
        </div>            
            {{-- <div class="pull-right">
                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
            </div> --}}
        </div>

    </div>
</div>