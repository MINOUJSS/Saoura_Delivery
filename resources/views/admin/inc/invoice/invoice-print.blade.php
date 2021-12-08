@extends('admin.layouts.invoice')
      <!-- Your Page Content Here -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-globe"></i> {{store_name_value()}}
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
            إلى السيد(ة)
            <address>
              <strong>{{$order->billing_name}}</strong><br>
              {{$order->billing_address}}<br>
              {{-- San Francisco, CA 94107<br> --}}
              الهاتف:{{$order->billing_mobile}} <i class="fa fa-phone"></i><br>
              البريد الإلكتروني: {{$order->billing_email}}
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>فاتورة رقم :{{$invoice->id}} </b><br>
            <br>
            <b>رقم الطلب:</b> #{{$order->id}}<br>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
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
                </tr>
              </thead>
              <tbody>
                  @php
                      $total=0;
                  @endphp
                  @foreach($products as $product)
                <tr>
                  <td>{{$product->qty}}</td>
                  <td>{{$product->product->id}}</td>
                  <td><img src="{{url('admin-css/uploads/images/products/'.$product->product->image)}}" height="50" width="50"></td>                  
                  <td>{{$product->product->name}}</td>
                  <td>{{get_color_name_from_id($product->color_id)}}</td>
                  <td>{{get_size_name_from_id($product->size_id)}}</td>
                  <td>{{$product->product->selling_price}} دج</td>
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
                          // $total=$total+(price_with_discount($product->product->selling_price,get_product_discount($product->product_id)) * $product->qty);
                          $total=$total+(price_with_discount($product->product_id) * $product->qty);
                      @endphp
                      {{-- {{price_with_discount($product->product->selling_price,get_product_discount($product->product_id)) * $product->qty}}   --}}
                      {{price_with_discount($product->product_id) * $product->qty}}  
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
              </tbody>
            </table>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <div class="col-md-6">            
             <p class="lead">طرق الدفع:</p>
             {{--
            <img src="../../dist/img/credit/visa.png" alt="Visa">
            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
            <img src="../../dist/img/credit/american-express.png" alt="American Express">
            <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
            --}}
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              طرق الدفع المتوفرة في المتجر حاليا هي الدفع عند الإستلام.
            </p> 
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
                {{-- <tr>
                  <th>مصاريف الشحن:</th>
                  <td>0 دج</td>
                </tr>
                <tr> --}}
                  <th>المبلغ الإجمالي:</th>
                  <td>{{$total}} دج</td>
                </tr>
              </tbody></table>
            </div>
            <p class="lead">تواصلوا معنا:</p>
         <ul class="text-muted well well-sm no-shadow">
          <li>عبر موقعنا الرسمي :إتصل_بنا/{{url('/')}}</li>
          <li>صفحة  الفيس بوك الرسمية : https://www.facebook.com/Saoura-delivery-109610364241532</li>
          <li>قناة اليوتيوب الرسمية : https://www.youtube.com/channel/UCI8WJx13xbdkczkZLBmOwmw</li>
        </ul>
            <h3 class="text-center">الساورة دليفري تشكركم  على ثقتكم</h3>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- this row will not appear when printing -->
        {{-- <div class="row no-print">
          <div class="col-xs-12">
            <a href="{{route('admin.invoice',$order->id)}}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
            <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
          </div>
        </div> --}}
      </section>
      <!--End Page Content Here-->

    {{-- </section><!-- /.content -->
  </div><!-- /.content-wrapper --> --}}