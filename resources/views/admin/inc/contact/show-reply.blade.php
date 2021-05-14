@extends('admin.layouts.app')
@section('header')
@include('admin.inc.header.header')
@endsection
@section('side-bar')
@include('admin.inc.side-bar.side-bar')
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الرد
        <small>تفاصيل الرد</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">الرد</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="row">
        <div class="col-md-3">
          <a href="{{route('admin.create.contact')}}" class="btn btn-primary btn-block margin-bottom">إرسال رسالة</a>
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">الملفات</h3>
              <div class="box-tools">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            @include('admin.inc.contact.inc.mail-nav')
          </div><!-- /. box -->
        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">قراءة الرد</h3>
                {{-- <div class="box-tools pull-right">
                  <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="السابق"><i class="fa fa-chevron-right"></i></a>
                  <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="التالي"><i class="fa fa-chevron-left"></i></a>
                </div> --}}                
              </div><!-- /.box-header -->
              <div class="box-body no-padding">
                <div class="mailbox-read-info">
                  <h3>{{$reply->subject}}</h3>
                  <h5>من طرف: {{get_admin_data($reply->admin_id)->name}} <span class="mailbox-read-time pull-right">{{$reply->created_at}}</span></h5>
                </div><!-- /.mailbox-read-info -->
                {{-- <div class="mailbox-controls with-border text-center">
                  <div class="btn-group">
                    <a href="{{route('admin.reply.destroy',$reply->id)}}"><button class="btn btn-default btn-sm" data-toggle="tooltip" title="حذف"><i class="fa fa-trash-o"></i></button></a>
                    <a href="{{route('admin.con.reply',$reply->id)}}"><button class="btn btn-default btn-sm" data-toggle="tooltip" title="الرد"><i class="fa fa-share"></i></button></a>
                    <a href="{{route('admin.all.replys')}}"><button class="btn btn-default btn-sm" data-toggle="tooltip" title="تابع"><i class="fa fa-reply"></i></button></a>
                  </div><!-- /.btn-group -->
                  <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></button>
                </div><!-- /.mailbox-controls --> --}}
                <div class="mailbox-read-message">
                  {!!$reply->message!!}
                </div><!-- /.mailbox-read-message -->
              </div><!-- /.box-body -->              
              <div class="box-footer">
                <div class="pull-right">
                  {{-- <a href="{{route('admin.contact.reply',$contact->id)}}"><button class="btn btn-default"><i class="fa fa-share"></i> الرد</button></a> --}}
                  <a href="{{route('admin.all.replys')}}"><button class="btn btn-default"><i class="fa fa-reply"></i> تابع</button></a>
                </div>
                {{-- <a href="{{route('admin.reply.destroy',$reply->id)}}"><button class="btn btn-default"><i class="fa fa-trash-o"></i> حذف</button></a> --}}
                {{-- <button class="btn btn-default"><i class="fa fa-print"></i> Print</button> --}}
              </div><!-- /.box-footer -->
            </div><!-- /. box -->
          </div>
      </div>
      <!--End Page Content Here-->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
@endsection
@section('main-footer')
@include('admin.inc.main-footer.main-footer')
@endsection
@section('control-sidebar')
@include('admin.inc.control-sidebar.control-sidebar')
@endsection