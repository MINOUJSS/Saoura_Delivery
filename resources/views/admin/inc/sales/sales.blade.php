<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        المبيعات
        <small>كل المبيعات</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">المبيعات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">جدول المبيعات</h3>
          <div class="box-tools">
            <div class="input-group" style="width: 150px;">
              <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody><tr>
              <th>#</th>
              <th>تاريخ المبيعة</th>
              <th>رقم الطلب</th>
              <th>اسم المستهلك</th>
              <th>رقم المنتج</th>
              <th>اسم المنتج</th>
              <th>تكلفة المنتج</th>
              <th>سعر المنتج</th>
              <th>الكمية</th>
              <th>صافي الربح</th>              
            </tr>
            @if($sales->count()>0)
            @php
                $total_charge_price=0;
                $total_selling_price=0;
                $total_qty=0;
                $total_benifis=0;
            @endphp
            @foreach($sales as $index=>$sale)
            <tr>
              <td>{{$index + 1}}</td>
              <td>{{$sale->created_at->diffForHumans()}}</td>
              <td>{{$sale->order_id}}</td>
              <td>@if($sale->consumer->name=='Default'){{$sale->order->billing_name}}@else{{$sale->consumer->name}}@endif</td>
              <td>{{$sale->product->id}}</td>
              <td>{{$sale->product->name}}</td>
              <td><span class="text-danger">{{$sale->charge_price}}</span></td>
              <td><span class="text-success">{{$sale->selling_price}}</span></td>
              <td>{{$sale->qty}}</td>
              <td><span @if($sale->selling_price > $sale->charge_price) class="text-primary" @else class="text-danger" @endif>{{($sale->selling_price - $sale->charge_price) * $sale->qty}}</span></td>
            </tr>
            @php
                $total_charge_price=$total_charge_price + $sale->charge_price;
                $total_selling_price=$total_selling_price + $sale->selling_price;
                $total_qty=$total_qty + $sale->qty;
                $total_benifis=$total_benifis + (($sale->selling_price - $sale->charge_price) * $sale->qty);
            @endphp
            @endforeach
            <th>
              <td></td> 
              <td></td>             
              <td></td>
              <td></td>
              <td>المجموع</td>
              <td>{{$total_charge_price}}</td>
              <td>{{$total_selling_price}}</td>
              <td>{{$total_qty}}</td>
              <td>{{$total_benifis}}</td>
            </th>
            @else 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>لا توجد مبيعات</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            @endif
          </tbody></table>
          {{$sales->links()}}          
        </div><!-- /.box-body -->        
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->