 @if(count($dis_products)>0)
<div class="section">
    <!-- container -->
    <div class="container">
        {{-- @if(count($dis_products)>0) --}}
        <!-- row -->
        <div class="row">
            <!-- section-title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">عروض اليوم</h2>
                    <div class="pull-right">
                        <div class="product-slick-dots-1 custom-dots"></div>
                    </div>
                </div>
            </div>
            <!-- /section-title -->

            <!-- banner -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                @if($sid_deal!==null)
                <div class="banner banner-2">
                    {{-- <img src="{{url('store')}}/img/banner14.jpg" alt="" height="438" width="263"> --}}
                    <img src="{{url('admin-css/uploads/images/deals').'/'.$sid_deal->image}}" alt="" height="438" width="263">
                    <div class="banner-caption">
                        <h2 class="white-color">{{$sid_deal->title}}</h2>
                        <a href="{{$sid_deal->link}}"><button class="primary-btn">إشتري الآن</button></a>
                    </div>
                </div>
                @endif
            </div>
            <!-- /banner -->

            <!-- Product Slick -->
            <div class="col-md-9 col-sm-6 col-xs-6">
                <div class="row">
                    <div id="product-slick-1" class="product-slick">

                        @foreach($dis_products as $index => $product)                                                                                                
                        <!-- Product Single -->
                        <div class="col-md-4 col-sm-6 col-xs-6" style="direction: rtl;">
                            <div class="product product-single">                                
                                {{-- <script>
                                    $(document).ready(function(){
                                        countDown('{{$index}}','{{$product->discount->exp_date}}');
                                    });                                    
                                </script> --}}
                                <div class="product-rating pull-left">
                                    <div name="deal_products_ratings" data-rating="{{get_product_reating_from_id($product->id)}}"></div>
                                    <div class='deal-product-star-{{$index}} starrr'></div>
                                </div>

                                <div class="product-thumb">
                                    <div class="product-label">
                                        @if(is_new_product($product->created_at))
                                        <span>جديد</span>
                                        @endif
                                        @if(has_discount($product->id))
                                        <span class="sale">- %{{get_product_discount($product->id)}}</span>
                                        @endif
                                    </div>                                   
                                    {{-- <input type="hidden" id="dis_prod_ids" value="{{print_r($dis_product_ids)}}"> --}}
                                    {{-- <input type="hidden" name="" id="product_id" value="{{$product->id}}"> --}}
                                    <input type="hidden"  class="exp_discount_date{{$product->id}}" name="exp_discount_date{{$product->id}}" id="exp_discount_date{{$product->id}}" value="{{$product->discount->exp_date}}">
                                    <input type="hidden" class="product_has_dis_id{{$product->id}}" name="product_has_dis_id{{$product->id}}" id="product_has_dis_id{{$product->id}}" value="{{$product->id}}">
                                    <ul class="product-countdown" id="product-countdown{{$product->id}}" name="product-countdown{{$product->id}}">
                                        
                                    </ul>                                                                   
                                    {{-- <input type="hidden" id="countdown" onclick="countDown('{{$index}}','{{$product->discount->exp_date}}')">--}} 
                                    <a href="{{url('/product/'.$product->slug)}}"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> إضغط للمشاهدة</button></a>
                                    {{-- <img src="{{url('store')}}/img/product01.jpg" alt=""> --}}
                                    <img src="{{url('/admin-css/uploads/images/products/'.$product->image)}}" alt="{{$product->name}}">
                                </div>
                                <div class="product-body"> 
                                    <h3 class="product-price">@if(has_discount($product->id)){{price_with_discount($product->id)}} د.ج <br><del class="product-old-price">{{$product->selling_price}} د.ج </del>@else {{$product->selling_price}} د.ج @endif</h3>
                                    
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
                        @php
                            $products_ids[]=$product->id;
                            $p_ids_string='';
                        @endphp                                                 
                        @endforeach                        
                        <!--convert array to string-->
                         @foreach ($products_ids as $index=>$id)                         
                          @php
                          if($index+1>=count($products_ids)){ 
                             $p_ids_string.=''.$id.'';
                          }else
                          {
                            $p_ids_string.=''.$id.',';
                          }
                          @endphp
                         @endforeach  
                         <input type="hidden" name="products_ids_array" id="products_ids_array" value="{{$p_ids_string}}">                                                                       
                    </div>
                </div>
            </div>
            <!-- /Product Slick -->
        </div>
        <!-- /row -->
{{-- @endif --}}
        {{-- <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Deals Of The Day</h2>
                    <div class="pull-right">
                        <div class="product-slick-dots-2 custom-dots">
                        </div>
                    </div>
                </div>
            </div>
            <!-- section title -->

            <!-- Product Single -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="product product-single product-hot">
                    <div class="product-thumb">
                        <div class="product-label">
                            <span class="sale">-20%</span>
                        </div>
                        <ul class="product-countdown">
                            <li><span>00 H</span></li>
                            <li><span>00 M</span></li>
                            <li><span>00 S</span></li>
                        </ul>
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
            <!-- /Product Single -->

            <!-- Product Slick -->
            <div class="col-md-9 col-sm-6 col-xs-6">
                <div class="row">
                    <div id="product-slick-2" class="product-slick">
                        <!-- Product Single -->
                        <div class="product product-single">
                            <div class="product-thumb">
                                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                                <img src="{{url('store')}}/img/product06.jpg" alt="">
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
                        <!-- /Product Single -->

                        <!-- Product Single -->
                        <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    <span class="sale">-20%</span>
                                </div>
                                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                                <img src="{{url('store')}}/img/product05.jpg" alt="">
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
                        <!-- /Product Single -->

                        <!-- Product Single -->
                        <div class="product product-single">
                            <div class="product-thumb">
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
                        <!-- /Product Single -->

                        <!-- Product Single -->
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
                        <!-- /Product Single -->

                    </div>
                </div>
            </div>
            <!-- /Product Slick -->
        </div>
        <!-- /row --> --}}
    </div>
    <!-- /container -->
