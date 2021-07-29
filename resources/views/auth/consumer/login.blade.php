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
            <li class="active">تسجيل الدخول</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- start section -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if(session()->has('message'))
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> إنتبه!</h4>
                    تأكد من معلوماتك و كلمة المرور
                  </div>
                @endif
                <p>ليس لديك حساب بالموقع و ترغب بإنشاء حساب جديد؟... <a class="text-primary" href="{{route('consumer.register')}}">تفضل من هنا</a></p>
                <h4 class="text-uppercase">تسجيل الدخول</h4>                
                <p>أدخل بريدك الإلكتروني و كلمة المرور</p>
                <form class="review-form" method="POST" action="{{ route('consumer.login.submit') }}">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="previous_url" value="{{url()->previous()}}">
                        <input class="input" id="email" type="email" name="email" placeholder="بريدك الإلكتروني" />
                    </div>
                    <div class="form-group">
                        <input class="input" id="password" type="password" name="password" placeholder="كلمة المرور" />
                    </div>
                    <div class="form-group">
                        <div class="input-checkbox">
                            <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="font-weak" for="remember">تذكرني</label>                        
                        </div>
                        <div class="pull-right">
                         <a href="{{route('consumer.forget.password')}}">نسيت كلمة المرور؟</a>
                        </div>
                    </div>
                    <input type="submit" class="primary-btn" name="submit" value="دخول">
                    {{-- <button class="primary-btn">نشر</button> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection