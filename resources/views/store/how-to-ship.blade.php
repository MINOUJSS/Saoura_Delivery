@extends('store.layouts.app')
@section('header')
@include('store.layouts.inc.header.header')
@endsection
@section('navigation')
@include('store.layouts.inc.navigation.navigation')
@endsection
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
        <li><a href="{{url('/')}}">الرئيسية</a></li>
            <li class="active">طريقة تسليم الطلبات</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside widget -->

                <!-- /aside widget -->
            </div>
            <!-- /ASIDE -->

            <!-- MAIN -->
            <div id="main" class="col-md-9">

                <!-- DASHBOARD -->
                <div class="container">
                    <div class="row">                                            
                        @if ($how_to_ship!=null)
                        {!!$how_to_ship->content!!}  
                      @else
                          <h1>لا يوجد محتوى في هذه الصفحة</h1>
                      @endif
                    </div>
                </div>
                <!-- /DASHBOARD -->
            </div>
            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@endsection