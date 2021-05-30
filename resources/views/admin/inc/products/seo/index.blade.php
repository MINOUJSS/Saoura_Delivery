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
        الكلمات المفتاحية للمنتج
        <small>الكلمات المفتاحية للمنتج</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">الكلمات المفتاحية للمنتج</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">جدول الكلمات المفتاحية للمنتجات</h3>
          <div class="box-tools">
            <div class="input-group" style="width: 150px;">
              <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table id="datatable" class="table table-hover">
            <tbody><tr>
              <th>#</th>
              <th>إسم المنتج</th>
              <th>الكلمات المفتاحية</th>
              <th>النص الختصر</th>
              <th>رابط المنتج</th>
              <th>العمليات</th>
            </tr>
            @if($seos->count()>0)
            @foreach ($seos as $index=>$seo )
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$seo->product->name}}</td>
                <td>{{$seo->key_words}}</td>
                <td>{{$seo->description}}</td>
                <td>{{$seo->link}}</td>
                <td>
                    <a href="{{route('admin.edit.product.seo',$seo->id)}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a>
                  <i id="delete_product_seo" title="{{$seo->product->name}}" url="{{route('admin.delete.product.seo',$seo->id)}}" class="fa fa-trash-o text-danger cursor-pointer"></i>
                </td>
              </tr>
            @endforeach            
            @else 
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>لا توجد كلمات مفتاحية مسجلة</td>
                <td></td>
                <td></td>
              </tr>
            @endif
          </tbody></table>
          {{$seos->links()}}
        </div><!-- /.box-body -->
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