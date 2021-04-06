<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         العروض الجانبية
        <small>كل العروض</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">العروض</li>
      </ol>
    </section>
  
    <!-- Main content -->
    <section class="content">
  
      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">جدول العروض الجانبية</h3>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-condensed">
            <tbody><tr>
              <th style="width: 10px">#</th>
              <th>المستخدم</th>
              <th>رقم المنتج</th>
              <th>عنوان العرض</th>
              <th>رابط المنتج</th>
              <th style="width:200px;">تاريخ نهاية العرض</th>
              <th>العمليات</th>
            </tr>
            @if($deals->count()>0)
            @foreach($deals as $index=>$deal)
            <tr>
              <td>{{$index+1}}.</td>
              <td>{{$deal->user_id}}</td>
              <td>{{$deal->product_id}}</td>
              <td>{{$deal->title}}</td>              
              <td>{{$deal->link}}</td>
              <td>{{$deal->exp_date}}</td>
              <td style="width : 100px;"><a href="{{url('admin/sid-deal').'/'.$deal->id.'/edit'}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a><i id="delete_sid_deal" title="{{$deal->title}}" url="{{url('admin/sid-deal').'/'.$deal->id.'/delete'}}" class="fa fa-trash-o text-danger cursor-pointer"></i></td>           
            </tr>
            @endforeach
            @else 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>لا توجد عروض حالياً</td>
            <td></td>           
            <td style="width: 10px"></td>
            @endif
          </tbody></table>
        </div><!-- /.box-body -->
      </div>
      <!-- End Of Your Page Content Here-->
  
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->