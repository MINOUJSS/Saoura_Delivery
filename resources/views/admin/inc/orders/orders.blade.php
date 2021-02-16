<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الطلبات 
        <small>كل الطلبات</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">الطلبات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
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
              <th>اسم الزبون</th>
              <th>البريد الإكتروني</th>
              <th>العنوان</th>
              <th>رقم الهاتف</th>
              <th>حالة الطلب</th>
              <th>العمليات</th>
            </tr>
            @if($orders->count()>0)
            @foreach($orders as $index=>$order)
            <tr>
              <td>{{$index + 1}}</td>
              <td>{{$order->billing_name}}</td>              
              <td>{{$order->billing_email}}</td>
              <td>{{$order->billing_address}}</td>
              <td>{{$order->billing_mobile}}</td>
              <td>{{$order->status}}</td>
              <td></td>
            </tr>
            @endforeach
            @else 
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><i class="fa fa-frown-o text-danger"> لا يوجد كلمات بحث مسجلة</i></td>
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