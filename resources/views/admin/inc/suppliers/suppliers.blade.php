<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الموردون
        <small>كل الموردين</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">كل الموردين</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">جدول الموردين</h3>
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
              <th>الإسم</th>
              <th>البريد الإلكتروني</th>
              <th>رقم الهاتف</th>
              <th>العنوان</th>
              <th>التاريخ</th>
              <th>العمليات</th>
            </tr>
            @if($suppliers->count() >0)
            @foreach($suppliers as $index=>$supplier)
            <tr>
              <td>{{$index + 1}}</td>
              <td>{{$supplier->name}}</td>
              <td>{{$supplier->email}}</td>
              <td>{{$supplier->mobile}}</td>
              <td>{{$supplier->address}}</td>
              <td>{{$supplier->created_at->diffForHumans()}}</td>
              <td><a href="{{url('admin/supplier').'/'.$supplier->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a><i id="delete_supplier" title="{{$supplier->name}}" url="{{url('admin/supplier').'/'.$supplier->id.'/delete'}}" class="fa fa-trash-o text-danger cursor-pointer"></i></td>
            </tr>
            @endforeach
            @else 
            <td></td>
            <td></td>
            <td></td>
            <td><i class="fa fa-frown-o text-danger"> لا توجد ألوان مسجلة</i></td>
            <td></td>
            @endif
          </tbody></table>
          {{$suppliers->links()}}
        </div><!-- /.box-body -->
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->