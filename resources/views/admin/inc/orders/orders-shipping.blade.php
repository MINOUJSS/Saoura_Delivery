<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الطلبات 
        <small>الطلبات المرسلة</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">الطلبات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <!---->
      <a class="btn btn-app" href="{{route('admin.delivery.list')}}">
        <span class="badge bg-teal">{{$global_sheeping_orders->count()}}</span>
        <i class="fa fa-truck"></i> قائمة التوصيل
      </a>
      <!--/-->
      {{-- pending orders --}}
      <a class="btn btn-app" href="{{route('admin.orders-pending')}}">
        {{-- <span class="badge bg-teal">{{$global_sheeping_orders->count()}}</span> --}}
        <i class="fa fa-stopwatch"></i> قيد الإنتظار
      </a> 
      {{-- confirmed orders --}}
      <a class="btn btn-app" href="{{route('admin.orders-confirmed')}}">
        {{-- <span class="badge bg-teal">{{$global_sheeping_orders->count()}}</span> --}}
        <i class="fa fa-clipboard-check"></i> المؤكدة
      </a>
      {{-- shipping orders --}}
      <a class="btn btn-app" href="{{route('admin.orders-shipping')}}">
        {{-- <span class="badge bg-teal">{{$global_sheeping_orders->count()}}</span> --}}
        <i class="fa fa-gift"></i> المرسلة
      </a>
      {{-- completed orders --}}
      <a class="btn btn-app" href="{{route('admin.orders-completed')}}">
        {{-- <span class="badge bg-teal">{{$global_sheeping_orders->count()}}</span> --}}
        <i class="fa fa-check"></i> المكتملة
      </a>
      {{-- cancled orders --}}
      <a class="btn btn-app" href="{{route('admin.orders-canceled')}}">
        {{-- <span class="badge bg-teal">{{$global_sheeping_orders->count()}}</span> --}}
        <i class="fa fa-ban"></i> الملغية
      </a>
      <!---->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">جدول الطلبات</h3>
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
              <th>رقم الطلب</th>
              <th>اسم الزبون</th>
              <th>البريد الإكتروني</th>
              <th>العنوان</th>
              <th>عضوية الزبون</th>              
              <th>تاريخ الطلب</th>
              <th>حالة الطلب</th>
            </tr>
            @if($orders->count()>0)
            @foreach($orders as $index=>$order)
            <tr>
              <td>{{$index + 1}}</td>
              <td><a href="{{route('admin.order.details',$order->id)}}">{{$order->id}}#</a></td>
              <td>{{$order->billing_name}}</td>              
              <td>{{$order->billing_email}}</td>
              <td>{{$order->billing_address}}</td>
              <td>{!!consumer_is_register($order->consumer_id)!!}</td>             
              <td>{{$order->created_at->diffForHumans()}}</td>
              <td>{!!order_status($order->status)!!}</td>              
            </tr>
            @endforeach
            @else 
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><i class="fa fa-frown-o text-danger"> لا يوجد طلبات مسجلة</i></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endif
          </tbody></table>
          {{$orders->links()}}          
        </div><!-- /.box-body -->        
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->