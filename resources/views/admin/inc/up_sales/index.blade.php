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
        ربط المنتجات
        <small>ربط المنتجات ببعضها</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">ربط المنتجات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">جدول العلاقات بين المنتجات</h3>
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
            <table class="table table-hover">
              <tbody><tr>
                <th>#</th>
                <th>صورة المنتج الرئيسي</th>
                <th>إسم المنتج الرئيسي</th>                
                <th>صورة المنتج الثانوي</th>
                <th>إسم المنتج الثانوي</th>
                <th>العمليات</th>
              </tr>
              @if(count($upsales)>0)
              @foreach($upsales as $index => $upsale)
              <tr>
                <td>{{$index+1}}</td>
                <td><img src="{{url('/admin-css/uploads/images/products/'.get_product_data_from_id($upsale->first_product_id)->image)}}" height="50" width="50"></td>
                <td>{{get_product_data_from_id($upsale->first_product_id)->name}}</td>
                <td><img src="{{url('/admin-css/uploads/images/products/'.get_product_data_from_id($upsale->second_product_id)->image)}}" height="50" width="50"></td>
                <td>{{get_product_data_from_id($upsale->second_product_id)->name}}</td>
                <td>
                  <a href="{{route('admin.upsale.edit',$upsale->id)}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a>
                  <i id="delete_up_sale" title="{{$upsale->id}}" url="{{route('admin.upsale.delete',$upsale->id)}}" class="fa fa-trash-o text-danger cursor-pointer"></i>
                </td>
              </tr>     
              @endforeach
              @else 
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>لا توجد علاقات بين المنتجات</td>
                <td></td>
                <td></td>
              @endif         
            </tbody></table>
            {{$upsales->links()}}
          </div><!-- /.box-body -->
        </div><!-- /.box -->
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