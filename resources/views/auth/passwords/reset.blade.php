@extends('layouts.master-blank')

@section('content')
        <!-- <div class="home-btn d-none d-sm-block">
            <a href="{{ url('/') }}" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div> -->
        <div class="wrapper-page">
            <div class="card overflow-hidden account-card mx-3">
                <div class="bg-primary p-4 text-white text-center position-relative">
                    <h4 class="font-20 mb-4">Reset Password</h4>
                    <a href="index" class="logo logo-admin"><img src="{{  URL::asset('public/assets/images/logo-sm.png') }}" height="24" alt="logo"></a>
                </div>
                <div class="account-card-content">
                    <!--<div class="alert alert-success m-t-30" role="alert">
                    </div>  -->
					 
                    <form class="form-horizontal m-t-30" method="POST" action="{{ route('password.update') }}">
					@csrf
					<input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="useremail">Email</label>
                            <input type="email" name="email" value="{{ $email ?? old('email') }}" class="form-control" id="useremail" placeholder="Enter email" required>
							@if ($errors->has('email'))
                                    <span style="display:initial;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
						
						<div class="form-group">
                            <label for="useremail">Password</label>
                            <input type="password" name="password"  class="form-control" id="useremail" placeholder="" required>
							@if ($errors->has('password'))
                                    <span style="display:initial;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
						
						<div class="form-group">
                            <label for="useremail">Confirm Password</label>
                            <input type="password" name="password_confirmation"  class="form-control" id="useremail" placeholder="" required>
							
                        </div>

                        <div class="form-group row m-t-20 mb-0">
                            <div class="col-12 text-right">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="m-t-40 text-center">
                
                <p>© {{date('Y')}} RegalDollars, Inc</p>
            </div>

        </div>
        <!-- end wrapper-page -->
@endsection

@section('script')
@endsection
