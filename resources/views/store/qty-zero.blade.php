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
            <!-- /ASIDE IN LARGE SCREEN-->

            <!-- MAIN -->
            <div id="main" class="col-md-9">

                <!-- DASHBOARD -->
                    <div class="row"> 
                        <!--start image-->
                        <div class="col-md-6" style="margin-top:10px;">
                            <div id="product-main-view">
                                <div class="product-view">
                                    <img src="{{url('admin-css/uploads/images/products/'.$product->image)}}">
                                </div>
                                @if(count(get_all_product_images($product->id))>=1)
                                @foreach(get_all_product_images($product->id) as $image)                    
                                <div class="product-view">
                                <img src="{{$image}}">
                                </div>
                                @endforeach
                                @endif
                                {{-- <div class="product-view">
                                    <img src="{{url('store')}}/img/main-product02.jpg" alt="">
                                </div>
                                <div class="product-view">
                                    <img src="{{url('store')}}/img/main-product03.jpg" alt="">
                                </div>
                                <div class="product-view">
                                    <img src="{{url('store')}}/img/main-product04.jpg" alt="">
                                </div> --}}
                            </div>
                            <div id="product-view">
                                <div class="product-view">
                                    <img src="{{url('admin-css/uploads/images/products/'.$product->image)}}">
                                </div>
                                @if(count(get_all_product_images($product->id))>=1)
                                @foreach(get_all_product_images($product->id) as $image)
                                <div class="product-view">
                                    <img src="{{$image}}" alt="test test">
                                </div>
                                @endforeach
                                @endif
                                {{-- <div class="product-view">
                                    <img src="{{url('store')}}/img/thumb-product03.jpg" alt="">
                                </div>
                                <div class="product-view">
                                    <img src="{{url('store')}}/img/thumb-product04.jpg" alt="">
                                </div> --}}
                            </div>
                        </div>
                        <!--end image-->
                        <!---->
                      <h1>عذراً,لقد نفذ هذا المنتج من مخازننا !</h1>
                      <p>يرجى الإتصال بإدارة المتجر لتوفير هذه السلعة الأسبوع المقبل من خلال صفحة : <b> <a href="{{route('contact_us')}}">إتصل بنا</a></b></p>
                      <a href="{{route('products')}}"><button class="primary-btn"><i class="fa fa-arrow-circle-left"> العودة للتسوق</i></button></a>
                        <!---->
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