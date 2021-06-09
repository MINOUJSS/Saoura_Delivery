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
                        <form class="review-form" method="POST" action="{{ route('consumer.update.account') }}">
                            @csrf
                                <div class="billing-details">
                                    <div class="form-group {{$errors->has('name')? 'has-error' : ''}}">
                                        <input type="hidden" name="consumer_id" value="{{Auth::guard('consumer')->user()->id}}">
                                        <label for="name">الاسم</label>
                                        <input class="form-control" type="text" name="name" placeholder="الإسم" value="@if(old('name')){{old('name')}}@else{{$consumer->name}}@endif">
                                        @if($errors->has('name'))
                                        <span class="help-block">
                                            {{$errors->first('name')}}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('lastname')? 'has-error' : ''}}">
                                        <label for="name">اللقب</label>
                                        <input class="form-control" type="text" name="lastname" placeholder="اللقب" value="@if(old('lastname')){{old('lastname')}}@else{{$consumer->lastname}}@endif">
                                        @if($errors->has('lastname'))
                                        <span class="help-block">
                                            {{$errors->first('lastname')}}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('email')? 'has-error' : ''}}">
                                        <label for="name">البريد الإلكتروني</label>
                                        <input class="form-control" type="email" name="email" placeholder="البريد الإلكترني" value="@if(old('email')){{old('email')}}@else{{$consumer->email}}@endif">
                                        @if($errors->has('email'))
                                        <span class="help-block">
                                            {{$errors->first('email')}}
                                        </span>
                                        @endif
                                    </div>                                        
                                    <div class="form-group {{$errors->has('tel')? 'has-error' : ''}}">
                                        <label for="name">رقم الهاتف</label>
                                        <input class="form-control" type="tel" name="tel" placeholder="رقم الهاتف" value="@if(old('tel')){{old('tel')}}@else{{$consumer->telephone}}@endif">
                                        @if($errors->has('tel'))
                                        <span class="help-block">
                                            {{$errors->first('tel')}}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('address')? 'has-error' : ''}}">
                                        <label for="name">العنوان</label>
                                        <input class="form-control" type="text" name="address" placeholder="العنوان" value="@if(old('address')){{old('address')}}@else{{$consumer->address}}@endif">
                                        @if($errors->has('address'))
                                        <span class="help-block">
                                            {{$errors->first('address')}}
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group {{$errors->has('googl_map_address')? 'has-error' : ''}}">
                                        <label for="name">العنوان على جوجل ماب</label>
                                        <textarea class="form-control" name="googl_map_address" id="googl_map_address" rows="10">@if(old('googl_map_address')){{old('googl_map_address')}}@else{{$consumer->googl_map_address}}@endif</textarea>                                        
                                        @if($errors->has('googl_map_address'))
                                        <span class="help-block">
                                            {{$errors->first('googl_map_address')}}
                                        </span>
                                        @endif
                                    </div>
                                    {{-- <div class="form-group">
                                        <input class="input" type="password" name="password" placeholder="أكتب كلمة المرور">
                                    </div> --}}
        
                                    {{-- <div class="form-group">
                                        <input class="input" type="password" name="password_confirmation" placeholder="أعد كتابة كلمة المرور مرة أخرى">
                                    </div> --}}
                                    {{-- <div class="form-group">
                                        <div class="input-checkbox">
                                            <input type="checkbox" id="register">
                                            <label class="font-weak" for="register">إنشاء حساب ؟</label>
                                            <div class="caption">
                                                <p>أدخل كلمة المرور و تأكد منها و أحفظها, ستحتاجها عند الشراء مرة أخرى من المتجر<p>
                                                        <input class="input" type="password" name="password" placeholder="أدخل كلمة المرور">
                                            </div>
                                        </div>
                                    </div> --}}
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
