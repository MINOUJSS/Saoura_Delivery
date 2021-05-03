<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        المقاسات
        <small>كل المقاسات</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">كل المقاسات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">جدول المقاسات</h3>
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
              <th>اللون</th>
              <th>كود اللون</th>
              <th>التاريخ</th>
              <th>العمليات</th>
            </tr>
            @if($sizes->count() > 0)
            @foreach($sizes as $index=>$size)
            <tr>
              <td>{{$index + 1}}</td>
              <td>{{$size->name}}</td>
              <td>{{$size->size}}</td>
              <td>{{$size->created_at->diffForHumans()}}</td>
              <td>
                @if($size->id!=1)
                <a href="{{url('admin/size').'/'.$size->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a><i id="delete_size" title="{{$size->name}}" url="{{url('admin/size').'/'.$size->id.'/delete'}}" class="fa fa-trash-o text-danger cursor-pointer"></i>
                @else 
                لا يمكن التعديل أو الحذف
                @endif                
              </td>
            </tr>
            @endforeach
            @else 
            <td></td>
            <td></td>
            <td></td>
            <td><i class="fa fa-frown-o text-danger"> لا توجد مقاسات مسجلة</i></td>
            <td></td>
            @endif
          </tbody></table>
        </div><!-- /.box-body -->
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->