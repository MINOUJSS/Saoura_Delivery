<script>
    fbq('track', 'Purchase', {
      value: 10,
      currency: 'DA',
    });
  </script>
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
        <li><a href="{{url('/')}}">الرئيسية</a></li>
            <li class="active">صفحة شكر</li>
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
            <div id="main" class="col-md-9 text-center" style="padding-top:20px;padding-bottom:20px;">            
                <h2>شكراً لك لتأكيد طلبك سيقوم أحد مندوبينا بالإتصال بك خلال مدة لا تتعدى 24 ساعة.</h2>
                <a href="{{route('products')}}"><button class="primary-btn"><i class="fa fa-arrow-circle-left">العودة للتسوق</i></button></a>
                
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
