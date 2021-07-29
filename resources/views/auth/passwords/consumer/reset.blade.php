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
            <li class="active">إستعادة كلمة المرور</li>
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
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-success"></i> رائع</h4>
                    تم إرسال كلمة المرور إلى بريدك الإلكتروني
                  </div>
                @endif                
                <h4 class="text-uppercase">إستعادة كلمة المرور</h4>                
                <p>أدخل بريدك الإلكتروني الذي سجلت به في المتجر</p>
                <form class="review-form" method="POST" action="{{ route('consumer.reset.password') }}">
                    @csrf
                    <div class="form-group {{$errors->has('email')? 'has-error':''}}">
                        <input class="input" id="email" type="email" name="email" placeholder="بريدك الإلكتروني" />
                        @if($errors->has('email'))
                        <span class="help-block">
                        {{$errors->first('email')}}
                        </span>
                        @endif
                    </div>                                 
                    <input type="submit" class="primary-btn" name="submit" value="إستعادة كلمة المرور">
                    {{-- <button class="primary-btn">نشر</button> --}}
                </form>
            </div>
        </div>
    </div>
</div>

@endsection