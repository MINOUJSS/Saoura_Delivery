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
        <li><a href="{{url('/')}}">الرئيسية</a></li>
            <li class="active">أتصل بنا</li>
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
                {{-- <div class="container"> --}}
                    <div class="row">                                            
                        <!---->
                        <form class="review-form" method="POST" action="{{ route('contact_us.store') }}">
                            @csrf
                                <div class="billing-details">                                    
                                    <div class="form-group {{$errors->has('name')? 'has-error' : ''}}">
                                        {{-- <input type="hidden" name="consumer_id" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->id}}@else{{'0'}}@endif"> --}}
                                        <label for="name">الاسم</label>
                                        <input class="form-control" type="hidden" name="name" placeholder="الإسم" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->name}}@else{{old('name')}}@endif" @if(!Auth::guard('consumer')->check())disabled @endif>
                                        <input class="form-control" type="text" name="name" placeholder="الإسم" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->name}}@else{{old('name')}}@endif" @if(Auth::guard('consumer')->check())disabled @endif>
                                        @if($errors->has('name'))
                                        <span class="help-block">
                                            {{$errors->first('name')}}
                                        </span>
                                        @endif
                                    </div>                                
                                    <div class="form-group {{$errors->has('email')? 'has-error' : ''}}">
                                        <label for="email">البريد الإلكتروني</label>
                                        <input class="form-control" type="hidden" name="email" placeholder="البريد الإلكترني" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->email}}@else{{old('email')}}@endif" @if(!Auth::guard('consumer')->check())disabled @endif>
                                        <input class="form-control" type="email" name="email" placeholder="البريد الإلكترني" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->email}}@else{{old('email')}}@endif" @if(Auth::guard('consumer')->check())disabled @endif>
                                        @if($errors->has('email'))
                                        <span class="help-block">
                                            {{$errors->first('email')}}
                                        </span>
                                        @endif
                                    </div>                                        
                                    <div class="form-group {{$errors->has('title')? 'has-error' : ''}}">
                                        <label for="title">عنوان الرسالة</label>
                                        <input class="form-control" type="text" name="title" placeholder="أكتب عنوان الرسالة" value="{{old('title')}}">
                                        @if($errors->has('title'))
                                        <span class="help-block">
                                            {{$errors->first('title')}}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('message')? 'has-error' : ''}}">
                                        <label for="message">محتوى الرسالة</label>
                                        <textarea id="article-ckeditor" class="form-control" name="message" placeholder="أكتب رسالتك هنا." rows="6">{{old('message')}}</textarea>
                                        @if($errors->has('message'))
                                        <span class="help-block">
                                            {{$errors->first('message')}}
                                        </span>
                                        @endif
                                    </div>                                                                    
                                    <div class="form-group">
                                        <input class="primary-btn" type="submit" name="submit" value="إرسال">
                                    </div>
                                </div>
                        </form>
                        <!---->
                    </div>
                {{-- </div> --}}
                <!-- /DASHBOARD -->
            </div>
            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@endsection