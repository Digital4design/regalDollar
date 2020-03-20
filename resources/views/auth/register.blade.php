@extends('layouts.master-blank')
@section('content')

        <!-- <div class="wrapper-page"> -->
        <div class="container">
            <div class="card overflow-hidden account-card mx-3">
                <div class="bg-primary p-4 text-white text-center position-relative">
                    <h4 class="font-20 m-b-5">Register for an account</h4>
                    <p class="text-white-50 mb-4">You will be able to set up an investment plan after creating an account.</p>
                    <a href="index" class="logo logo-admin"><img src="{{ URL::asset('public/assets/images/logo-sm.png') }}" height="24" alt="logo"></a>
                </div>
                <div class="account-card-content">

                    <form class="form-horizontal m-t-30" method="POST" action="{{ route('register') }}" >
						@csrf
                        <div class="form-group">
                            <label for="useremail">Email</label>
                            <input type="email" class="form-control" id="useremail" name="email" value="{{ old('email') }}" placeholder="Enter email">
							@if ($errors->has('email'))
                                    <span style="display:initial;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="username" placeholder="Enter username">
							 @if ($errors->has('name'))
                                    <span style="display:initial;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="userpassword">Password</label>
                            <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password">
							@if ($errors->has('password'))
                                    <span style="display:initial;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="userpassword">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="userpassword2" placeholder="Enter password">
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-12 text-right">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                            </div>
                        </div>

                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20">
                                <p class="mb-0">By registering you agree to the RegalDollars <a href="#" class="text-primary">Terms of Use</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="m-t-40 text-center">
                <p>Already have an account ? <a href="login" class="font-500 text-primary"> Login </a> </p>
                <p>© {{date('Y')}} RegalDollars, Inc</p>
            </div>

        </div>
        <!-- end wrapper-pags -->
@endsection

@section('script')
@endsection
