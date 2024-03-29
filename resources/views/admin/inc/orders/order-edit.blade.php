<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الطلب
        <small>تعديل الطلب</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">تعديل  الطلب</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">فورم تعديل معلومات الطالب</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('admin.order.update')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="order_id" value="{{$order->id}}">
          <div class="box-body">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">الاسم</label>
              <div class="col-sm-10">
                <input name="first-name" type="text" class="form-control" placeholder="الاسم" value="@if(old('first-name')){{old('first-name')}}@else{{$order->billing_name}}@endif">
              </div>
            </div>
            <div class="form-group">
                <label for="tel" class="col-sm-2 control-label">رقم الهاتف</label>
                <div class="col-sm-10">
                  <input name="tel" type="text" class="form-control"  placeholder="رقمالهاتف" value="@if(old('tel')){{old('tel')}}@else{{$order->billing_mobile}}@endif">
                </div>
              </div>
              <div class="form-group">
                <label for="address" class="col-sm-2 control-label">عنوان تسليم المنتج</label>
                <div class="col-sm-10">
                  <input name="address" type="text" class="form-control" placeholder="عنوان تسليم المنتج" value="@if(old('address')){{old('address')}}@else{{$order->billing_address}}@endif">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">البريد الإلكتروني</label>
                <div class="col-sm-10">
                  <input name="email" type="email" class="form-control" placeholder="البريد الإلكتروني" value="@if(old('email')){{old('email')}}@else{{$order->billing_email}}@endif">
                </div>
              </div>
              <input type="hidden" name="total" id="form-total" value="{{$order->total}}">
          </div><!-- /.box-body -->
          <!---->
          <hr>
          <div class="box-header with-border">
            <h3 class="box-title">المنتجات المطلوبة</h3>
          </div><!-- /.box-header -->

          <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
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
                    <td>
                        <input onchange="count_sub_total({{$product->id}})" type="number" name="qty-{{$product->id}}" id="qty-{{$product->id}}" value="@if(old('qty-'.$product->id)){{old('qty-'.$product->id)}}@else{{$product->qty}}@endif">
                    </td>
                    <td>@if($product->product!=null){{$product->product->id}}@else / @endif</td>
                    <td>@if($product->product!=null)<img src="{{url('admin-css/uploads/images/products/'.$product->product->image)}}" height="50" width="50">@else / @endif</td>                  
                    <td>@if($product->product!=null){{$product->product->name}}@else / @endif</td>
                    <td>@if(count(get_product_colors($product->product->id))>0)
                        <select name="color-{{$product->id}}">
                            <option value="1">إفتراضي</option>
                            @foreach(get_product_colors($product->product->id) as $color)
                            <option value="{{$color->color_id}}" @if($product->color->id == $color->color_id) {{'selected'}}@endif>{{get_color_name_from_id($color->color_id)}}</option>
                            @endforeach
                        </select>
                        @else
                        {{get_color_name_from_id($product->color_id)}}
                        @endif
                    </td>
                    <td>
                      @if(count(get_product_sizes($product->product->id))>0)
                        <select name="size-{{$product->id}}">
                            <option value="1">إفتراضي</option>
                            @foreach(get_product_sizes($product->product->id) as $size)
                            <option value="{{$size->size_id}}" @if($product->size->id == $size->size_id) {{'selected'}}@endif>{{get_size_name_from_id($size->size_id)}}</option>
                            @endforeach
                        </select>
                        @else
                        {{get_size_name_from_id($product->size_id)}}
                        @endif
                      {{-- {{get_size_name_from_id($product->size_id)}} --}}
                    </td>
                    <td>@if($product->product!=null){{$product->product->selling_price}} دج@else / @endif</td>
                    <td>
                      @if(has_discount_in_this_order_date($product->product_id,$product->order->created_at))
                      {{get_product_discount($product->product_id)}} %
                      @else 
                        0 %
                      @endif  
                    </td>
                    @if(has_discount_in_this_order_date($product->product_id,$product->order->created_at))
                    <input type="hidden" name="amount-{{$product->id}}" id="amount-{{$product->id}}" value="{{price_with_discount($product->product->id)}}"> 
                    @else 
                    <input type="hidden" name="amount-{{$product->id}}" id="amount-{{$product->id}}" value="{{$product->product->selling_price}}">
                    @endif
                    <td id="product-total-{{$product->id}}">
                      @if($product->product!=null)
                        @if(has_discount_in_this_order_date($product->product_id,$product->order->created_at))
                        @php
                            $total=$total+(price_with_discount($product->product->id) * $product->qty);
                        @endphp
                        {{price_with_discount($product->product->id) * $product->qty}}  
                        <input type="hidden" name="subtotal-{{$product->id}}" id="subtotal-{{$product->id}}" value="{{price_with_discount($product->product->id) * $product->qty}}">
                        @else 
                      @php
                          $total=$total+($product->product->selling_price * $product->qty);
                      @endphp
                        {{$product->product->selling_price * $product->qty}} 
                        <input type="hidden" name="subtotal-{{$product->id}}" id="subtotal-{{$product->id}}" value="{{$product->product->selling_price * $product->qty}}"> 
                        @endif
                         دج                
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
                  {{-- start get product  id in array --}}
                  @php
                     $items_ids[]=$product->id; 
                  @endphp
                  {{-- end get product  id in array --}}
                  @endforeach
                </tbody>
              </table>              
            </div><!-- /.col -->
          </div><!-- /.row -->
          @php
              $items_ids_array="";
              foreach($items_ids as $key=>$val)
              {
                if($key >= count($items_ids)-1)
                {
                  $items_ids_array.=$val;
                }
                else
                {
                  $items_ids_array.=$val.',';
                }
              }
          @endphp
          <input type="hidden" name="items_ids_array" id="items_ids_array" value="{{$items_ids_array}}">
          <!--add discount and shiping-->
          <div class="row">
            <div class="container">
              <div class="col-lg-3">
              <div class="form-group">
                <label>تخفيض على الفاتورة</label>
                @php
                if($order->discount != null)
                {$global_discount=$order->discount->discount;}
                else
                {$global_discount=0;}    
                @endphp
                {{-- @if($order->discount != null){{$global_discount=$order->discount->discount}}@else{{$global_discount=0}}@endif --}}
                <input class="form-control" onchange="change_total_sheping_discount_values()" type="number" name="global-discount" id="global-discount" value="@if(old('global-discount')){{old('global-discount')}}@else{{$global_discount}}@endif">
              </div>
              <div class="form-group">
                @php
                if($order->shepping != null)
                {$shepping=$order->shepping->shepping;}
                else
                {$shepping=0;}    
                @endphp                
                <label>مصاريف الشحن</label>
                <input class="form-control" onchange="change_total_sheping_discount_values()" type="number" name="sheping" id="sheping" value="@if(old('sheping')){{old('sheping')}}@else{{$shepping}}@endif">
              </div>
              </div>
            </div>
          </div>
          <!--/ add discount and shiping-->
          <!---->
          <div id="new_item_div">

          </div>
          <!---->
          <!---->  
          <div class="box-footer">                        
            <button name="submit" type="submit" class="btn btn-info pull-left"><i class="fa fa-save"></i> حفظ التعديلات</button>
          </div><!-- /.box-footer -->
        </form>
        <!---->
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
          </div><!-- /.col -->
          <div class="col-md-6">
            <p class="lead">المبلغ المستحق {{$order->created_at->format('Y/m/d')}} </p>
            <div class="table-responsive">
              <table class="table">
                <tbody><tr>
                  <th style="width:50%">المبلغ الأولي:</th>
                  <td><span id="total">{{$total}}</span> دج
                  <input type="hidden" name="primary-total" id="primary-total" value="{{$total}}">
                  </td>
                </tr>
                {{-- <tr>
                  <th>Tax (9.3%)</th>
                  <td>$10.34</td>
                </tr> --}}
                <tr>
                  <th>مصاريف الشحن:</th>
                  <td><span id="sheping-span">{{$shepping}}</span> دج</td>
                </tr>
                <tr>
                  <th>تخفيض على الفاتورة:</th>
                  <td><span id="discount-span">{{$global_discount}}</span> دج</td>
                </tr>
                <tr>
                  <th>المبلغ الإجمالي:</th>
                  <td><span id="global-total">{{($total+$shepping)-$global_discount}}</span> دج</td>
                </tr>
              </tbody></table>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!---->
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <script>
    function count_sub_total(item_id)
    {
      if(document.getElementById('qty-'+item_id).value<=1)
      {
        document.getElementById('qty-'+item_id).value=1;
      }
      var subtotal=(document.getElementById('amount-'+item_id).value * document.getElementById('qty-'+item_id).value);
      document.getElementById('product-total-'+item_id).innerHTML=subtotal + " دج" +"<input type='hidden' name='subtotal-"+item_id+"' id='subtotal-"+item_id+"' value='"+subtotal+"'>";
      // call function to change global-total
      //waite one secound 
      change_values_of_order(document.getElementById('items_ids_array').value)
      //change_global_total(subtotal); 

    }
    function change_values_of_order(item_total_array)
    {
      // setTimeout(function(){
      //   alert('hi');
      // }, 1000);
      // item_total_array=Array(item_total_array);
      ids_array=item_total_array.split(',');
      // document.getElementById('new_item_div').innerHTML="<div id='new_item_values'></div>";
      // var html="";
      var total=parseInt(0);
      for (let x = 0; x < ids_array.length; x++) {
        const element = ids_array[x];
        new_value=document.getElementById('subtotal-'+element).value;
        total+=parseInt(new_value);
        // html+="<input type='hidden' id='item_"+element+"' value='"+new_value+"'>";
      } 
      //change global-discount
      //document.getElementById('global-discount').value=0;
      // alert(total);
      var global_discount=parseInt(document.getElementById('global-discount').value);
      var sheping=parseInt(document.getElementById('sheping').value);
      //change total
      document.getElementById('total').innerHTML=total;
      document.getElementById('primary-total').value=total;
      //change sheping-span
      document.getElementById('sheping-span').innerHTML=sheping;
      //change discount-span
      document.getElementById('discount-span').innerHTML=global_discount;
      //change global-total
      document.getElementById('form-total').value=(total+sheping)-global_discount;
      document.getElementById('global-total').innerHTML=(total+sheping)-global_discount;
      // document.getElementById('new_item_values').innerHTML=html;      
    }
    function change_total_sheping_discount_values()
    {
      var global_discount=parseInt(document.getElementById('global-discount').value);
      var sheping=parseInt(document.getElementById('sheping').value);
      //change total
      total=parseInt(document.getElementById('primary-total').value);
      document.getElementById('total').innerHTML=total;
      
      //change sheping-span
      document.getElementById('sheping-span').innerHTML=sheping;
      //change discount-span
      document.getElementById('discount-span').innerHTML=global_discount;
      //change global-total
      document.getElementById('form-total').value=(total+sheping)-global_discount;
      document.getElementById('global-total').innerHTML=(total+sheping)-global_discount;
    }
  </script>