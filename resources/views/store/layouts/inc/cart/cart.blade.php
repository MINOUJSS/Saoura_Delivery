<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('store')}}">الرئيسية</a></li>
            <li class="active">السلة</li>
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

                <div class="col-md-12">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">محتوى السلة</h3>
                        </div>
                        @if(session()->has('cart'))
                        <!--start show this table in larg screen-->
                        <table class="shopping-cart-table table hidden-xs">
                            <thead>
                                <tr>
                                    <th>المنتج</th>
                                    <th></th>
                                    <th class="text-center">السعر</th>
                                    <th class="text-center">الكمية</th>
                                    <th class="text-center">المجموع</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(session()->has('cart'))
                                @foreach(session()->get('cart')->items as $item)
                                <tr>                                
                                <td class="thumb"><img src="{{url('admin-css/uploads/images/products/'.$item['image'])}}" alt=""></td>
                                    <td class="details">
                                        <a href="{{url('product/'.make_slug($item['title']))}}">{{$item['title']}}</a>
                                        {{-- <ul>
                                            <li><span>Size: XL</span></li>
                                            <li><span>Color: Camelot</span></li>
                                        </ul>  --}}
                                        <form action="{{route('cart.update',$item['id'])}}" method="POST" enctype="multipart/form-data">
                                            @csrf                                       
                                        {!!print_product_colors_lg_html($item['id'])!!}
                                        {!!print_product_sizes_lg_html($item['id'])!!}
                                    </td>
                                    {{-- <td class="price text-center"><strong>{{$item['price']}} دج</strong><br><del class="font-weak"><small>$40.00</small></del></td> --}}
                                    <td class="price text-center">@if(has_discount($item['id']))<strong>{{$item['price']}} د.ج</strong><br><del class="font-weak"><small>{{get_product_price_by_id($item['id'])}}</small></del>@else <strong>{{get_product_price_by_id($item['id'])}} </strong>@endif</td>
                                    <td class="qty text-center">
                                        
                                        <input type="hidden" name="product_price" id="product_price-lg-{{$item['id']}}" value="@if(has_discount($item['id'])){{$item['price']}}@else{{get_product_price_by_id($item['id'])}}@endif">
                                        <input onchange="calculate_total_lg({{$item['id']}});update_qty_lg({{$item['id']}});" id="qty-lg-{{$item['id']}}" class="input" type="number" name="qty" value="{{$item['qty']}}">                                        
                                        {{-- <input class="btn btn-primary" type="submit" name="submit" value="تحديث"> --}}
                                        </form>
                                    </td>
                                    <input type="hidden" name="total-hidden" id="total-hidden-lg-{{$item['id']}}" value="{{$item['price'] * $item['qty']}}">
                                    <td class="total text-center"><strong class="primary-color" id="total-lg-{{$item['id']}}">{{$item['price'] * $item['qty']}} د.ج</strong></td>
                                    <td class="text-right"><a href="{{route('cart.remove',$item['id'])}}"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></a></td>
                                </tr>
                                <!---->
                                    @php
                                    $item_ids[]=$item['id'];
                                    $item_ids_string='';
                                @endphp 
                                <!--/--> 
                                @endforeach
                                <!---->
                                        <!--convert array to string-->
                                        @foreach ($item_ids as $index=>$id)                         
                                        @php
                                        if($index+1>=count($item_ids)){ 
                                            $item_ids_string.=''.$id.'';
                                        }else
                                        {
                                        $item_ids_string.=''.$id.'';
                                        }
                                        $item_ids_string.='';
                                        @endphp
                                        @endforeach  
                                        <input type="hidden" name="item_ids_array" id="item_ids_array-lg" value="{{$item_ids_string}}">
                                        <!---->
                                @endif                                
                            </tbody>                            
                            <tfoot>
                                {{-- <tr>                                    
                                    <th>المبلغ بدون إحتساب التوصيل</th>
                                    <th colspan="2" class="sub-total">{{$subTotal=session()->get('cart')->totalPrice}} دج</th>
                                    <th class="empty" colspan="3"></th>
                                </tr>
                                <tr>                                    
                                    <th>سعر التوصيل</th>
                                    <td colspan="2">{{$shepPrice=0}} دج</td>
                                    <th class="empty" colspan="3"></th>
                                </tr>
                                --}}
                                <tr>                                    
                                    <th>المبلغ المستحق</th>
                                    <th colspan="2" class="total" id="total-lg">{{$total=session()->get('cart')->totalPrice}} دج</th>
                                    <th class="empty" colspan="3"></th>
                                </tr>
                            </tfoot>                            
                        </table>
                        <!--end show this table in larg screen-->

                        <!--start show this table in small screen-->
                                            <div class="container hidden-lg hidden-md">
                        <div class="row">
                            
                                <table width="100%">
                                    <thead>
                                        <th width="20%"></th>
                                        <th width="70%"></th>
                                        <th width="10%"></th>
                                    </thead>
                                    <tbody>

                                    @if(session()->has('cart'))                                    
                                    @foreach(session()->get('cart')->items as $item)                                    
                                    <form name="form{{$item['id']}}" action="{{route('cart.update',$item['id'])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <tr>
                                            <td>
                                                <img src="{{url('admin-css/uploads/images/products/'.$item['image'])}}" alt="" height="50px" width="50px">
                                            </td>
                                            <td>
                                                <a style="font-size:16px ;" href="{{url('product/'.make_slug($item['title']))}}">{{$item['title']}}</a>
                                            </td>
                                            <td>
                                                <a href="{{route('cart.remove',$item['id'])}}"><i class="fa fa-close"></i></a>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td></td>
                                            <td>
                                                {!!print_product_colors_html($item['id'])!!}
                                                {!!print_product_sizes_html($item['id'])!!}
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                السعر: @if(has_discount($item['id']))<strong>{{$item['price']}} د.ج</strong><br><del class="font-weak"><small>{{get_product_price_by_id($item['id'])}}</small></del>@else <strong>{{get_product_price_by_id($item['id'])}} </strong>@endif د.ج
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                            <!--add qty ntb-->
                                            <span id="add_product_qty" onclick="add_product_qty({{$item['id']}})" class="btn btn-info" style="width:17%">+</span>
                                            <!---->
                                                <input type="hidden" name="product_price-{{$item['id']}}" id="product_price-{{$item['id']}}" value="@if(has_discount($item['id'])){{$item['price']}}@else{{get_product_price_by_id($item['id'])}}@endif">
                                                <input onchange="calculate_total({{$item['id']}});update_qty({{$item['id']}});" id="qty-{{$item['id']}}" style="width:60%" class="input" type="number" name="qty" value="{{$item['qty']}}">                                                                            
                                            <!--min qty ntb-->
                                            <span id="min_product_qty" onclick="min_product_qty({{$item['id']}})" class="btn btn-info" style="width:17%">-</span>
                                            <!---->
                                                {{-- <input style="margin-top:5px;width:100%" class="btn btn-primary" type="submit" name="submit" value="تحديث"> --}}
                                            </td>
                                            <td></td>
                                        </tr>
                                          </form>
                                        <tr class="bottom-border">
                                            <td></td>
                                            <td>
                                                <input type="hidden" name="total-hidden" id="total-hidden-{{$item['id']}}" value="{{$item['price'] * $item['qty']}}">
                                                <h4><strong class="primary-color" id="total-{{$item['id']}}">{{$item['price'] * $item['qty']}} دج</strong></h4>
                                            </td>
                                            <td></td>
                                        </tr>  
                                        <!---->
                                        @php
                                            $item_ids[]=$item['id'];
                                            $item_ids_string='';
                                        @endphp 
                                        <!--/-->                                                                          
                                        @endforeach 
                                        <!---->
                                        <!--convert array to string-->
                                        @foreach ($item_ids as $index=>$id)                         
                                        @php
                                        if($index+1>=count($item_ids)){ 
                                            $item_ids_string.=''.$id.'';
                                        }else
                                        {
                                        $item_ids_string.=''.$id.'';
                                        }
                                        
                                        @endphp
                                        @endforeach  
                                        <input type="hidden" name="item_ids_array" id="item_ids_array" value="{{$item_ids_string}}">
                                        <!---->                                       
                                        @endif                                        
                                    </tbody>
                                    <tfoot>                                       
                                        <tr>                                    
                                            <th style="background-color:lavender;"></th>
                                            <th class="total-value" id="total">المبلغ المستحق {{$total=session()->get('cart')->totalPrice}} دج</th>
                                            <th style="background-color:lavender;"></th>
                                        </tr>                                                              
                                    </tfoot>
                                </table>
                            
                        </div>
                    </div>
                        {{-- <table class="shopping-cart-table table hidden-lg">
                            <thead>
                            <tr>
                            <th class="text-right">تفاصيل المنتج</th>
                            <th class="text-right">المجموع</th>
                            <th></th>
                            <tr>
                            </thead>
                            <tbody>
                                @foreach(session()->get('cart')->items as $item)
                                <tr>
                                    <td class="details thumb">
                                        <img src="{{url('admin-css/uploads/images/products/'.$item['image'])}}" alt=""><br>
                                        <a href="{{url('product/'.make_slug($item['title']))}}">{{$item['title']}}</a>
                                        <form action="{{route('cart.update',$item['id'])}}" method="POST" enctype="multipart/form-data">
                                            @csrf                                       
                                        {!!print_product_colors_html($item['id'])!!}
                                        {!!print_product_sizes_html($item['id'])!!}
                                    السعر: @if(has_discount($item['id']))<strong>{{$item['price']}} د.ج</strong><br><del class="font-weak"><small>{{get_product_price_by_id($item['id'])}}</small></del>@else <strong>{{get_product_price_by_id($item['id'])}} </strong>@endif<br>                                    
                                                <input class="input" type="number" name="qty" value="{{$item['qty']}}">                                        
                                                <input class="btn btn-primary" type="submit" name="submit" value="حفظ">                                         
                                        </form>
                                    </td>
                                    <td class="total text-center"><strong class="primary-color">{{$item['price'] * $item['qty']}} د.ج</strong></td>
                                    <td class="text-right"><a href="{{route('cart.remove',$item['id'])}}"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>                                    
                                    <th>المبلغ بدون إحتساب التوصيل</th>
                                    <th colspan="2" class="sub-total">{{$subTotal=session()->get('cart')->totalPrice}} دج</th>
                                    <th class="empty" colspan="3"></th>
                                </tr>
                                <tr>                                    
                                    <th>سعر التوصيل</th>
                                    <td colspan="2">{{$shepPrice=0}} دج</td>
                                    <th class="empty" colspan="3"></th>
                                </tr>
                                <tr>                                    
                                    <th>المبلغ المستحق</th>
                                    <th colspan="2" class="total">{{$subTotal + $shepPrice}} دج</th>
                                    <th class="empty" colspan="3"></th>
                                </tr>
                            </tfoot>
                        </table> --}}
                        <!--end show this table in small screen-->

                        <div class="pull-left" style="margin-top:5px;">
                            <a href="{{route('checkout')}}"><button class="primary-btn"><i class="fa fa-arrow-circle-left"> أطلب الآن</i></button></a>
                        </div>
                        @else
                        <div class="text-center"> 
                        <h2>العربة فارغة</h2>
                        <a href="{{route('products')}}"><button class="primary-btn"><i class="fa fa-arrow-circle-left">العودة للتسوق</i></button></a>
                        </div>
                        @endif
                    </div>                    
                </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
