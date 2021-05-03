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
              <h3 class="box-title">البريد الوارد</h3>
              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                {{-- <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button> --}}
                <div class="btn-group">
                  {{-- <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                  <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button> --}}
                </div><!-- /.btn-group -->
                <button onclick="window.location.reload();" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">                  
                  {{$contacts->links('vendor.pagination.admin-contact-pagination')}}
                  {{-- <div class="btn-group">
                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                  </div><!-- /.btn-group --> --}}
                </div><!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                      @if($contacts->count()>0)
                      @foreach ($contacts as $contact)
                      <tr>
                        <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></td>
                        <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                        <td class="mailbox-name"><a href="{{route('admin.contact.show',$contact->id)}}">{{$contact->name}}</a></td>
                        <td class="mailbox-subject">@if(get_no_read_contact()>0)<b>{!!$contact->title!!}</b>@else {!!$contact->title!!} @endif - {!!substr($contact->message,0,50)!!}...</td>
                        <td class="mailbox-attachment"></td>
                        <td class="mailbox-date">{{$contact->created_at->diffForHumans()}}</td>
                      </tr>
                      @endforeach                    
                    @else 
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>لا توجد أي رسالة</td>                        
                        <td></td>
                      </tr>
                    @endif
                  </tbody>
                </table><!-- /.table -->
              </div><!-- /.mail-box-messages -->
            </div><!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                {{-- <!-- Check all button -->
                <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                <div class="btn-group">
                  <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                  <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                </div><!-- /.btn-group -->
                <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button> --}}
                <div class="pull-right">                  
                  {{$contacts->links('vendor.pagination.admin-contact-pagination')}}
                  {{-- 1-50/200
                  <div class="btn-group">
                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                  </div><!-- /.btn-group --> --}}
                </div><!-- /.pull-right -->
              </div>
            </div>
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