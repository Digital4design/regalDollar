@extends('layouts.master-blank')

@section('content')
        <div class="home-btn d-none d-sm-block">
            <a href="{{ url('/') }}" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>

        
		<div class="wrapper-page">
            <div class="card overflow-hidden account-card mx-3">
                <div class="bg-primary p-4 text-white text-center position-relative">
                    <h4 class="font-20 m-b-5">Welcome Back!</h4>
                    <p class="text-white-50 mb-4">Sign in to your RegalDollars account.</p>
                    <a href="index" class="logo logo-admin"><img src="{{ URL::asset('public/assets/images/peacock.png') }}" height="24" alt="logo"></a>
                </div>
                <div class="account-card-content">
                    @if(Session::has('status'))
								<div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
							@endif 
                    <form method="post" class="form-horizontal m-t-30" action="{{ url('/login') }}">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="username" placeholder="Username or Email">
							@if ($errors->has('email'))
                                    <span style="display:initial;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
							@csrf
                        <div class="form-group">
                            <label for="userpassword">Password</label>
                            <input name="password" type="password" class="form-control" id="userpassword" placeholder="************">
							@if ($errors->has('password'))
                                    <span style="display:initial;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-sm-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20">
                                <a href="{{ route('password.request') }}"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="m-t-40 text-center">
                <p>Don't have an account ? <a href="{{ url('/') }}" class="font-500 text-primary"> Signup now </a> </p>
                <p>© {{date('Y')}} RegalDollars.com</p>
            </div>

        </div>
        <!-- end wrapper-page -->
@endsection

@section('script')
@endsection
