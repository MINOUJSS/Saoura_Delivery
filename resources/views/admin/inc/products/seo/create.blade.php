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
        إضافة الكلمات المفتاحية للمنتج
        <small>تهيئة الصفحة لمحركات البحث</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">إضافة الكلمات المفتاحية للمنتج</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">إضافة <small>إضافة الكلمات المفتاحية للمنتج</small></h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body pad">
          <form action="{{route('admin.store.product.seo')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <div class="form-group {{$errors->has('keywords')? 'has-error' : ''}}">
                <label for="keywords">الكلمات المفتاحية</label>
               <textarea class="form-control" name="keywords" placeholder="أكتب الكلمات المفتاحية هنا مثال:(ساعة,وقت,منبه)" rows="4">
                {{old('keywords')}}
               </textarea> 
                @if ($errors->has('keywords'))
                    <span class="help-block">
                        {{$errors->first('keywords')}}
                    </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('description')? 'has-error' : ''}}">
                <label for="description">نص مختصر يحتوي على الكلمات المفتاحية</label>
                <textarea id="article-ckeditor" class="form-control" name="description" placeholder="أكتب الكلمات المفتاحية هنا مثال:(ساعة,وقت,منبه)" rows="5">
                    {{old('description')}}
                   </textarea>
                @if ($errors->has('description'))
                    <span class="help-block">
                        {{$errors->first('description')}}
                    </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('link')? 'has-error' : ''}}">
                <label for="link">مسار المنتج</label>
                <input type="text" name="link" class="form-control" value="{{old('link')}}">
                @if ($errors->has('link'))
                    <span class="help-block">
                        {{$errors->first('link')}}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input class="form-control btn btn-success" type="submit"  name="submit" value="إضافة">
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