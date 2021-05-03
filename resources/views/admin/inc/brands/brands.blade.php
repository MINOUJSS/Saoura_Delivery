<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        العلامات التجارية
        <small>كل العلامات التجارية</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">العلامات التجارية</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">جدول العلامات التجارية</h3>
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
              <th>العلامة التجارية</th>
              <th>التاريخ</th>
              <th>المستخدم</th>
              <th>العمليات</th>              
            </tr>
            @foreach($brands as $index=>$brand)
            <tr>
              <td>{{$index+1}}</td>
              <td>{{$brand->name}}</td>
              <td>{{$brand->created_at->diffForHumans()}}</td>
              <td>{{$brand->user->name}}</td>
              <td><a href="{{url('admin/brand').'/'.$brand->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a><i id="delete_brand" title="{{$brand->name}}" url="{{url('admin/brand').'/'.$brand->id.'/delete'}}" class="fa fa-trash-o text-danger cursor-pointer"></i></td>
            </tr>
            @endforeach
          </tbody></table>
          {{$brands->links()}}
        </div><!-- /.box-body -->
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->