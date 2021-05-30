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
        قائمة إرسال الطلبات
        <small>قائمة إرسال الطلبات</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">قائمة إرسال الطلبات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">جدول الطلبات الواجب تسليمها</h3>          
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody><tr>
              <th>#</th>
              <th>رقم الطلب</th>
              <th>إسم الزبون</th>
              <th>هاتف الزبون</th>
              <th>عنوان التسليم</th>
              <th>المبلغ المستحق</th>
            </tr>
            @foreach ($orders as $index=>$order)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$order->id}}</td>
                <td>{{$order->billing_name}}</td>
                <td>{{$order->billing_mobile}}</td>
                <td>{{$order->billing_address}}</td>                
                <td>{{$order->total}}</td>
              </tr>
            @endforeach            
          </tbody></table>
          {{$orders->links()}}
        </div><!-- /.box-body -->
      </div>
            <!--print btn-->
            <a href="{{route('admin.delivery.list.print')}}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> طباعة الكل</a>
            <!--/print btn-->
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