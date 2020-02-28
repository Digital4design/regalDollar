@extends('admin.master')

@section('css')

@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title">My Profile</h4>
    </div>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center mb-2">
                        <div class="col-lg-6">
                            <div class="text-center faq-title pt-4 pb-4">
                                <div class="pt-3 pb-3">
                                    <i class="ti-user text-primary h3"></i>
                                </div>
                                <h5>Configure My Profile</h5>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-8">
                            <h4>Basic Information</h4>
							@if(Session::has('pstatus'))
								<div class="alert alert-{{ Session::get('pstatus') }} clearfix">{{ Session::get('pmessage') }}</div>
							@endif 	
							
                            <form id="frm_info_basic" method="post" action="{{ url('admin/account/edit') }}">
                            {{ csrf_field() }}
							<div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">First Name</label>
                                        </div>
                                        <input class="form-control" name="firstName" value="{{ Auth::user()->name}}" />
										@if ($errors->has('firstName'))
											<span style="display:initial;" class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('firstName') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Last Name</label>
                                        </div>
                                        <input class="form-control" name="lastName" value="{{ Auth::user()->last_name}}" />
                                        @if ($errors->has('lastName'))
											<span style="display:initial;" class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('lastName') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Address</label>
                                        </div>
                                        <input class="form-control" name="info_addr1" placeholder=""  value="{{ Auth::user()->address}}" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Address 2</label>
                                        </div>
                                        <input class="form-control" name="info_addr2" placeholder="Apt/Bldg #" value="{{ Auth::user()->address2}}" />
                                    </div>
                                </div>
                                
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Country</label>
                                        </div>
                                        <select id="country" class="form-control" name="info_country">
                                            <option>Select Country</option>
                                            @foreach($vars['country'] as $k=>$v)
                                                <option value="{{$v->id}}" {{ (isset(Auth::user()->country_id) && !empty(Auth::user()->country_id) && Auth::user()->country_id == $v->id ) ? 'selected=selected' : ''  }}>{{$v->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('info_country'))
											<span style="display:initial;" class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('info_country') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>
                                
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">State</label>
                                        </div>
                                        <select id="states" class="form-control" name="info_state">
                                         @if (isset($states) && !empty($states))
                                           <option value="{{$states->id}}">{{$states->name}}</option>
                                           @endif  
                                        </select>
                                        @if ($errors->has('info_state'))
											<span style="display:initial;" class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('info_state') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>
                                
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">City</label>
                                        </div>
                                        
                                        <select id="cities" class="form-control" name="info_city">
                                            @if (isset($city) && !empty($city))
                                           <option value="{{$city->id}}">{{$city->name}}</option>
                                           @endif
                                            </select>
                                            @if ($errors->has('info_city'))
											<span style="display:initial;" class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('info_city') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Zip</label>
                                        </div>
                                        <input class="form-control" type="text" name="info_zip" placeholder="" value="{{ Auth::user()->zipcode }}" />
                                        @if ($errors->has('info_zip'))
											<span style="display:initial;" class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('info_zip') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>
                            </div>
                                <button class="btn btn-primary" type="submit">Save Profile</button>
                        </form>
                        </div>
						
						<div class="col-xl-4">
						<form class="change_login_details" method="POST" action="{{ url('admin/account/edit-password') }}">
									{{ csrf_field() }}
                            <h4>Change Password</h4>
							@if(Session::has('status'))
								<div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
							@endif 
							<div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Current Password</label>
                                </div>
                                <input type="password" class="form-control" name="currentPassword" value="" required />
								@if ($errors->has('currentPassword'))
											<span style="display:initial;" class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('currentPassword') }}</strong>
											</span>
								@endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">New Password</label>
                                </div>
                                <input type="password" class="form-control" name="password" value="" required />
								@if ($errors->has('password'))
											<span style="display:initial;" class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
								@endif
                            </div>
							<div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01" >Repeat Password</label>
                                </div>
                                <input type="password" class="form-control" name="password_confirmation" value="" required />
								
                            </div>
                            <button class="btn btn-primary" type="submit">Change Password</button>
							</form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <!-- end row -->
@endsection

@section('script')
<script>
        $( "#country" ).change(function() {
            $('#states').html('');
            var countyid =  this.value;
            if(countyid !==''){
                $.ajax({
	               type:"POST",
	               dataType: 'json',
	               data:{country_id:countyid,_token:"{{csrf_token()}}"},
	               url:"{{url('admin/states')}}",
	               success: function(success){
				    console.log(success);
				    if(success.data.length > 0){
			           $.each( success.data, function( index, value ){
                             optionText = value.name; 
                             optionValue = value.id;
                         $('#states').append(`<option value="${optionValue}">${optionText}</option>`);
                        });
			        }
			       }
	             });
           }  
        });
        
        $( "#states" ).change(function() {
            $('#cities').html('');
            var id =  this.value;
            if(id !==''){
                $.ajax({
	               type:"POST",
	               dataType: 'json',
	               data:{id:id,_token:"{{csrf_token()}}"},
	               url:"{{url('admin/cities')}}",
	               success: function(success){
				    console.log(success);
				    if(success.data.length > 0){
			           $.each( success.data, function( index, value ){
                             optionText = value.name; 
                             optionValue = value.id;
                         $('#cities').append(`<option value="${optionValue}">${optionText}</option>`);
                        });
			        }
			       }
	             });
           }  
        });	
         
    </script>
@endsection
