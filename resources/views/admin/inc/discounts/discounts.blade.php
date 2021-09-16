<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        التخفيضات 
        <small>كل التخفيضات</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">التخفيضات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">جدول التخفيضات</h3>
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
              <th>رقم المنتج</th>
              <th>قيمة التخفيض</th>
              <th>تاريخ إنتهاء التخفيض</th>
              <th>العمليات</th>
            </tr>
            @if($discounts->count()>0)
            @foreach($discounts as $index=>$discount)
            <tr>
              <td>{{$index + 1}}</td>
              <td>{{$discount->product_id}}</td>              
              <td>{{get_product_discount($discount->product_id)}} %</td>
              <td>{{$discount->exp_date}}</td>              
              <td>
                <a href="{{url('admin/product/discount').'/'.$discount->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a>
                <i id="delete_discount" title="{{$discount->descount}}" url="{{url('admin/product/discount').'/'.$discount->id.'/delete'}}" class="fa fa-trash-o text-danger cursor-pointer"></i>
              </td>
            </tr>
            @endforeach
            @else 
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><i class="fa fa-frown-o text-danger"> لا يوجد تخفيضات مسجلة</i></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endif
          </tbody></table>
          {{$discounts->links()}}          
        </div><!-- /.box-body -->        
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->