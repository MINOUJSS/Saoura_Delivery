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
            <li><a href="{{route('store')}}">الرئيسية</a></li>
            <li class="active">التسجيل في المتجر</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- start section -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>لديك حساب بالموقع و ترغب بتسجيل الدخول؟... <a class="text-primary" href="{{route('consumer.login')}}">تفضل من هنا</a></p>
                <h4 class="text-uppercase">إنشاء حساب جديد</h4>                
                <p>أدخل معلوماتك و إنضم إلى عائلتنا</p>
                <form class="review-form" method="POST" action="{{ route('consumer.register.submit') }}">
                    @csrf
                        <div class="billing-details">
                            <div class="form-group {{$errors->has('name')? 'has-error' : ''}}">
                                <input class="input" type="text" name="name" placeholder="الإسم" value="{{old('name')}}">
                                @if($errors->has('name'))
                                <span class="help-block">
                                    {{$errors->first('name')}}
                                </span>
                                @endif
                            </div>
                            {{-- <div class="form-group">
                                <input class="input" type="text" name="lastname" placeholder="اللقب">
                            </div> --}}
                            <div class="form-group {{$errors->has('email')? 'has-error' : ''}}">
                                <input class="input" type="email" name="email" placeholder="البريد الإلكترني" value="{{old('email')}}">
                                @if($errors->has('email'))
                                <span class="help-block">
                                    {{$errors->first('email')}}
                                </span>
                                @endif
                            </div>

                            {{-- <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="العنوان">
                            </div> --}}

                            {{-- <div class="form-group">
                                <input class="input" type="text" name="city" placeholder="City">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="country" placeholder="Country">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                            </div> --}}
                            <div class="form-group {{$errors->has('tel')? 'has-error' : ''}}">
                                <input class="input" type="tel" name="tel" placeholder="رقم الهاتف" value="{{old('tel')}}">
                                @if($errors->has('tel'))
                                <span class="help-block">
                                    {{$errors->first('tel')}}
                                </span>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('password')? 'has-error' : ''}}">
                                <input class="input" type="password" name="password" placeholder="أكتب كلمة المرور">
                                @if($errors->has('password'))
                                <span class="help-block">
                                    {{$errors->first('password')}}
                                </span>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('password_confirmation')? 'has-error' : ''}}">
                                <input class="input" type="password" name="password_confirmation" placeholder="أعد كتابة كلمة المرور مرة أخرى">
                                @if($errors->has('password_confirmation'))
                                <span class="help-block">
                                    {{$errors->first('password_confirmation')}}
                                </span>
                                @endif
                            </div>
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
                                <input class="primary-btn" type="submit" name="submit" value="حفظ">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection