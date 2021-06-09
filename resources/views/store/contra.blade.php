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
            <li class="active">سياسة خصوصية</li>
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
            <!-- ASIDE IN LARGE SCREEN-->
            <div id="aside" class="hidden-xs hidden-sm col-md-3">
                <!-- aside widget -->

                <!-- /aside widget -->
            </div>
            <!-- /ASIDE IN LARGE SCREEN-->

            <!-- MAIN -->
            <div id="main" class="col-md-9">

                <!-- DASHBOARD -->
                    <div class="row">                    
                        @if ($contra!=null)
                        {!!$contra->content!!}  
                      @else
                          <h1>لا يوجد محتوى في هذه الصفحة</h1>
                      @endif
                    </div>
                <!-- /DASHBOARD -->
            </div>
            <!-- /MAIN -->

            <!-- ASIDE IN SMALL SCREEN-->
            <div id="aside" class="hidden-md hidden-lg col-md-3">
                <!-- aside widget -->

                <!-- /aside widget -->
            </div>
            <!-- /ASIDE IN SMALL SCREEN-->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@endsection