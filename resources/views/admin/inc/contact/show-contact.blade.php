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
        إتصل بنا
        <small>كل الإتصالات</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">إتصل بنا</li>
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
          {{-- <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Labels</h3>
              <div class="box-tools">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
              </ul>
            </div><!-- /.box-body -->
          </div><!-- /.box --> --}}
        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">قراءة الرسالة</h3>
                {{-- <div class="box-tools pull-right">
                  <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="السابق"><i class="fa fa-chevron-right"></i></a>
                  <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="التالي"><i class="fa fa-chevron-left"></i></a>
                </div> --}}
              </div><!-- /.box-header -->
              <div class="box-body no-padding">
                <div class="mailbox-read-info">
                  <h3>{{$contact->title}}</h3>
                  <h5>من طرف: {{$contact->name}} <span class="mailbox-read-time pull-right">{{$contact->created_at}}</span></h5>
                </div><!-- /.mailbox-read-info -->
                <div class="mailbox-controls with-border text-center">
                  <div class="btn-group">
                    <a href="{{route('admin.contact.destroy',$contact->id)}}"><button class="btn btn-default btn-sm" data-toggle="tooltip" title="حذف"><i class="fa fa-trash-o"></i></button></a>
                    <a href="{{route('admin.contact.reply',$contact->id)}}"><button class="btn btn-default btn-sm" data-toggle="tooltip" title="الرد"><i class="fa fa-share"></i></button></a>
                    <a href="{{route('admin.all.contacts')}}"><button class="btn btn-default btn-sm" data-toggle="tooltip" title="تابع"><i class="fa fa-reply"></i></button></a>
                  </div><!-- /.btn-group -->
                  {{-- <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></button> --}}
                </div><!-- /.mailbox-controls -->
                <div class="mailbox-read-message">
                  {!!$contact->message!!}
                </div><!-- /.mailbox-read-message -->
              </div><!-- /.box-body -->
              {{-- <div class="box-footer">
                <ul class="mailbox-attachments clearfix">
                  <li>
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                      <span class="mailbox-attachment-size">
                        1,245 KB
                        <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                      </span>
                    </div>
                  </li>
                  <li>
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>
                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> App Description.docx</a>
                      <span class="mailbox-attachment-size">
                        1,245 KB
                        <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                      </span>
                    </div>
                  </li>
                  <li>
                    <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png" alt="Attachment"></span>
                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo1.png</a>
                      <span class="mailbox-attachment-size">
                        2.67 MB
                        <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                      </span>
                    </div>
                  </li>
                  <li>
                    <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo2.png" alt="Attachment"></span>
                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo2.png</a>
                      <span class="mailbox-attachment-size">
                        1.9 MB
                        <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                      </span>
                    </div>
                  </li>
                </ul>
              </div><!-- /.box-footer --> --}}
              <div class="box-footer">
                <div class="pull-right">
                  <a href="{{route('admin.contact.reply',$contact->id)}}"><button class="btn btn-default"><i class="fa fa-share"></i> الرد</button></a>
                  <a href="{{route('admin.all.contacts')}}"><button class="btn btn-default"><i class="fa fa-reply"></i> تابع</button></a>
                </div>
                <a href="{{route('admin.contact.destroy',$contact->id)}}"><button class="btn btn-default"><i class="fa fa-trash-o"></i> حذف</button></a>
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