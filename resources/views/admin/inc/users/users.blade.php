<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        المستخدمين
        <small>كل المستخدمين</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">كل المستخدمين</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">جدول المستخدمين</h3>
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
              <th>الوظيفة</th>
              <th>حالة الحساب</th>
              <th>التاريخ</th>              
              <th>العمليات</th>
            </tr>
            @if($users->count() > 0)
            @foreach($users as $index=>$user)
            <tr>
              <td>{{$index + 1}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{get_user_type_name($user->type)}}</td>
              <td>{!!user_is_active($user->active)!!}</td>
              <td>{{$user->created_at->diffForHumans()}}</td>
              <td>
                <a href="{{url('admin/user').'/'.$user->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a>
                @if($user->type !==1)
                <i id="delete_user" title="{{$user->name}}" url="{{url('admin/user').'/'.$user->id.'/delete'}}" class="fa fa-trash-o text-danger cursor-pointer"></i>
                @endif
              </td>
            </tr>
            @endforeach
            @else 
            <td></td>
            <td></td>
            <td></td>
            <td><i class="fa fa-frown-o text-danger"> لا يوجد مستخدمين مسجلين</i></td>
            <td></td>
            @endif
          </tbody></table>
        </div><!-- /.box-body -->
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->