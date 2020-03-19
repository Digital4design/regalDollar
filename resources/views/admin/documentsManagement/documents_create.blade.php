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
               <div class="col-xl-8">
                  <h4>New Docs</h4>
                  
                  @if(Session::has('status'))
                  <div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
                  @endif
                  <form id="frm_info_basic" method="post" action="{{ url('/admin/documents-management/save-docs') }}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="row">
                     <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Select Client</label>
                              </div>
                              <select id="users_id" class="form-control" name="users_id">
                              <option value="">Select Client</option>
                              @foreach ($clients as $key => $value)
                              <option value="{{ $value['id']}}">{{ $value['name'] }}</option>
                             @endforeach
                              </select>
                              @if ($errors->has('users_id'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('users_id') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Docs Name</label>
                              </div>
                              <input
                                class="form-control"
                                name="documents_title"
                                value=""
                              />
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
                                 <label class="input-group-text" for="inputGroupSelect01">documents file</label>
                              </div>
                              <input
                              class="form-control"
                              type="file"
                              name="documents_path"
                              />
                              @if ($errors->has('documents_path'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('documents_path') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                         

                        
                     </div>
                     <div class="row">

                     <div class="col-sm-12">
                           <div class="input-group mb-6">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">message</label>
                              </div>
                               <!-- <input
                              class="form-control"
                              type="text"
                              name="message"
                              placeholder="" /> -->
                              <textarea id="message" name="message" rows="4" cols="50"></textarea>
                              @if ($errors->has('message'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('message') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                     </div>

                     
                     <button class="btn btn-primary" type="submit">Save Docs</button>
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
           $(document).ready(function() {
              $(".add-more").click(function(){
                 var html = $("#tab_logic").html();
                 $(".more-feilds").append(html);
            });
            $("body").on("click",".remove",function(){
               $(this).parents("#tab_logic").remove();
            });
         });

</script>
@endsection