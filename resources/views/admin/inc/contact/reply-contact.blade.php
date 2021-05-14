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
              @if(!has_reply($contact->id))
              <h3 class="box-title">كتابة الرد على الرسالة</h3>
              @else 
              <h3 class="box-title">تم الرد على الرسالة</h3>
              @endif
            </div><!-- /.box-header -->            
            <div class="box-body">
              @if(!has_reply($contact->id))
                        <!--the message--> 
          <div class="box-body no-padding">
            <div class="mailbox-read-info">
              <h3>{{$contact->title}}</h3>
              <h5>من طرف: {{$contact->name}} <span class="mailbox-read-time pull-right">{{$contact->created_at}}</span></h5>
            </div><!-- /.mailbox-read-info -->
            <div class="mailbox-controls with-border text-center">
              <div class="btn-group">
                <a href="{{route('admin.contact.destroy',$contact->id)}}"><button class="btn btn-default btn-sm" data-toggle="tooltip" title="حذف"><i class="fa fa-trash-o"></i></button></a>
                {{-- <a href="{{route('admin.con.reply',$reply->id)}}"><button class="btn btn-default btn-sm" data-toggle="tooltip" title="الرد"><i class="fa fa-share"></i></button></a> --}}
                <a href="{{route('admin.all.contacts')}}"><button class="btn btn-default btn-sm" data-toggle="tooltip" title="تابع"><i class="fa fa-reply"></i></button></a>
              </div><!-- /.btn-group -->
              {{-- <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></button> --}}
            </div><!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
              {!!$contact->message!!}
            </div><!-- /.mailbox-read-message -->
          </div><!-- /.box-body -->              
          <!--end the message-->
          <h2>الرد</h2>            
              <form action="{{route('admin.contact.reply.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group {{$errors->has('to')? 'has-error':''}}">
                <input type="hidden" name="contact_us_id" value="{{$contact->id}}"> 
                <input type="hidden" name="to" class="form-control" placeholder="إلى:" value="{{$contact->email}}">
                <input  class="form-control" placeholder="إلى:" value="{{$contact->email}}" disabled>
                {{-- @if($errors->has('to'))
                <span class="help-block">
                  {{$errors->first('to')}}
                </span>
                @endif --}}
              </div>
              <div class="form-group {{$errors->has('subject')? 'has-error': ''}}">
                <input name="subject" class="form-control" placeholder="الموضوع:">
                @if($errors->has('subject'))
                <span class="help-block">
                  {{$errors->first('subject')}}
                </span>
                @endif
              </div>
              <div class="form-group {{$errors->has('message')? 'hes-error' : ''}}">                
                <textarea class="form-control" name="message" id="article-ckeditor" cols="30" rows="3" placeholder="أكتب رسالتك هنا">{{old('message')}}</textarea>
                @if($errors->has('message'))
                <span class="help-block">
                  {{$errors->first('message')}}
                </span>
                @endif
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
                {{-- <button class="btn btn-default"><i class="fa fa-pencil"></i> مسودة</button> --}}
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> إرسال</button>
              </div>
              {{-- <button class="btn btn-default"><i class="fa fa-times"></i> Discard</button> --}}
            </div><!-- /.box-footer -->
          </form>
          @else
          <!--the message--> 
          <div class="box-body no-padding">
            <div class="mailbox-read-info">
              <h3>{{$contact->title}}</h3>
              <h5>من طرف: {{$contact->name}} <span class="mailbox-read-time pull-right">{{$contact->created_at}}</span></h5>
            </div><!-- /.mailbox-read-info -->
            <div class="mailbox-controls with-border text-center">
              <div class="btn-group">
                <a href="{{route('admin.contact.destroy',$contact->id)}}"><button class="btn btn-default btn-sm" data-toggle="tooltip" title="حذف"><i class="fa fa-trash-o"></i></button></a>
                {{-- <a href="{{route('admin.con.reply',$reply->id)}}"><button class="btn btn-default btn-sm" data-toggle="tooltip" title="الرد"><i class="fa fa-share"></i></button></a> --}}
                <a href="{{route('admin.all.contacts')}}"><button class="btn btn-default btn-sm" data-toggle="tooltip" title="تابع"><i class="fa fa-reply"></i></button></a>
              </div><!-- /.btn-group -->
              {{-- <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></button> --}}
            </div><!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
              {!!$contact->message!!}
            </div><!-- /.mailbox-read-message -->
          </div><!-- /.box-body -->              
          <!--end the message-->
          <!--the reply-->
          <h2>الرد</h2>
          <div class="box-body no-padding">
            <div class="mailbox-read-info">
              <h3>{{$contact->reply->subject}}</h3>
              <h5>من طرف: {{get_admin_data($contact->reply->admin_id)->name}} <span class="mailbox-read-time pull-right">{{$contact->reply->created_at}}</span></h5>
            </div><!-- /.mailbox-read-info -->
            {{-- <div class="mailbox-controls with-border text-center">
              <div class="btn-group">
                <a href="{{route('admin.reply.destroy',$contact->reply->id)}}"><button class="btn btn-default btn-sm" data-toggle="tooltip" title="حذف"><i class="fa fa-trash-o"></i></button></a>
                <a href="{{route('admin.con.reply',$reply->id)}}"><button class="btn btn-default btn-sm" data-toggle="tooltip" title="الرد"><i class="fa fa-share"></i></button></a>
                <a href="{{route('admin.all.replys')}}"><button class="btn btn-default btn-sm" data-toggle="tooltip" title="تابع"><i class="fa fa-reply"></i></button></a>
              </div><!-- /.btn-group -->
              <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></button>
            </div><!-- /.mailbox-controls --> --}}
            <div class="mailbox-read-message">
              {!!$contact->reply->message!!}
            </div><!-- /.mailbox-read-message -->
          </div><!-- /.box-body -->              
          <!--end the reply-->
          @endif
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