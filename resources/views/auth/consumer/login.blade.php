@extends('auth.consumer.layouts.app')

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
                <h4 class="text-uppercase">تسجيل الدخول</h4>
                <p>أدخل بريدك الإلكتروني و كلمة المرور</p>
                <form class="review-form" method="POST" action="{{ route('consumer.login.submit') }}">
                    @csrf
                    <div class="form-group">
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
                    </div>
                    <input type="submit" class="primary-btn" name="submit" value="دخول">
                    {{-- <button class="primary-btn">نشر</button> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection