@extends('admin.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
<h4 class="page-title">{{ $pageName }} :- {{ $documentData->documents_title }}</h4>
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
               <?php // dd($documentData);?>
                  <h4>Plan Information</h4>
                  @if(Session::has('status'))
                  <div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
                  @endif 	
                  <form id="frm_info_basic" method="post" action="{{ url('admin/documents-management/update/'.Crypt::encrypt($documentData->id)) }}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="row">
                     <input type="hidden" name="doc_id" value="{{$documentData->id}}"/>
                        <div class="col-sm-4">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Assign To</label>
                              </div>
                              <select id="users_id" class="form-control" name="users_id">
                              @foreach ($clients as $key => $value)
                                 <option value="{{ $value['id']}}" {{ ( $value['id'] == $documentData->users_id) ? 'selected' : '' }} >{{ $value['name'] }}</option>
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
                                 <label class="input-group-text" for="inputGroupSelect01">documents_title</label>
                              </div>
                              <input 
                                 class="form-control" 
                                 name="documents_title" 
                                 value="{{ old('documents_title',(isset($documentData) && !empty($documentData->documents_title)) ? $documentData->documents_title : '' ) }}"
                                 />
                              @if ($errors->has('documents_title'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('documents_title') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        
                     </div>
                     <div class="row">
                      
                      <div class="col-sm-4">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">documents_path</label>
                              </div>
                              <input class="form-control" type="file" name="documents_path"/>
                              @if ($errors->has('documents_path'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('documents_path') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <div id="tab_logic" class="col-sm-12">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">descritpion</label>
                              </div>
                              <textarea id="message" name="message" rows="4" cols="50">{{ old('message',(isset($documentData) && !empty($documentData->message)) ? $documentData->message : '' ) }}</textarea>
                              <!-- <input 
                                 class="form-control" 
                                 type="text" 
                                 name="message" 
                                 placeholder="" 
                                 value="{{ old('message',(isset($documentData) && !empty($documentData->message)) ? $documentData->message : '' ) }}" 
                                 /> -->
                              @if ($errors->has('message'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('message') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update Plan</button>
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