</div>
@endif
<!--------------------------->
@if(count($dis_products)>0)
<script> 
// function test(exp_date)
// {
//     now  = new Date();
//         diff = Date.parse(exp_date) - now
//         //alert(exp_discount_date);
//         secs=Math.floor(diff/1000);
//         mins=Math.floor(diff/(1000*60));
//         hours=Math.floor(diff/(1000*60*60));
//         days=Math.floor(diff/(1000*60*60*24));

//         d=days;
//         h=hours - days * 24;
//         m= mins - hours *60;
//         s =secs - mins * 60;        
//         return  "day:"+d+"heur: "+h+" min: "+m+" sec: "+s
// } 
//alert(test('2021-10-14 20:30:03'));  
    function deal_count_down(products_ids)
    {
        for(var i = 0 ; i < products_ids.length ; i++){
        exp_discount_date=document.getElementById('exp_discount_date'+products_ids[i]).value;        
        now  = new Date();
        diff = Date.parse(exp_discount_date) - now;
        //alert(exp_discount_date);
        secs=Math.floor(diff/1000);
        mins=Math.floor(diff/(1000*60));
        hours=Math.floor(diff/(1000*60*60));
        days=Math.floor(diff/(1000*60*60*24));

        d=days;
        h=hours - days * 24;
        m= mins - hours *60;
        s =secs - mins * 60;
        //alert("day:"=d+"heur:" +h+"min:"+m+"sec:"+s);
            if(d>10 && h>10 && m>10){
                document.getElementById('product-countdown'+products_ids[i]).innerHTML='<li><span>'+d+' ي</span></li>'+'<li><span>'+h+' سا</span></li>'+'<li><span>'+m+' د</span></li>';         
            }else if(d>10 && h>10 && m<10)
            {
                document.getElementById('product-countdown'+products_ids[i]).innerHTML='<li><span>'+d+' ي</span></li>'+'<li><span>'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'; 
            }else if(d>10 && h<10 && m<10)
            {
                document.getElementById('product-countdown'+products_ids[i]).innerHTML='<li><span>'+d+' ي</span></li>'+'<li><span>0'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'; 
            }else if(d>10 && h<10 && m>10)
            {
                document.getElementById('product-countdown'+products_ids[i]).innerHTML='<li><span>'+d+' ي</span></li>'+'<li><span>0'+h+' سا</span></li>'+'<li><span>'+m+' د</span></li>'; 
            }else if(d<10 && d>0 && h<10 && m>10)
            {
                document.getElementById('product-countdown'+products_ids[i]).innerHTML='<li><span>0'+d+' ي</span></li>'+'<li><span>0'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'; 
            }else if(d<10 && d>0 && h>10 && m<10)
            {
                document.getElementById('product-countdown'+products_ids[i]).innerHTML='<li><span>0'+d+' ي</span></li>'+'<li><span>'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'; 
            }else if(d<10 && d>0 && h<10 && m<10)
            {
                document.getElementById('product-countdown'+products_ids[i]).innerHTML='<li><span>0'+d+' ي</span></li>'+'<li><span>0'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'; 
            }else if(d<10 && d>0 && h>10 && m>10 && s<10)
            {
                document.getElementById('product-countdown'+products_ids[i]).innerHTML='<li><span>0'+d+' ي</span></li>'+'<li><span>'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'; 
            }else if(d<10 && d>0 && h>10 && m>10)
            {
                document.getElementById('product-countdown'+products_ids[i]).innerHTML='<li><span>0'+d+' ي</span></li>'+'<li><span>0'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'; 
            }else if(d<=0 && h>10 && m>10 && s>10)
            {
                document.getElementById('product-countdown'+products_ids[i]).innerHTML='<li><span>'+h+' سا</span></li>'+'<li><span>'+m+' د</span></li>'+'<li><span>'+s+' ثا</span></li>'; 
            }else if(d<=0 && h>10 && m>10 && s<10)
            {
                document.getElementById('product-countdown'+products_ids[i]).innerHTML='<li><span>'+h+' سا</span></li>'+'<li><span>'+m+' د</span></li>'+'<li><span>0'+s+' ثا</span></li>'; 
            }else if(d<=0 && h>10 && m<10 && s<10)
            {
                document.getElementById('product-countdown'+products_ids[i]).innerHTML='<li><span>'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'+'<li><span>0'+s+' ثا</span></li>'; 
            }else if(d<=0 && h<10 && m<10 && s<10)
            {
                document.getElementById('product-countdown'+products_ids[i]).innerHTML='<li><span>0'+h+' سا</span></li>'+'<li><span>0'+m+' د</span></li>'+'<li><span>0'+s+' ثا</span></li>'; 
            }else if(d<=0 && h<10 && m<10 && s>10)
            {
                document.getElementById('product-countdown'+products_ids[i]).innerHTML='<li><span>0'+h+' ي</span></li>'+'<li><span>0'+m+' د</span></li>'+'<li><span>'+s+' ثا</span></li>'; 
            }else if(d<=0 && h<10 && m>10 && s>10)
            {
                document.getElementById('product-countdown'+products_ids[i]).innerHTML='<li><span>0'+h+' سا</span></li>'+'<li><span>'+m+' د</span></li>'+'<li><span>'+s+' ثا</span></li>'; 
            }
        }
    }
    //setInterVal(deal_count_down('2021-10-07 19:17:40',4),1000);
    // setInterval('deal_count_down('+"'"+'2021-10-07 19:17:40'+"'"+',4)',1000);
    const  products_ids_array=document.getElementById('products_ids_array').value.split(',');
          //alert(products_ids_array);                                                              
            setInterval('deal_count_down(products_ids_array)',1000);
</script>
{{-- <script>
    function countDown(product_ids)
   {
    
    product_ids.forEach(element => {
        //alert(element);   
       setInterval(() => {
        setTimeout(() => {
           var target=document.getElementsByName('product-countdown'+element);
        $(target).load('/load-dis-products/'+element);
        },1000);    
   }, 1000);
    

             }); 
     
   }                                                                                        
      
       countDown({{$p_ids_string}});
       
</script> --}}
@endif