<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
        <li><a href="{{route('consumer.dashboard',Auth::guard('consumer')->user()->id)}}">حسابي</a></li>
            <li class="active">طلباتي</li>
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
                <div class="aside">
                    {{-- <h3 class="aside-title"></h3> --}}
                    <ul class="consumer-menu">
                        <li><a href="{{route('consumer.dashboard',Auth::guard('consumer')->user()->id)}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                        <li><a href="{{route('consumer.edit.account',Auth::guard('consumer')->user()->id)}}"><i class="fa fa-edit"></i> تعديل معلوماتي</a></li>
                        <li><a href="{{route('consumer.edit.password',Auth::guard('consumer')->user()->id)}}"><i class="fa fa-lock"></i> تغيير كلمة المرور</a></li>
                    </ul>
                </div>
                <!-- /aside widget -->
            </div>
            <!-- /ASIDE -->
             
            <!-- MAIN -->
            <div id="main" class="col-md-9">

                <!-- MAIN -->
                    <div class="row">
                        
                        <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">جدول الطلبات</h3>                              
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                              <table class="table table-hover">
                                <tbody><tr>
                                  <th>#</th>
                                  <th style="text-align:right !important;">رقم الطلب</th>                                
                                  <th style="text-align:right !important;">الاسم</th>
                                  <th style="text-align:right !important;">البريد الالكتروني</th>
                                  <th style="text-align:right !important;">العنوان</th>
                                  <th style="text-align:right !important;">التاريخ</th>
                                  <th style="text-align:right !important;">حالة الطلب</th>
                                </tr>
                                @if(count($orders)>0)
                                @foreach($orders as $index=>$order)
                                <tr>
                                  <td>{{$index+1}}</td>
                                  <td><a href="{{route('consumer.order-details',$order->id)}}">#{{$order->id}}</a></td>
                                  <td>{{$order->billing_name}}</td>
                                  <td>{{$order->billing_email}}</td>
                                  <td>{{$order->billing_address}}</td>
                                  <td>{{$order->created_at->format('Y-m-d')}}</td>
                                  <td>{!!order_status($order->status)!!}</td>
                                </tr>     
                                @endforeach      
                                @else 
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>لاتوجد لديك أي طلبات</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                @endif
                              </tbody></table>
                            </div><!-- /.box-body -->
                          </div>

                    </div>
                <!-- /MAIN -->
                
            </div>
            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
