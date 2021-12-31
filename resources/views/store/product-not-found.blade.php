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
            {{-- <li class="active">من نحن</li> --}}
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
                        <!---->
                      <h1>عذراً,هذا المنتج غير موجود !</h1>
                      <p>يرجى الإتصال بإدارة المتجر لتوفير هذه السلعة الأسبوع المقبل من خلال <a href="{{route('contact_us')}}">إتصل بنا</a></p>
                      <a href="{{route('products')}}"><button class="primary-btn"><i class="fa fa-arrow-circle-left"> العودة للتسوق</i></button></a>
                        <!---->
                    </div>
                <!-- /DASHBOARD -->
            </div>
            <!-- /MAIN -->
            <!-- ASIDE IN SMALL SCREEN-->
            <div id="aside" class="hidden-md hidden-lg col-md-3">
                <!-- aside widget -->
                @if($sid_deal!==null)
                <div class="banner banner-2">
                    {{-- <img src="{{url('store')}}/img/banner14.jpg" alt="" height="438" width="263"> --}}
                    <img src="{{url('admin-css/uploads/images/deals').'/'.$sid_deal->image}}" alt="" height="438" width="263">
                    <div class="banner-caption">
                        <h2 class="white-color">{{$sid_deal->title}}</h2>
                        <a href="{{$sid_deal->link}}"><button class="primary-btn">أطلب الآن</button></a>
                    </div>
                </div>
                @endif
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