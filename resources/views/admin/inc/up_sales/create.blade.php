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
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">إنشاء علاقة بين منتجين</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('admin.upsale.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="box-body">
            <div class="form-group {{$errors->has('first_product_id')? 'has-error' : ''}}">
              <label for="first_product_id">رقم المنتج الرئيسي</label>
              <input type="number" name="first_product_id" class="form-control" placeholder="أكتب رقم المنتج الرئيسي" value="{{old('first_product_id')}}">
              @if($errors->has('first_product_id'))
              <span class="help-block">
                {{$errors->first('first_product_id')}}
              </span>
              @endif
            </div>
            <div class="form-group {{$errors->has('second_product_id')? 'has-error' : ''}}">
              <label for="second_product_id">رقم المنتج الثانوي</label>
              <input type="number" name="second_product_id" class="form-control" placeholder="أكتب رقم المنتج الثانوي" value="{{old('second_product_id')}}">
              @if($errors->has('second_product_id'))
              <span class="help-block">
                {{$errors->first('second_product_id')}}
              </span>
              @endif
            </div>
            <div class="form-group">
              <label for="type">طبيعة المنتج الثانوي بالنسبة للرئيسي</label>
              <select name="type" class="form-control">
                <option value="1" @if(old('type')==1) {{'selected'}} @endif>منتج مشابه</option>
                <option value="2" @if(old('type')==2) {{'selected'}} @endif>منتج مكمل</option>
              </select>
            </div>            
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">حفظ</button>
          </div>
        </form>
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