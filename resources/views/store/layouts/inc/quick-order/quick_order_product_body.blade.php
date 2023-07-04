<div class="col-md-6">
    <div class="product-body">
        <!--if is admin-->        
        @if(Auth::guard('admin')->user()!=null && Auth::guard('admin')->user()->id==1)
        <div class="row">
            <div class="admin-btn-control">
            <div class="col-lg-4" style="margin:5px;">                                                         
                <a target="blank" href="{{url('admin/product').'/'.$product->id.'/edit'}}" class="btn btn-block btn-info btn-flat"><i class="fa fa-edit"> تعديل المنتج </i></a>
            </div>
            @if($product->dropsheping_url!="")
            <div class="col-lg-4" style="margin:5px;">                                                         
                <a target="blank" href="{{$product->dropsheping_url }}" class="btn btn-block btn-primary btn-flat"><i class="fa fa-shopping-cart"> طلب المنتج </i></a>
            </div>
            @endif
             </div>
        </div>
        @endif
        <!--end if is admin-->
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
        <h4 class="fackviews">يشاهده الآن : <span id="fackviews"></span> أشخاص</h4>
        <!--end fack views-->
        <h5><strong>التوفر:</strong> <span style="color:#F8694A">{{product_availability($product->id)}}</span></h5>
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
                {{-- {{dd()}}                 --}}
                {{-- <li class="active"><a id="size-box-{{$size->size_id}}" style="cursor:pointer;@if(session()->has('cart') && session()->get('cart')->items[$product->id]['size_id']==$size->size_id){{'border:2px solid #000;'}}@endif" onclick="select_size({{$size->size_id}},{{$product->id}})">{{get_product_size_name_form_id_size($size->size_id)}}</a></li> --}}
                <li class="active"><a id="size-box-{{$size->size_id}}" style="cursor:pointer;" onclick="select_size({{$size->size_id}},{{$product->id}}),change_product_size({{$size->size_id}})">{{get_product_size_name_form_id_size($size->size_id)}}</a></li>
                {{-- <li><a href="#">XL</a></li>
                <li><a href="#">SL</a></li> --}}
                @endforeach
            </ul>           
            @endif        
            @if(count($product->colors)>0) 
            <ul class="color-option">                
                <li><span class="text-uppercase">اللون:</span></li>
                @foreach($product->colors as $color)
                {{-- <li class="active"><a id="color-box-{{$color->color_id}}" style="cursor:pointer;background-color:{{get_product_color_code_form_id_color($color->color_id)}};@if(session()->has('cart') && session()->get('cart')->items[$product->id]['color_id']==$color->color_id){{'border:2px solid #000;'}}@endif" onclick="select_color({{$color->color_id}},{{$product->id}})"></a></li> --}}
                <li class="active"><a id="color-box-{{$color->color_id}}" style="cursor:pointer;background-color:{{get_product_color_code_form_id_color($color->color_id)}};" onclick="select_color({{$color->color_id}},{{$product->id}}),change_product_color({{$color->color_id}})"></a></li>
                @endforeach
            </ul>
            @endif
        </div>
        <!--start test-->
        <form name="order-form" id="checkout-form" class="clearfix" action="{{route('store.create.quick.order')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!---->          
                       <input type="hidden" name="product_id" value="{{$product->id}}">
                       <input type="hidden" name="product_qty" id="product_qty" value="1">                           
                       <input type="hidden" name="product_color" id="product_color" value="0">
                       <input type="hidden" name="product_size" id="product_size" value="0">        
            <!---->
            {{-- @if(session()->has('cart')) --}}
            <div class="col-md-6" style="margin-top:10px;">
                <div class="billing-details">
                    {{-- @if(!Auth::guard('consumer')->check())
                    <p>زبون في المتجر ؟ <a href="{{route('consumer.login')}}">تسجيل الدخول</a></p>
                    @endif --}}
                    <div class="section-title">
                        <h3 id="quick-order" class="title">بيانات الطالب</h3>
                    </div>
                    <input type="hidden" name="total" value="@if(has_discount($product->id)){{price_with_discount($product->id)}}@else{{$product->selling_price}}@endif">
                    <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                        <input class="input" type="hidden" name="name" placeholder="الإسم" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->name}}@else{{old('name')}}@endif" @if(!Auth::guard('consumer')->check())disabled @endif>                            
                        <input class="input" type="text" name="name" placeholder="الإسم (مطلوب)" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->name}}@else{{old('name')}}@endif" @if(Auth::guard('consumer')->check())disabled @endif>
                        @if($errors->has('name'))
                        <span class="help-block">
                        {{ $errors->first('name')}}
                        </span>
                        @endif
                    </div>
             
                    <div class="form-group {{$errors->has('tel')? 'has-error':''}}">
                        <input class="input" type="hidden" name="tel" placeholder="رقم الجوال" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->telephone}}@else{{old('tel')}}@endif" @if(!Auth::guard('consumer')->check())disabled @endif>
                        <input class="input" type="tel" name="tel" placeholder="رقم الجوال (مطلوب)" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->telephone}}@else{{old('tel')}}@endif" @if(Auth::guard('consumer')->check())disabled @endif>
                        @if($errors->has('tel'))
                        <span class="help-block">
                        {{ $errors->first('tel')}}
                        </span>
                        @endif
                    </div>

                    <div class="form-group {{$errors->has('address')? 'has-error':''}}">
                        <input class="input" type="hidden" name="address" placeholder="عنوان إستلام المنتجات" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->address}}@else{{old('address')}}@endif" @if(!Auth::guard('consumer')->check())disabled @endif>
                        <input class="input" type="text" name="address" placeholder="الولاية و البلدية و عنوان إستلام المنتجات (مطلوب)" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->address}}@else{{old('address')}}@endif" @if(Auth::guard('consumer')->check() && Auth::guard('consumer')->user()->address!='')disabled @endif>
                        @if($errors->has('address'))
                        <span class="help-block">
                        {{ $errors->first('address')}}
                        </span>
                        @endif
                    </div>                    
                    <!--test move submit btn-->
                    <div class="form-group">
                    <div>
                        <button class="primary-btn"><span class="b-span"><i class="fa fa-arrow-circle-left"> تقديم الطلب</i></span></button>
                    </div>      
                    </div>
                    
                </div>
            </div>

            <div class="col-md-6">
                <div class="shiping-methods">
                    <div class="section-title">
                        <h4 class="title">طرق الدفع</h4>
                    </div>
                    <div class="input-checkbox">
                        <input type="radio" name="shipping" id="shipping-1" checked>
                        <label for="shipping-1">الدفع عند الإستلام</label>
                        <div class="caption">
                            <p>زبوننا المحترم يرجى التأكد من صحة العنوان و رقم الهاتف ليتمكن مندوبنا من التواصل معك لإستلام منتجاتك.
                                <p>
                                    
                        </div>
                    </div>
                    
                </div>
                   
                </form>
        <!--end test-->
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
function change_product_color(color_id)
{
    document.getElementById('product_color').value=color_id; 
}
function change_product_size(size_id)
{
    document.getElementById('product_size').value=size_id;
}
    </script>