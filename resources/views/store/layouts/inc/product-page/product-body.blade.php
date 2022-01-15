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
        <!--fack views-->
        <h4 class="fackviews">يشاهده الآن : <span id="fackviews">8</span> أشخاص</h4>
        <!--end fack views-->
        <p><strong>التوفر:</strong> {{product_availability($product->id)}}</p>
        <p><strong>العلامة التجارية:</strong> {{$product->brand->name}}</p>
        <!---->
        @if(has_discount($product->id))
        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
        <input type="hidden" name="exp_discount_date" id="exp_discount_date" value="{{$product->discount->exp_date}}">        
        <ul class="product-countdown" id="product-countdown" name="product-countdown">
                                        
        </ul>
        @endif
        <!---->
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
            <div class="col-lg-9 pull-left hidden-xs hidden-sm">
            @if(session()->has('cart') && array_key_exists($product->id,session()->get('cart')->items))
            <form name="update_cart" action="{{route('cart.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="qty-input form-group col-xs-12">
                    <span class="text-uppercase">الكمية: </span>
                    <!--add qty ntb-->
                    <span id="add_product_qty" onclick="add_product_qty_in_details()" class="btn btn-info" style="width:17%">+</span>
                    <!---->
                    <input onchange="qyt_security();" id="qty_input" name="qty" class="input" type="number" value="@if(old('qty')){{old('qty')}}@else{{session()->get('cart')->items[$product->id]['qty']}}@endif">
                    <!--min qty ntb-->
                    <span id="min_product_qty" onclick="min_product_qty_in_details()" class="btn btn-info" style="width:17%">-</span>
                    <!---->
                    <input id="color_id" name="color_id" class="input" type="hidden" value="@if(old('color_id')){{old('color_id')}}@else{{session()->get('cart')->items[$product->id]['color_id']}}@endif">
                    <input id="size_id" name="size_id" class="input" type="hidden" value="@if(old('size_id')){{old('size_id')}}@else{{session()->get('cart')->items[$product->id]['size_id']}}@endif">                
                {{-- <input class="fa fa-shopping-cart primary-btn add-to-cart" type="submit" name="submit" value="أضف إلى السلة"> --}}
                <button style="margin-top:10px" type="submit" name="submit" value="تعديل" class="col-xs-12 primary-btn add-to-cart"><i class="fa fa-edit"></i> تعديل الكمية</button>
                </div>
                <div class="form-group col-xs-12">
                <button type="submit" name="checkout" value="checkout" class="primary-btn btn-danger col-xs-12 blink"><span class="b-span"><i class="fa fa-dollar"></i> أطلبه الآن </span></button>
                </div>
                </form>            
            @else 
            <form name="add_to_cart" action="{{route('cart.addwithqty',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="qty-input form-group col-xs-12 pull-left">
                    <span class="text-uppercase">الكمية: </span>
                    <!--add qty ntb-->
                    <span id="add_product_qty" onclick="add_product_qty_in_details()" class="btn btn-info" style="width:17%">+</span>
                    <!---->
                    <input onchange="qyt_security();" id="qty_input" name="qty" class="input" type="number" value="1">
                    <!--min qty ntb-->
                    <span id="min_product_qty" onclick="min_product_qty_in_details()" class="btn btn-info" style="width:17%">-</span>
                    <!---->
                    <input id="color_id" name="color_id" class="input" type="hidden" value="0">
                    <input id="size_id" name="size_id" class="input" type="hidden" value="0">                
                {{-- <input class="fa fa-shopping-cart primary-btn add-to-cart" type="submit" name="submit" value="أضف إلى السلة"> --}}
                </div>
                <div class="form-group col-xs-12 col-lg-6 pull-left">
                <button type="submit" name="submit" value="submit" class="primary-btn add-to-cart col-xs-12"><i class="fa fa-shopping-cart"></i> أضف للسلة</button>
                </div>
                <div class="form-group col-xs-12 col-lg-6 pull-left">
                <button type="submit" name="checkout" value="checkout" class="primary-btn btn-danger col-xs-12 blink"><span class="b-span"><i class="fa fa-dollar"></i> أطلبه الآن</span></button>
                </div>
                </form>
            @endif 
        </div>            
            {{-- <div class="pull-right">
                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
            </div> --}}
        <div class="fix-order-btn hidden-md hidden-lg">
            @if(session()->has('cart') && array_key_exists($product->id,session()->get('cart')->items))
            <form name="update_cart" action="{{route('cart.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                    {{-- <span class="text-uppercase">الكمية: </span> --}}
                    <!--add qty ntb-->
                    <span id="xs_add_product_qty" onclick="add_product_qty_in_details()" class="btn btn-info">+</span>
                    <!---->
                    <input id="xs_qty_input" name="qty" class="input" style="width:40px" type="number" value="@if(old('qty')){{old('qty')}}@else{{session()->get('cart')->items[$product->id]['qty']}}@endif">
                    <!--min qty ntb-->
                    <span id="xs_min_product_qty" onclick="min_product_qty_in_details()" class="btn btn-info">-</span>
                    <!---->
                    <input id="color_id" name="color_id" class="input" type="hidden" value="@if(old('color_id')){{old('color_id')}}@else{{session()->get('cart')->items[$product->id]['color_id']}}@endif">
                    <input id="size_id" name="size_id" class="input" type="hidden" value="@if(old('size_id')){{old('size_id')}}@else{{session()->get('cart')->items[$product->id]['size_id']}}@endif">                
                {{-- <input class="fa fa-shopping-cart primary-btn add-to-cart" type="submit" name="submit" value="أضف إلى السلة"> --}}
                <button style="margin-top:10px" type="submit" name="submit" value="تعديل" class="primary-btn add-to-cart"><i class="fa fa-edit"></i> تعديل الكمية</button>
                <button type="submit" name="checkout" value="checkout" style="margin-top:5px;width:100%;" class="primary-btn btn-danger col-xs-12 blink"><span class="b-span"><i class="fa fa-dollar"></i> أطلبه الآن</span></button>
                </div>
                </form>            
            @else 
            <form name="add_to_cart" action="{{route('cart.addwithqty',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                    {{-- <span class="text-uppercase">الكمية: </span> --}}
                    <!--add qty ntb-->
                    <span id="xs_add_product_qty" onclick="add_product_qty_in_details()" class="btn btn-info" >+</span>
                    <!---->
                    <input id="xs_qty_input" name="qty" class="input" style="width:40px;" type="number" value="1">
                    <!--min qty ntb-->
                    <span id="xs_min_product_qty" onclick="min_product_qty_in_details()" class="btn btn-info">-</span>
                    <!---->
                    <input id="color_id" name="color_id" class="input" type="hidden" value="0">
                    <input id="size_id" name="size_id" class="input" type="hidden" value="0">                
                {{-- <input class="fa fa-shopping-cart primary-btn add-to-cart" type="submit" name="submit" value="أضف إلى السلة"> --}}
                <button type="submit" name="submit" value="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>إلى السلة</button>
                <button type="submit" name="checkout" value="checkout" style="margin-top:5px;width:100%;" class="primary-btn btn-danger blink"><span class="b-span"><i class="fa fa-dollar"></i> أطلبه الآن</span></button>
                </div>
                </form>
            @endif        
            </div>
        </div>

    </div>
