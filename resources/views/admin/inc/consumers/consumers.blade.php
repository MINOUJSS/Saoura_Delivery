<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        المستهلكين
        <small>كل المستهلكين</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">المستهلكين</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">جدول المستهلكين</h3>
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
              <th>لقب المستهلك</th>
              <th>البريد الإلكتروني</th>
              <th>رقم الهاتف</th>
              <th>العنوان</th>
              <th>العنوان على جوجل ماب</th>
              <th>العمليات</th>
            </tr>
            @foreach($consumers as $index=>$consumer)
            <tr>
              <td>{{$index + 1}}</td>
              <td>{{$consumer->name}}</td>
              <td>{{$consumer->lastname}}</td>
              <td>{{$consumer->email}}</td>
              <td>{{$consumer->telephone}}</td>
              <td>{{$consumer->address}}</td>
              <td>{{$consumer->googl_map_address}}</td>
              <td></td>
            </tr>
            @endforeach
          </tbody></table>
          {{$consumers->links()}}          
        </div><!-- /.box-body -->        
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->