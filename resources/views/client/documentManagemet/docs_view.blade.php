@extends('client.master')
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
         <?php // dd($documentData); ?>
            <!-- end row -->
            <div class="row">
               <div class="col-xl-8">
                  <h4>Documents Information</h4>
                  @if(Session::has('status'))
                  <div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
                  @endif
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Documents Title</label>
                           </div>
                           <input class="form-control" name="documents_title" disabled value="{{ $documentData['documents_title'] }}" />
                           @if ($errors->has('documents_title'))
                           <span style="display:initial;" class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('documents_title') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Description</label>
                           </div>
                           <input class="form-control" name="message" value="{{ $documentData['message'] }}" disabled />
                           @if ($errors->has('message'))
                           <span style="display:initial;" class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('message') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Documents</label>
                           </div>
                           <embed src="{{ url('/public/uploads/documents_management/'.$documentData['documents_path']) }}" type="application/pdf" width="100%" height="100%" />
                           <p>
                               <a href="{{ url('/public/uploads/documents_management/'.$documentData['documents_path']) }}" target="_blank"> Open Files </a>
                            </p>
                            <!-- <iframe src="{{ url('/public/uploads/documents_management/'.$documentData['documents_path']) }}" height="100%" width="100%"></iframe> -->      
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