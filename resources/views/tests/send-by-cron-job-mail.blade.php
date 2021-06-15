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
                    <div class="row" style="direction: ltr !important"> 
                        <a href="{{route('test.send.normal.email')}}" class="btn btn-primary">switch to normal mail form</a>
                        <h1>Test Send Email With Cron Job</h1>                                           
                        <!---->
                        <form class="review-form" method="POST" action="{{ route('test.send.cron.job.email.send') }}">
                            @csrf
                                <div class="billing-details">                                    
                                    <div class="form-group {{$errors->has('name')? 'has-error' : ''}}">
                                        {{-- <input type="hidden" name="consumer_id" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->id}}@else{{'0'}}@endif"> --}}
                                        <label for="name">your name</label>
                                        <input class="form-control" type="hidden" name="name" placeholder="your name" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->name}}@else{{old('name')}}@endif" @if(!Auth::guard('consumer')->check())disabled @endif>
                                        <input class="form-control" type="text" name="name" placeholder="your name" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->name}}@else{{old('name')}}@endif" @if(Auth::guard('consumer')->check())disabled @endif>
                                        @if($errors->has('name'))
                                        <span class="help-block">
                                            {{$errors->first('name')}}
                                        </span>
                                        @endif
                                    </div>                                
                                    <div class="form-group {{$errors->has('email')? 'has-error' : ''}}">
                                        <label for="email">email</label>
                                        <input class="form-control" type="hidden" name="email" placeholder="your email" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->email}}@else{{old('email')}}@endif" @if(!Auth::guard('consumer')->check())disabled @endif>
                                        <input class="form-control" type="email" name="email" placeholder="your email" value="@if(Auth::guard('consumer')->check()){{Auth::guard('consumer')->user()->email}}@else{{old('email')}}@endif" @if(Auth::guard('consumer')->check())disabled @endif>
                                        @if($errors->has('email'))
                                        <span class="help-block">
                                            {{$errors->first('email')}}
                                        </span>
                                        @endif
                                    </div>                                        
                                    <div class="form-group {{$errors->has('title')? 'has-error' : ''}}">
                                        <label for="title">subject</label>
                                        <input class="form-control" type="text" name="title" placeholder="your subject" value="{{old('title')}}">
                                        @if($errors->has('title'))
                                        <span class="help-block">
                                            {{$errors->first('title')}}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('message')? 'has-error' : ''}}">
                                        <label for="message">message</label>
                                        <textarea id="article-ckeditor1" class="form-control" name="message" placeholder="your message" rows="6">{{old('message')}}</textarea>
                                        @if($errors->has('message'))
                                        <span class="help-block">
                                            {{$errors->first('message')}}
                                        </span>
                                        @endif
                                    </div>                                                                    
                                    <div class="form-group">
                                        <input class="primary-btn" type="submit" name="submit" value="send">
                                    </div>
                                </div>
                        </form>
                        <!---->
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
@endsection