<script>
    function calculate_total_lg(item_id)
    {
        if(document.getElementById('qty-lg-'+item_id).value<=1)
        {
            document.getElementById('qty-lg-'+item_id).value=1;
        }
        var qty=document.getElementById('qty-lg-'+item_id).value;
        var product_price=document.getElementById('product_price-lg-'+item_id).value;
        
        document.getElementById('total-lg-'+item_id).innerHTML=product_price*qty+ " دج";
        document.getElementById('total-hidden-lg-'+item_id).value=product_price*qty;
        // //get item_id array
        var item_ids_array=document.getElementById('item_ids_array-lg').value;
        //alert(item_ids_array);
       var total=0;
        for(var i = 0 ; i < item_ids_array.length ; i++)
        {
            total+=parseInt(document.getElementById('total-hidden-lg-'+item_ids_array[i]).value);
            // total+=item_ids_array[1];
        }
        //alert(total);
        // update_qty(item_id);
        //document.getElementById('qty-lg-'+item_id).value()=2;
        document.getElementById('total-lg').innerHTML=total+" دج";
    }

    function calculate_total(item_id)
    {
        if(document.getElementById('qty-'+item_id).value<=1)
        {
            document.getElementById('qty-'+item_id).value=1;
        }
        var qty=document.getElementById('qty-'+item_id).value;
        var product_price=document.getElementById('product_price-'+item_id).value;
        
        document.getElementById('total-'+item_id).innerHTML=product_price*qty+ " دج";
        document.getElementById('total-hidden-'+item_id).value=product_price*qty;
        // //get item_id array
        var item_ids_array=document.getElementById('item_ids_array-lg').value;
        //alert(item_ids_array);
       var total=0;
        for(var i = 0 ; i < item_ids_array.length ; i++)
        {
            total+=parseInt(document.getElementById('total-hidden-'+item_ids_array[i]).value);
            // total+=item_ids_array[1];
        }
        //alert(total);
        // update_qty(item_id);
        //document.getElementById('qty-lg-'+item_id).value()=2;
        document.getElementById('total').innerHTML=total+" دج";
    }
</script>