@extends('auth.admin.layouts.app')

@section('content')
<!--:::::::::::::::::::::::::::::::::::::-->
	
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                                         
                        <div class="col-lg-12 text-center">
                            <img class="text-center" src="{{url('login_inc')}}/images/logo.png" width="50%" heitght="50%"/>
                        </div>                    
                    
                <span class="login100-form-title p-b-32 text-center">
                    {{ __('Login') }}
                </span>

                <span class="txt1 p-b-11">
                    {{ __('E-Mail Address') }}
                </span>
                <div class="wrap-input100 validate-input m-b-36 @if($errors->has('email')) has-error @endif" data-validate = "Username is required">                
                    <input id="email" type="email" class="input100 @if($errors->has('email')) has-error @endif" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                    <span class="focus-input100"></span>               
                    @if($errors->has('email'))
                <li>
                    <span class="help-block"><i class="fa fa-warning"></i>
                        {{ $errors->first('email')}}
                    </span>
                </li>
                @endif 
                </div>                
                
                <span class="txt1 p-b-11">
                    {{ __('Password') }}
                </span>
                <div class="wrap-input100 validate-input m-b-12 @if($errors->has('password')) has-error @endif" data-validate = "Password is required">
                    <span class="btn-show-pass">
                        <i class="fa fa-eye"></i>
                    </span>
                    <input id="password" type="password" name="password" class="input100 @error('password') has-error @enderror" required autocomplete="current-password">
                    <span class="focus-input100"></span>
                    @if($errors->has('password'))
                    <li>
                        <span class="help-block"><i class="fa fa-warning"></i>
                            {{ $errors->first('password')}}
                        </span>
                    </li>
                    @endif
                </div>
                
                <div class="flex-sb-m w-full p-b-48">
                    <div class="contact100-form-checkbox">  
                        <input class="input-checkbox100" id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="label-checkbox100" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div>
                            @if (Route::has('password.request'))
                                    <a class="txt3" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        {{ __('Login') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
<!--:::::::::::::::::::::::::::::::::::::-->





{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin {{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
