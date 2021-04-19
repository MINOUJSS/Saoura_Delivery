<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
        <li><a href="{{route('consumer.orders',$products[0]->consumer_id)}}">طلباتي</a></li>
            <li class="active">تفاصيل الطلب</li>
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
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside widget -->
                <div class="aside">
                    {{-- <h3 class="aside-title"></h3> --}}
                    <ul class="consumer-menu">
                        <li><a href="{{route('consumer.dashboard',Auth::guard('consumer')->user()->id)}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                        <li><a href="{{route('consumer.edit.account',Auth::guard('consumer')->user()->id)}}"><i class="fa fa-edit"></i> تعديل معلوماتي</a></li>
                        <li><a href="{{route('consumer.edit.password',Auth::guard('consumer')->user()->id)}}"><i class="fa fa-lock"></i> تغيير كلمة المرور</a></li>
                    </ul>
                </div>
                <!-- /aside widget -->
            </div>
            <!-- /ASIDE -->
             
            <!-- MAIN -->
            <div id="main" class="col-md-9">

                <!-- MAIN -->
                    <div class="row">
                        
                        <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">المنتجات التي تم طلبها</h3>                              
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                              <table class="table table-hover">
                                <tbody><tr>
                                  <th>الكمية</th>
                                  <th style="text-align:right !important;width:80px;">رقم المنتج</th>
                                  <th style="text-align:right !important;width:90px;">صورة المنتج</th>
                                  <th style="text-align:right !important;">إسم المنتج</th>
                                  <th style="text-align:right !important;width:80px;">لون المنتج</th>
                                  <th style="text-align:right !important;width:100px;">مقاس المنتج</th>
                                  <th style="text-align:right !important;width:90px;">سعر المنتج</th>
                                  <th style="text-align:right !important;">التخفيض</th>
                                  <th style="text-align:right !important;width:90px;">المبلغ</th>
                                </tr>
                                    @php
                                        $total=0;
                                    @endphp
                                @foreach($products as $index=>$product)
                                <tr>
                                  <td>{{$product->qty}}</td>
                                  <td>{{$product->product->id}}</td>
                                  <td><img src="{{url('/admin-css/uploads/images/products/'.$product->product->image)}}" width="50" height="50"></td>
                                  <td>{{$product->product->name}}</td>
                                  <td>{{get_color_name_from_id($product->color_id)}}</td>
                                  <td>{{get_size_name_from_id($product->size_id)}}</td>
                                  <td>{{$product->product->selling_price}} د.ج</td>
                                  <td>
                                      @if(has_discount_in_this_order_date($product->product_id,$product->order->created_at))
                                      {{get_product_discount($product->product_id)}} %
                                      @else 
                                        0 %
                                      @endif
                                   </td>
                                  <td>
                                    @if(has_discount_in_this_order_date($product->product_id,$product->order->created_at))
                                    @php
                                        $total=$total+(price_with_discount($product->product->selling_price,get_product_discount($product->product_id)) * $product->qty);
                                    @endphp
                                    {{price_with_discount($product->product->selling_price,get_product_discount($product->product_id)) * $product->qty}}  
                                    @else 
                                  @php
                                      $total=$total+($product->product->selling_price * $product->qty);
                                  @endphp
                                    {{$product->product->selling_price * $product->qty}}  
                                    @endif
                                     دج                
                                </td>
                                </tr>     
                                @endforeach                                                           
                              </tbody></table>

                              <!---->
                              <table class="shopping-cart-table table">
                              <tfoot>
                                <tr>                                    
                                    <th>المبلغ الأولي</th>
                                    <th colspan="2" class="sub-total">{{$total}} دج</th>
                                    <th class="empty" colspan="3"></th>
                                </tr>
                                <tr>                                    
                                    <th>مصاريف الشحن</th>
                                    <td colspan="2">{{$shepPrice=0}} دج</td>
                                    <th class="empty" colspan="3"></th>
                                </tr>
                                <tr>                                    
                                    <th>المبلغ المستحق</th>
                                    <th colspan="2" class="total">{{$total}} دج</th>
                                    <th class="empty" colspan="3"></th>
                                </tr>
                            </tfoot>                            
                              </table>
                              <!---->

                            </div><!-- /.box-body -->
                          </div>

                    </div>
                <!-- /MAIN -->
                
            </div>
            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
