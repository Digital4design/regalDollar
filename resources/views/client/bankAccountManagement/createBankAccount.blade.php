@extends('client.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
   <h4 class="page-title">{{ $pageName }}</h4>
</div>
@endsection
@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-body">      
      <div class="row">
        <div class="col-xl-8">
          <h4>Basic Information</h4>
          @if(Session::has('pstatus'))
          <div class="alert alert-{{ Session::get('pstatus') }} clearfix">
            {{ Session::get('pmessage') }}
          </div>
          @endif
          <form id="frm_info_basic" method="post" action="{{ url('client/bank-account-management/save-data') }}">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">First Name</label>
                  </div>
                  <input class="form-control" name="first_name" placeholder="First Name" value="" required/>
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
                  <input class="form-control" name="last_name" placeholder="Last Name" value=""  required/>
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
                    <label class="input-group-text" for="inputGroupSelect01">Bank Name</label>
                  </div>
                  <input class="form-control" name="bank_name" placeholder="Bank Name" value="" required/>
                  @if ($errors->has('bank_name'))
                  <span style="display:initial;" class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('bank_name') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="col-sm-12">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Account Number</label>
                  </div>
                  <input class="form-control" name="account_number" placeholder="Account Number" value="" maxlength="10" required/>
                  @if ($errors->has('account_number'))
                  <span style="display:initial;" class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('account_number') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">SWIFT Code</label>
                  </div>
                  <input class="form-control" name="swift_code" placeholder="SWIFT Code" placeholder="SWIFT Code" value="" required/>
                  @if ($errors->has('swift_code'))
                  <span style="display:initial;" class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('swift_code') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

            </div>
            <button class="btn btn-primary" type="submit">Save Account</button>
          </form>
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>
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