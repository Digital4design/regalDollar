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
   <div class="col-lg-12 view_user_data">
      <div class="card">
         <div class="card-body">
         <?php // dd($country); ?>
            <!-- end row -->
            <div class="row">
               <div class="col-xl-8">
                  <h4>User Information</h4>
                  @if(Session::has('status'))
                  <div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
                  @endif 	
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">First Name</label>
                           </div>
                           <input class="form-control" name="first_name" disabled value="{{ $user->first_name }}" />
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
                           <input class="form-control" name="last_name" value="{{ $user->last_name}}" disabled />
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
                           <input class="form-control" name="info_addr1" placeholder=""  value="{{ $user->address}}" disabled />
                        </div>
                     </div>
                     <div class="col-sm-12">
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Address 2</label>
                           </div>
                           <input class="form-control" name="info_addr2" placeholder="Apt/Bldg #" value="{{ $user->address2}}" disabled />
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Country</label>
                           </div>
                           <input class="form-control" name="countryName" disabled value="{{ $country->name }}" />
                           @if ($errors->has('countryName'))
                           <span style="display:initial;" class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('countryName') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">State</label>
                           </div>
                           <input class="form-control" name="firstName" disabled value="{{ $states->name }}" />
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
                           <input class="form-control" name="firstName" disabled value="{{ $city->name }}" />
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
                           <input class="form-control" type="text" name="info_zip" placeholder="" value="{{ $user->zipcode }}" disabled />
                           @if ($errors->has('info_zip'))
                           <span style="display:initial;" class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('info_zip') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                  </div>
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