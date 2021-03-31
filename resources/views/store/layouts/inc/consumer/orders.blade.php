<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
        <li><a href="{{route('consumer.dashboard',Auth::guard('consumer')->user()->id)}}">حسابي</a></li>
            <li class="active">تعديل الحساب</li>
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
                              <h3 class="box-title">جدول الطلبات</h3>                              
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                              <table class="table table-hover">
                                <tbody><tr>
                                  <th>#</th>
                                  <th style="text-align:right !important;">رقم الطلب</th>
                                  <th style="text-align:right !important;">صورة المنتج</th>
                                  <th style="text-align:right !important;">إسم المنتج</th>
                                  <th style="text-align:right !important;">سعر المنتج</th>
                                  <th style="text-align:right !important;">التخفيض</th>
                                  <th style="text-align:right !important;">السعر النهائي</th>
                                  <th style="text-align:right !important;">حالة الطلب</th>
                                </tr>
                                @foreach($products as $index=>$product)
                                <tr>
                                  <td>{{$index+1}}</td>
                                  <td>{{$product->order_id}}</td>
                                  <td><img src="{{url('/admin-css/uploads/images/products/'.$product->product->image)}}" width="50" height="50"></td>
                                  <td>{{$product->product->name}}</td>
                                  {{-- <td><span class="label label-success">Approved</span></td> --}}
                                  <td>{{$product->product->selling_price}} د.ج</td>
                                  <td>@if(has_discount($product->product_id)){{get_product_discount($product->product->id)}}@else {{'0'}} @endif %</td>                                  
                                  <td>@if(has_discount($product->product_id)){{price_with_discount($product->product->selling_price,get_product_discount($product->product->id))}}@else {{$product->product->selling_price}}@endif د.ج</td>
                                  <td></td>
                                </tr>     
                                @endforeach                           
                              </tbody></table>
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
