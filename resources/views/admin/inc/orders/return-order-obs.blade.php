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
        أسباب إرجاع الطلب
        <small>كل أسباب إرجاع الطلب</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">أسباب إرجاع الطلب</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">أسباب إرجاع الطلب</h3>         
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody><tr>
              <th>#</th>
              <th>سبب إرجاع الطلب</th>
              <th>التاريخ</th>
              <th>العمليات</th>
            </tr>
            @foreach($return_obses as $index=>$obs)
            <tr>
              <td>{{$index+1}}</td>
              <td>{{$obs->obs}}</td>
              <td>{{$obs->created_at->format('Y-m-d')}}</td>
              <td>
                <a href="{{route('admin.return.order.observation.edit',$obs->id)}}" style="margin-left:20px;"><i class="fa fa-edit text-success"></i></a>
                  <i id="delete_return_order_obs" title="{{$obs->obs}}" url="{{route('admin.return.order.observation.delete',$obs->id)}}" class="fa fa-trash-o text-danger cursor-pointer"></i>                
              </td>
            </tr>     
            @endforeach       
          </tbody></table>
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