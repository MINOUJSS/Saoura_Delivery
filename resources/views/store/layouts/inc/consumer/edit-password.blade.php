<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
        <li><a href="{{route('consumer.dashboard',Auth::guard('consumer')->user()->id)}}">حسابي</a></li>
            <li class="active">تعديل الحساب</li>
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
                        <li><a href="{{route('consumer.orders',Auth::guard('consumer')->user()->id)}}"><i class="fa fa-calendar-check-o"></i> طلباتي</a></li>
                        <li><a href="{{route('consumer.edit.account',Auth::guard('consumer')->user()->id)}}"><i class="fa fa-edit"></i> تعديل معلوماتي</a></li>                        
                    </ul>
                </div>
                <!-- /aside widget -->
            </div>
            <!-- /ASIDE -->

            <!-- MAIN -->
            <div id="main" class="col-md-9">
                

                <!-- MAIN -->
                    <div class="row" id="load_products">
                        <form class="review-form" method="POST" action="{{ route('consumer.update.password') }}">
                            @csrf
                                <div class="billing-details">
                                    <div class="form-group {{$errors->has('old_password')? 'has-error' : ''}}">
                                        <input type="hidden" name="consumer_id" value="{{Auth::guard('consumer')->user()->id}}">
                                        <label for="name">كلمة المرور القديمة</label>
                                        <input class="form-control" type="password" name="old_password" placeholder="كلمة المرور القديمة" value="@if(old('old_password')){{old('old_password')}}@endif">
                                        @if($errors->has('old_password'))
                                        <span class="help-block">
                                            {{$errors->first('old_password')}}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('password')? 'has-error' : ''}}">
                                        <label for="name">كلمة المرور الجديدة</label>
                                        <input class="form-control" type="password" name="password" placeholder="كلمة المرور الجديدة" value="@if(old('password')){{old('password')}}@endif">
                                        @if($errors->has('password'))
                                        <span class="help-block">
                                            {{$errors->first('password')}}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('password_confirmation')? 'has-error' : ''}}">
                                        <label for="name">تأكيد كلمة المرور الجديدة</label>
                                        <input class="form-control" type="password" name="password_confirmation" placeholder="كلمة المرور مرة أخرى">
                                        @if($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            {{$errors->first('password_confirmation')}}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input class="primary-btn" type="submit" name="submit" value="تعديل">
                                    </div>
                                </div>
                        </form> 
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