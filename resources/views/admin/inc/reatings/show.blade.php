<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تفاصيل التقييم
        <small>تفاصيل التقييم</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">تفاصيل التقييم</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">تفاصيل التقييم</h4>
                  </div>
                  <div class="modal-body">
                  <h4>إسم المقييم :</h4>
                  <p>{{$reating->name}}</p>
                  <h4>عدد النجوم الممنوحة للمنتج : </h4>
                  <p>{{$reating->reating}}</p>
                  <h4>محتوى التقييم : </h4>
                  <p>{{$reating->review}}</p>
                  </div>
                  <div class="modal-footer">
                    <a href="{{url('admin/reating').'/'.$reating->id.'/approve'}}" style="margin-left:20px;"><button type="button" id="delete_reating" title="حذف تقييم {{$reating->name}}" url="{{url('admin/reating').'/'.$reating->id.'/delete'}}" class="btn btn-default pull-left" data-dismiss="modal">حذف التقييم</button></a>
                    @if($reating->visible==0)
                    <button type="button" class="btn btn-primary">نشر التقييم</button>
                    @endif
                  </div>
                </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->