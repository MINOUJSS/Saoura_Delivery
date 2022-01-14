<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('store')}}">الرئيسية</a></li>
            <li><a href="{{route('products')}}">المنتجات</a></li>
            {{-- <li><a href="{{url('products/category/'.$product->category->name)}}">{{$product->category->name}}</a></li> --}}
            <li class="active">{{$product->name}}</li>
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
            <!--  Product Details -->
            <div class="product product-details clearfix">

                @include('store.layouts.inc.product-page.product-main-view')
                @include('store.layouts.inc.product-page.product-body')
                <!--start video dev-->
                    @include('store.layouts.inc.product-page.product-videos')
                <!--end video dev-->
                <div class="col-md-12">
                @include('store.layouts.inc.product-page.product-tab')
                </div>

            </div>
            <!-- /Product Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
         <!-- row -->
         @include('store.layouts.inc.index.similar-products')        
         <!-- /row -->
         <!-- row -->
         @include('store.layouts.inc.index.accessories-products')        
         <!-- /row -->
        <!-- row -->
        @include('store.layouts.inc.index.picked-for-you')        
        <!-- /row -->       
    </div>
    <!-- /container -->
</div>
<!-- /section -->
