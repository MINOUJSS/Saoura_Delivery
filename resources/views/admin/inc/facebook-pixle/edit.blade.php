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
        Facebook Pixel
        <small>كود فيسبوك بيكسل</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">كود فيسبوك بيكسل</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">تعديل <small>تعديل كود فيسبوك بيكسل</small></h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body pad">
          <form action="{{route('admin.update.facebook.pixle')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{$errors->has('avtive')? 'has-error': ''}}">
              <label for="active">التفعيل</label>
                <select name="active" class="form-control">
                    <option value="0" @if(old('active')==0 || $pixle->active==0){{'selected'}}@endif>غير مفعل</option>
                    <option value="1" @if(old('active')==1 || $pixle->active==1){{'selected'}}@endif>مفعل</option>
                </select>
            @if($errors->has('active'))
                <span class="help-block">
                    {{$errors->first('active')}}
                </span>
            @endif
            </div>
            <div class="form-group {{$errors->has('code')? 'has-error' : ''}}">
              <label for="code">الكود</label>
            <textarea class="form-control" name="code" rows="10" cols="80">
                @if(!old('code'))
                {{$pixle->code}}
                @else
                {{old('code')}}
                @endif
            </textarea>
            @if($errors->has('code'))
            <span class="help-block">
                {{$errors->first('code')}}
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