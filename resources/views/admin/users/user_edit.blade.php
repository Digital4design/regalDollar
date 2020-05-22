@extends('admin.master')

@section('css')

@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title">{{ $pageName }}</h4>
    </div>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <!-- end row -->

                    <div class="row">
                        <?php 
                        // foreach($stateData as $state){
                        //     dd($state['name']);
                        // }
                        ?>
						
						<div class="col-xl-8">
                            <h4>User Information</h4>
							@if(Session::has('status'))
								<div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
							@endif 	
							
                            <form id="frm_info_basic" method="post" action="{{ url('admin/users-management/update/'.Crypt::encrypt($user->id)) }}">
                            {{ csrf_field() }}
							<div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">First Name</label>
                                        </div>
                                        <input class="form-control" name="first_name" value="{{ $user->first_name }}" />
										@if ($errors->has('first_name'))
											<span style="display:initial;" class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('first_name') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Last Name</label>
                                        </div>
                                        <input class="form-control" name="last_name" value="{{ $user->last_name}}" />
                                        @if ($errors->has('last_name'))
											<span style="display:initial;" class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('last_name') }}</strong>
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
                                        <input class="form-control" name="address" placeholder=""  value="{{ $user->address}}" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Address 2</label>
                                        </div>
                                        <input class="form-control" name="address2" placeholder="Apt/Bldg #" value="{{ $user->address2 }}" />
                                    </div>
                                </div>
                                
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Country</label>
                                        </div>
                                        <select id="country" class="form-control" name="country_residence">
                                            <option>Select Country</option>
                                            @foreach($country as $k=>$v)
                                                <option value="{{$v->name}}" {{ ( $v->name == $user->country_residence ) ? 'selected' : '' }}>{{$v->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country_residence'))
											<span style="display:initial;" class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('country_residence') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>
                                
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">State</label>
                                        </div>
                                        <select id="states" class="form-control" name="state">
                                        @foreach($stateData as $state){
                                            <option value="{{$state['name']}}" {{ ( $state['name'] == $user->state ) ? 'selected' : '' }}>{{$state['name']}}</option>
                                           @endforeach
                                        </select>
                                        @if ($errors->has('state'))
											<span style="display:initial;" class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('state') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>
                                
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">City</label>
                                        </div>
                                        <input class="form-control" name="city" value="{{ $user->city}}" />
                                        @if ($errors->has('city'))
											<span style="display:initial;" class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('city') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Zip</label>
                                        </div>
                                        <input class="form-control" type="text" name="info_zip" placeholder="" value="{{ $user->zipcode }}" />
                                        @if ($errors->has('info_zip'))
											<span style="display:initial;" class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('info_zip') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>
                            </div>
                                <button class="btn btn-primary" type="submit">Update Profile</button>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
// $( "#country" ).change(function() {
//             $('#states').html('');
//             var countyid =  this.value;
//             if(countyid !==''){
//                 $.ajax({
// 	               type:"POST",
// 	               dataType: 'json',
// 	               data:{country_id:countyid,_token:"{{csrf_token()}}"},
// 	               url:"{{url('admin/states')}}",
// 	               success: function(success){
// 				    console.log(success);
// 				    if(success.data.length > 0){
// 			           $.each( success.data, function( index, value ){
//                              optionText = value.name; 
//                              optionValue = value.id;
//                          $('#states').append(`<option value="${optionValue}">${optionText}</option>`);
//                         });
// 			        }
// 			       }
// 	             });
//            }  
//         });
        
//         $( "#states" ).change(function() {
//             $('#cities').html('');
//             var id =  this.value;
//             if(id !==''){
//                 $.ajax({
// 	               type:"POST",
// 	               dataType: 'json',
// 	               data:{id:id,_token:"{{csrf_token()}}"},
// 	               url:"{{url('admin/cities')}}",
// 	               success: function(success){
// 				    console.log(success);
// 				    if(success.data.length > 0){
// 			           $.each( success.data, function( index, value ){
//                              optionText = value.name; 
//                              optionValue = value.id;
//                          $('#cities').append(`<option value="${optionValue}">${optionText}</option>`);
//                         });
// 			        }
// 			       }
// 	             });
//            }  
//         });	
        
</script>
@endsection
