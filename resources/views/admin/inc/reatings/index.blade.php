<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        التقييمات
        <small>كل التقييمات</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">التقييمات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">جدول التقييمات</h3>
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
              <th>الاسم</th>
              <th>مسجل في المتجر</th>
              <th>إسم المنتج (رقم المنتج)</th>
              <th>البريد الإلكتروني</th>
              <th>التقييم</th>
              <th>التعليق</th>
              <th>حالة التقييم</th>
              <th>التاريخ</th>
              <th>عمليات</th>             
            </tr>
            @if($reatings->count()>0)
            @foreach($reatings as $index=>$reating)
            <tr>
              <td>{{$index + 1}}</td>
              <td><a href="{{url('/admin/reating').'/'.$reating->id}}">{{$reating->name}}</a></td>
              <td>{!!consumer_is_register($reating->consumer_id)!!}</td>
              <td>{{get_product_data_from_id($reating->product_id)->name.'('.$reating->product_id.')'}}</td>
              <td>{{$reating->email}}</td>
              <td>{{$reating->reating}}</td>
              <td>{{$reating->review}}</td>
              <td>{!!reating_is_visible($reating->visible)!!}</td>
              <td>{{$reating->created_at->diffForHumans()}}</span></td>
              <td>
              @if($reating->visible == 0)
                <a href="{{url('admin/reating').'/'.$reating->id.'/approve'}}" style="margin-left:20px;"><button class="btn btn-success">نشر</button></a>
              @endif
                  <i id="delete_reating" title="حذف تقييم {{$reating->name}}" url="{{url('admin/reating').'/'.$reating->id.'/delete'}}" class="fa fa-trash-o text-danger cursor-pointer"></i></td>
              </td>
            </tr>
            @endforeach
            @else 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>لا توجد تقييمات</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            @endif
          </tbody></table>
          {{$reatings->links()}}          
        </div><!-- /.box-body -->        
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->