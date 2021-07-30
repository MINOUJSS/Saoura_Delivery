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
                                        {!!print_product_colors_html($item['id'])!!}
                                        {!!print_product_sizes_html($item['id'])!!}
                                    </td>
                                    {{-- <td class="price text-center"><strong>{{$item['price']}} دج</strong><br><del class="font-weak"><small>$40.00</small></del></td> --}}
                                    <td class="price text-center">@if(has_discount($item['id']))<strong>{{$item['price']}} د.ج</strong><br><del class="font-weak"><small>{{get_product_price_by_id($item['id'])}}</small></del>@else <strong>{{get_product_price_by_id($item['id'])}} </strong>@endif</td>
                                    <td class="qty text-center">
                                        
                                        <input class="input" type="number" name="qty" value="{{$item['qty']}}">                                        
                                        <input class="btn btn-primary" type="submit" name="submit" value="حفظ">
                                        </form>
                                    </td>
                                    <td class="total text-center"><strong class="primary-color">{{$item['price'] * $item['qty']}} د.ج</strong></td>
                                    <td class="text-right"><a href="{{route('cart.remove',$item['id'])}}"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></a></td>
                                </tr>
                                @endforeach
                                @endif                                
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
                        </table>
                        <!--end show this table in larg screen-->

                        <!--start show this table in small screen-->
                        <table class="shopping-cart-table table hidden-lg">
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
                        </table>
                        <!--end show this table in small screen-->

                        <div class="pull-left">
                            <a href="{{route('checkout')}}"><button class="primary-btn"><i class="fa fa-arrow-circle-left"> أطلب الآن</i></button></a>
                        </div>
                        @else
                        <div class="text-center"> 
                        <h2>العربة فارغة</h2>
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