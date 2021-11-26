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
        إعدادات المتجر
        <small>إعدادات عامة</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">إعدادات عامة</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">تعديل <small>تعديل الإعدادات العامة</small></h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body pad">
          <form action="{{route('admin.setting.update')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group {{$errors->has('store_name')?'has-error' : ''}}">
                <label for="store_name">{{store_name_label()}}</label>
                <input name="store_name" class="form-control" type="text" placeholder="أكتب إسم المتجر هنا" value="{{store_name_value()}}" >
                @if($errors->has('store_name'))
                <span class="help-block">
                    {{$errors->first('store_name')}}
                </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('phone')?'has-error' : ''}}">
              <label for="phone">{{store_phone_label()}}</label>
              <input name="phone" class="form-control" type="text" placeholder="أكتب هاتف المتجر هنا" value="{{store_phone_value()}}" >
              @if($errors->has('phone'))
              <span class="help-block">
                  {{$errors->first('phone')}}
              </span>
              @endif
          </div>
          <div class="form-group {{$errors->has('address')?'has-error' : ''}}">
            <label for="address">{{store_address_label()}}</label>
            <input name="address" class="form-control" type="text" placeholder="أكتب عنوان المتجر  هنا" value="{{store_address_value()}}" >
            @if($errors->has('address'))
            <span class="help-block">
                {{$errors->first('address')}}
            </span>
            @endif
        </div>
            <div class="form-group {{$errors->has('email')?'has-error' : ''}}">
                <label for="email">{{store_email_label()}}</label>
                <input name="email" class="form-control" type="text" placeholder="أكتب إسم المتجر هنا" value="{{store_email_value()}}" >
                @if($errors->has('email'))
                <span class="help-block">
                    {{$errors->first('email')}}
                </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('facebook')?'has-error' : ''}}">
                <label for="facebook">{{facebook_account_label()}}</label>
                <input name="facebook" class="form-control" type="text" placeholder="أكتب إسم المتجر هنا" value="{{facebook_account_value()}}" >
                @if($errors->has('facebook'))
                <span class="help-block">
                    {{$errors->first('facebook')}}
                </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('youtube')?'has-error' : ''}}">
                <label for="youtube">{{youtube_account_label()}}</label>
                <input name="youtube" class="form-control" type="text" placeholder="أكتب إسم المتجر هنا" value="{{youtube_account_value()}}" >
                @if($errors->has('youtube'))
                <span class="help-block">
                    {{$errors->first('youtube')}}
                </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('twitter')?'has-error' : ''}}">
                <label for="twitter">{{twitter_account_label()}}</label>
                <input name="twitter" class="form-control" type="text" placeholder="أكتب إسم المتجر هنا" value="{{twitter_account_value()}}" >
                @if($errors->has('twitter'))
                <span class="help-block">
                    {{$errors->first('twitter')}}
                </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('instagram')?'has-error' : ''}}">
                <label for="instagram">{{instagram_account_label()}}</label>
                <input name="instagram" class="form-control" type="text" placeholder="أكتب إسم المتجر هنا" value="{{instagram_account_value()}}" >
                @if($errors->has('instagram'))
                <span class="help-block">
                    {{$errors->first('instagram')}}
                </span>
                @endif
            </div>
            <div class="form-group">
                <input class="form-control btn btn-success" type="submit"  name="submit" value="تعديل">
            </div>
          </form>
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