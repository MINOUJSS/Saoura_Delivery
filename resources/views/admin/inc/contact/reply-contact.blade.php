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
        الرد على الرسالة
        <small>الرد على الرسالة</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">الرد على الرسالة</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="row">
        <div class="col-md-3">
          <a href="{{route('admin.all.contacts')}}" class="btn btn-primary btn-block margin-bottom">الرجوع لقائمة الرسائل</a>
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
              <h3 class="box-title">كتابة الرد على الرسالة</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <input class="form-control" placeholder="إلى:" value="{{$contact->email}}" disabled>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="الموضوع:">
              </div>
              <div class="form-group">                
                <textarea class="form-control" name="message" id="article-ckeditor" cols="30" rows="3" placeholder="أكتب رسالتك هنا">{{old('message')}}</textarea>
              </div>
              {{-- <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <input type="file" name="attachment">
                </div>
                <p class="help-block">Max. 32MB</p>
              </div> --}}
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button class="btn btn-default"><i class="fa fa-pencil"></i> مسودة</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> إرسال</button>
              </div>
              {{-- <button class="btn btn-default"><i class="fa fa-times"></i> Discard</button> --}}
            </div><!-- /.box-footer -->
          </div><!-- /. box -->
        </div><!-- /.col -->
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