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
        من نحن
        <small>صفحة من نحن</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">صفحة من نحن</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">تعديل <small>تعديل صفحة من نحن</small></h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body pad">
          <form action="{{route('admin.about_us.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="about_id" value="{{$about_us->id}}">
            <div class="form-group">
            <textarea id="article-ckeditor" name="editor" rows="10" cols="80">
                @if(!old('editor'))
                {{$about_us->content}}
                @else
                {{old('editor')}}
                @endif
            </textarea>
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