<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الطلب
        <small>تفاصيل الطلب</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">الطلب</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-globe"></i>{{store_name_value()}}
              <small class="pull-right">تاريخ الطلب:{{$order->created_at->format('d-m-Y')}}</small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            من طرف
            <address>
              <strong>إدارة {{store_name_value()}}</strong><br>
              @if(store_address_value()!=null)
              {{store_address_value()}}<br>              
              @endif
              {{-- San Francisco, CA 94107<br> --}}
              @if(store_phone_value()!=null)
              الهاتف: {{store_phone_value()}}<br>
              @endif
              البريد الإلكتروني: {{store_email_value()}}
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            إلى السيد
            <address>
              <strong>{{$order->billing_name}}</strong><br>
              {{$order->billing_address}}<br>
              {{-- San Francisco, CA 94107<br> --}}
              الهاتف: <a href="tel:{{$order->billing_mobile}}">{{$order->billing_mobile}}</a> <i class="fa fa-phone"></i><br>
              الواتس أب: <a href="https://wa.me/+213{{(int)$order->billing_mobile}}">{{$order->billing_mobile}}</a> <i class="fa fa-whatsapp"></i><br>
              البريد الإلكتروني: {{$order->billing_email}}
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>رقم الطلب:</b> #{{$order->id}}<br>
            <b>حالة الطلب :{!! order_status($order->status)!!} </b><br>
            {{-- <b>Payment Due:</b> 2/22/2014<br>
            <b>Account:</b> 968-34567 --}}
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <a href="{{route('admin.order.edit',$order->id)}}"><button class="btn btn-success"><i class="fa fa-edit"></i> تعديل الطلب</button></a>
            <table class="table table-striped" id="datatable">
              <thead>
                <tr>
                  <th>الكمية</th>
                  <th style="width:80px;">رقم المنتج</th>
                  <th style="width:90px;">صورة المنتج</th>
                  <th>إسم المنتج</th>
                  <th>اللون</th>
                  <th>المقاس</th>
                  <th style="width:90px;">السعر</th>
                  <th>التخفيض</th>
                  <th style="width:90px;">المبلغ</th>
                  <th>drop sheping url</th>
                  {{-- @if(count($products)>1) --}}
                  <th style="width:90px;">العمليات</th>
                  {{-- @endif --}}
                </tr>
              </thead>
              <tbody>
                  @php
                      $total=0;
                  @endphp
                  @foreach($products as $product)
                <tr>
                  <td>{{$product->qty}}</td>
                  <td>@if($product->product!=null){{$product->product->id}}@else / @endif</td>
                  <td>@if($product->product!=null)<img src="{{url('admin-css/uploads/images/products/'.$product->product->image)}}" height="50" width="50">@else / @endif</td>                  
                  <td>@if($product->product!=null){{$product->product->name}}@else / @endif</td>
                  <td>{{get_color_name_from_id($product->color_id)}}</td>
                  <td>{{get_size_name_from_id($product->size_id)}}</td>
                  <td>@if($product->product!=null){{$product->product->selling_price}} دج@else / @endif</td>
                  <td>
                    @if(has_discount_in_this_order_date($product->product_id,$product->order->created_at))
                    {{get_product_discount($product->product_id)}} %
                    @else 
                      0 %
                    @endif  
                  </td>
                  <td>
                    @if($product->product!=null)
                      @if(has_discount_in_this_order_date($product->product_id,$product->order->created_at))
                      @php
                          $total=$total+(price_with_discount($product->product->id) * $product->qty);
                      @endphp
                      {{price_with_discount($product->product->id) * $product->qty}}  
                      @else 
                    @php
                        $total=$total+($product->product->selling_price * $product->qty);
                    @endphp
                      {{$product->product->selling_price * $product->qty}}  
                      @endif
                       دج                
                       @else 
                      /
                       @endif
                  </td>
                  <td>                    
                    @if($product->product->dropsheping_url!=null)
                    <a href="{{$product->product->dropsheping_url}}" target="blanck">طلب المنتج من موقع المورد</a>
                    @else
                    /
                    @endif                    
                  </td>
                  @if($product->product!=null)
                    @if(count($products)>1)
                    <td><i id="delete_order_product" title="{{$product->product->name}}" url="{{url('/admin/order/'.$product->order_id.'/product/'.$product->product_id.'/delete')}}" class="fa fa-trash-o text-danger cursor-pointer"></i></td>
                    @endif
                    <td></td>
                    {{-- <td><a href="{{route('admin.order.edit',$product->order_id)}}"><i class="fa fa-edit text-success cursor-pointer"></i></a></td> --}}
                  @else 
                  <td>/</td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <div class="col-md-6">
            @if($order->status!=4 && $order->status!=5)
            <p class="lead">عمليات على الطلب:</p>
            @if($order->status==0)
            {{-- <button class="btn btn-primary" onclick="confirm_order({{$order->id}});"><i class="fa fa-thumbs-up"></i> تأكيد الطلب</button> --}}
            <a id="confirm_order" data-order="{{$order->id}}"><button class="btn btn-primary"><i class="fa fa-thumbs-up"></i> تأكيد الطلب</button></a>
            @endif
            @if($order->status==1)
            {{-- <button class="btn btn-info" onclick="ship_order({{$order->id}})"><i class="fa fa-truck"></i> تم إرسال الطلب</button> --}}
            <a id="ship_order" data-order="{{$order->id}}"><button class="btn btn-info"><i class="fa fa-truck"></i> إرسال الطلب</button></a>
            @endif
            @if($order->status==2)
            {{-- <button class="btn btn-success" onclick="complate_order({{$order->id}})"><i class="fa fa-trophy"></i> تم تسليم الطلب</button> --}}
            <a id="complate_order" data-order="{{$order->id}}"><button class="btn btn-success"><i class="fa fa-trophy"></i> تسليم الطلب</button></a>
            @endif
            {{-- <button class="btn btn-danger" onclick="deny_order({{$order->id}})"><i class="fa fa-ban"></i> إلغاء الطلب</button> --}}
            @if($order->status!=3 && $order->status!=5)
            <a href="{{route('admin.deny.order.observation.create')}}"><button class="btn btn-success"><i class="fa fa-plus"></i>  إضافة سبب آخر</button></a>
            <a href="{{route('admin.deny.order.observation')}}"><button class="btn btn-warning"><i class="fa fa-edit"></i>  تعديل وحذف الأسباب</button></a>
            <form name="deny_order" action="{{route('admin.order.deny')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="order_id" value="{{$order->id}}">
            <div class="form-group">
              <label for="obs"></label>
              <select name="obs" class="form-control">
                <option value="0">إختر سبب إلغاء الطلب</option>
                @foreach ($deny_obses as $obs)
                <option value="{{$obs->id}}">{{$obs->obs}}</option>   
                @endforeach
              </select>
            </div>
            <div class="form-group">
            <a id="deny_order" data-order="{{$order->id}}"><button class="btn btn-danger"><i class="fa fa-ban"></i> إلغاء الطلب</button></a>
            </div>
            </form>
            @endif
            <!---->
            @if($order->status==3)
            <a href="{{route('admin.return.order.observation.create')}}"><button class="btn btn-success"><i class="fa fa-plus"></i>  إضافة سبب آخر</button></a>
            <a href="{{route('admin.return.order.observation')}}"><button class="btn btn-warning"><i class="fa fa-edit"></i>  تعديل وحذف الأسباب</button></a>
            <form name="return_order" action="{{route('admin.order.return')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="order_id" value="{{$order->id}}">
            <div class="form-group">
              <label for="obs"></label>
              <select name="obs" class="form-control">
                <option value="0">إختر سبب إرجاع الطلب</option>
                @foreach ($return_obses as $obs)
                <option value="{{$obs->id}}">{{$obs->obs}}</option>   
                @endforeach
              </select>
            </div>
            <div class="form-group">
            <a id="return_order" data-order="{{$order->id}}"><button class="btn btn-danger"><i class="fa fa-truck"></i> إرجاع الطلب</button></a>
            </div>
            </form>
            @endif
            <!---->
            @else
                @if($order->status==5)
                <p class="lead">سبب إرجاع الطلب:</p>
                  {{$order->obs}}
                @else 
                <p class="lead">سبب إلغاء الطلب:</p>
                {{$order->obs}}
                @endif
            @endif
            {{-- <p class="lead">طرق الدفع:</p>
            <img src="../../dist/img/credit/visa.png" alt="Visa">
            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
            <img src="../../dist/img/credit/american-express.png" alt="American Express">
            <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              طرق الدفع المتوفرة في المتجر حاليا هي الدفع عند الإستلام.
            </p> --}}
          </div><!-- /.col -->
          <div class="col-md-6">
            <p class="lead">المبلغ المستحق {{$order->created_at->format('Y/m/d')}} </p>
            <div class="table-responsive">
              <table class="table">
                <tbody><tr>
                  <th style="width:50%">المبلغ الأولي:</th>
                  <td>{{$total}} دج</td>
                </tr>
                {{-- <tr>
                  <th>Tax (9.3%)</th>
                  <td>$10.34</td>
                </tr> --}}
                @php
                if($order->shepping != null)
                {$shepping=$order->shepping->shepping;}
                else
                {$shepping=0;}    
                @endphp
                <tr>
                  <th>مصاريف الشحن:</th>
                  <td><span id="sheping-span">{{$shepping}}</span> دج</td>
                </tr>
                @php
                if($order->discount != null)
                {$global_discount=$order->discount->discount;}
                else
                {$global_discount=0;}    
                @endphp
                <tr>
                  <th>تخفيض على الفاتورة:</th>
                  <td><span id="discount-span">{{$global_discount}}</span> دج</td>
                </tr>
                <tr>
                  <th>المبلغ الإجمالي:</th>
                  <td>{{($total+$shepping)-$global_discount}} دج</td>
                </tr>
              </tbody></table>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            {{-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> --}}
            @if(!is_invoice_exist($order->id))
            <a href="{{route('admin.invoice',$order->id)}}"><button class="btn btn-success pull-right"><i class="fa fa-file-text"></i> تحرير فاتورة</button></a>
            @else 
            <a href="{{route('admin.print.invoice',$order->id)}}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i>طباعة الفاتورة</a>
            @endif
            {{-- <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button> --}}
          </div>
        </div>
      </section>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->