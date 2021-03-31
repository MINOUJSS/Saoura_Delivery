<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
        <li><a href="{{url('/')}}">الرئيسية</a></li>
            <li class="active">حسابي</li>
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
                <div class="row" style="display: block">                    
                    <div class="col-lg-3 col-sm-12 col-xs-12 pull-left">    
                        <a href="{{route('consumer.orders',Auth::guard('consumer')->user()->id)}}">                
                        <div class="dash-div">
                            <h4><i class="fa fa-calendar-check-o"></i> طلباتي</h4>
                            <p>جميع طلباتك هنا</p>
                        </div>                    
                        </a>
                    </div>                
                    <div class="col-lg-3 col-sm-12 col-xs-12 pull-left">                    
                        <a href="{{route('consumer.edit.account',Auth::guard('consumer')->user()->id)}}">
                        <div class="dash-div">
                            <h4><i class="fa fa-edit"></i> تعديل معلوماتي</h4>
                            <p>يمكنك تعديل معلوماتك من هنا</p>
                        </div>
                    </a>
                    </div>                
                    <div class="col-lg-3 col-sm-12 col-xs-12 pull-left">
                        <a href="{{route('consumer.edit.password',Auth::guard('consumer')->user()->id)}}">
                            <div class="dash-div">
                                <h4><i class="fa fa-lock"></i> تغيير كلمة المرور</h4>
                                <p>يمكنك تغيير كلمة المرور من هنا</p>
                            </div>
                        </a>
                    </div>
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
