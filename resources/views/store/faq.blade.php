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
            <li class="active">أسئلة شائعة</li>
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

                <!-- -->
                <form class="review-form" method="POST" action="{{ route('faq.store') }}">
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
                            <div class="form-group {{$errors->has('question')? 'has-error' : ''}}">
                                <label for="question">السؤال</label>
                                <textarea class="form-control" name="question" placeholder="أكتب السؤال هنا." rows="6">{{old('question')}}</textarea>
                                @if($errors->has('question'))
                                <span class="help-block">
                                    {{$errors->first('question')}}
                                </span>
                                @endif
                            </div>                                                                    
                            <div class="form-group">
                                <input class="primary-btn" type="submit" name="submit" value="إرسال السؤال">
                            </div>
                        </div>
                </form>
                <!-- / -->
            </div>
            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@endsection