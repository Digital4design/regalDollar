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
<?php $doc = $documentData['documents_path']; ?>
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <!-- end row -->
        <div class="row">
          <div class="col-xl-12">
            <h4>Basic Information</h4>
            <div class="row">
              <div class="col-sm-6">
                <div class="input-group mb-3">
                    {{ $documentData['documents_path'] }}
                  <!-- <embed
                  src="{{ url('/public/uploads/documents_managment') }} '/' {{$doc}}"
                  style="width:600px; height:800px;"
                  frameborder="0"> -->
                  <!--  <embed src="{{ url('/public/uploads/documents_managment').'/'.$doc }}" type="application/pdf" width="100%" height="600px" /> -->
                </div>
              </div>
            </div>
            <a href="{{ url('client/documents')}}" class="btn btn-primary" type="submit">Save Profile</a>
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