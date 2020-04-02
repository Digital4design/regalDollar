@extends('admin.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
   <h4 class="page-title">{{ $pageName }}</h4>
</div>
@endsection
@section('content')
<?php // dd($investmentData->first_name); ?>
<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <!-- end row -->
            <div class="row">
               <div class="col-xl-8">
                  <h4>Withdraw Approve / Unapprove</h4>
                  @if(Session::has('status'))
                  <div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
                  @endif 
                  <form id="frm_info_basic" method="post" action="{{ url('admin/withdraw-request-managment/update/'.Crypt::encrypt($investmentData->id)) }}">
                     {{ csrf_field() }}
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">First Name</label>
                              </div>
                              <input class="form-control" name="first_name" value="{{ $investmentData->first_name }}" disabled="disabled" />
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
                                 <label class="input-group-text" for="inputGroupSelect01">Plan Name</label>
                              </div>
                              <input class="form-control" name="plan_name" value="{{ $investmentData->plan_name}}" disabled="disabled"/>
                            </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Amount</label>
                              </div>
                              <input class="form-control" name="amount" value="{{ $investmentData->amount}}" disabled="disabled"/>
                           </div>
                        </div>
                       
                        <div class="col-sm-4">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">request status</label>
                              </div>
                              <select id="country" class="form-control" name="is_request">
                                 <option>Select request status</option>
                                 <option value="2">Approve</option>
                                 <option value="3">Unapprove</option>
                                
                              </select>
                              @if ($errors->has('is_request'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('is_request') }}</strong>
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