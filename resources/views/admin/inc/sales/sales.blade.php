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
              <th>اسم المستهلك</th>
              <th>اسم المنتج</th>
              <th>الكمية</th>
              <th>العمليات</th>
            </tr>
            @foreach($sales as $index=>$sale)
            <tr>
              <td>{{$index + 1}}</td>
              <td>{{$sale->consumer->name}}</td>
              <td>{{$sale->product->name}}</td>
              <td>{{$sale->qty}}</td>
              <td></td>
            </tr>
            @endforeach
          </tbody></table>
          {{$sales->links()}}          
        </div><!-- /.box-body -->        
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->