</div>

<script> 
        function deal_count_down(product_id)
        {
            exp_discount_date=document.getElementById('exp_discount_date').value;        
            now  = new Date();
            diff = Date.parse(exp_discount_date) - now;
            secs=Math.floor(diff/1000);
            mins=Math.floor(diff/(1000*60));
            hours=Math.floor(diff/(1000*60*60));
            days=Math.floor(diff/(1000*60*60*24));
    
            d=days;
            h=hours - days * 24;
            m= mins - hours *60;
            s =secs - mins * 60;

                if(d>10 && h>10 && m>10){
                    document.getElementById('product-countdown').innerHTML='<li><span>'+d+' ي</span></li>'+'<li><span>'+h+' سا</span></li>'+'<li><span>'+m+' د</span></li>';         
                }else if(d>10 && h>10 && m<10)
                {
                    document.getElementById('product-countdown').innerHTML='<li><span>'+d+' ي</span></li>'+'<li><span>'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'; 
                }else if(d>10 && h<10 && m<10)
                {
                    document.getElementById('product-countdown').innerHTML='<li><span>'+d+' ي</span></li>'+'<li><span>0'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'; 
                }else if(d>10 && h<10 && m>10)
                {
                    document.getElementById('product-countdown').innerHTML='<li><span>'+d+' ي</span></li>'+'<li><span>0'+h+' سا</span></li>'+'<li><span>'+m+' د</span></li>'; 
                }else if(d<10 && d>=1 && h>10 && m>10)
                {
                    document.getElementById('product-countdown').innerHTML='<li><span>0'+d+' ي</span></li>'+'<li><span>'+h+' سا</span></li>'+'<li><span>'+m+' د</span></li>'; 
                }else if(d<10 && d>=1 && h>10 && m<10)
                {
                    document.getElementById('product-countdown').innerHTML='<li><span>0'+d+' ي</span></li>'+'<li><span>'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'; 
                }else if(d<10 && d>=1 && h<10 && m<10)
                {
                    document.getElementById('product-countdown').innerHTML='<li><span>0'+d+' ي</span></li>'+'<li><span>0'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'; 
                }
                else if(d<10 && d>=1 && h<10 && m>10)
                {
                    document.getElementById('product-countdown').innerHTML='<li><span>0'+d+' ي</span></li>'+'<li><span>'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'; 
                }else if(d==0 && h>10 && m>10 && s>10)
                {
                    document.getElementById('product-countdown').innerHTML='<li><span>'+h+' سا</span></li>'+'<li><span>'+m+' د</span></li>'+'<li><span>'+s+' ثا</span></li>'; 
                }else if(d==0 && h>10 && m>10 && s<10)
                {
                    document.getElementById('product-countdown').innerHTML='<li><span>'+h+' سا</span></li>'+'<li><span>'+m+' د</span></li>'+'<li><span>0'+s+' ثا</span></li>'; 
                }else if(d==0 && h>10 && m<10 && s<10)
                {
                    document.getElementById('product-countdown').innerHTML='<li><span>'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'+'<li><span>0'+s+' ثا</span></li>'; 
                }else if(d==0 && h<10 && m<10 && s<10)
                {
                    document.getElementById('product-countdown').innerHTML='<li><span>0'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'+'<li><span>0'+s+' ثا</span></li>'; 
                }else if(d==0 && h<10 && m<10 && s>10)
                {
                    document.getElementById('product-countdown').innerHTML='<li><span>0'+h+' ي</span></li>'+'<li><span>0'+m+' د</span></li>'+'<li><span>'+s+' ثا</span></li>'; 
                }else if(d==0 && h<10 && m>10 && s>10)
                {
                    document.getElementById('product-countdown').innerHTML='<li><span>0'+h+' سا</span></li>'+'<li><span>'+m+' د</span></li>'+'<li><span>'+s+' ثا</span></li>'; 
                }           
        }
        const  product_id=document.getElementById('product_id').value;                                                                             
                setInterval('deal_count_down(product_id)',1000);

                function test(exp_date)
{
    now  = new Date();
        diff = Date.parse(exp_date) - now;
        //alert(exp_discount_date);
        secs=Math.floor(diff/1000);
        mins=Math.floor(diff/(1000*60));
        hours=Math.floor(diff/(1000*60*60));
        days=Math.floor(diff/(1000*60*60*24));

        d=days;
        h=hours - days * 24;
        m= mins - hours * 60;
        s =secs - mins * 60;        
        return  "day:"+d+"heur: "+h+" min: "+m+" sec: "+s
} 
// alert(test(product_id)); 
function qyt_security()
{
    if(document.getElementById('qty_input').value<=1)
        {
            document.getElementById('qty_input').value=1;
        }
} 
    </script>