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
                  <h4>New FQA</h4>
                  @if(Session::has('status'))
                  <div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
                  @endif
                  <form id="frm_info_basic" method="post" action="{{ url('/admin/fqa-management/savefqa') }}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">FQA Headding</label>
                              </div>
                              <input
                                class="form-control"
                                name="fqa_headding"
                                value=""
                              />
                              @if ($errors->has('fqa_headding'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('fqa_headding') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="col-sm-12">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">FQA Answer</label>
                              </div>
                               <textarea class="form-control"  rows="4" cols="50" name="fqa_answer"></textarea>
                              <!-- <input
                              class="form-control"
                              name="fqa_answer"
                              value=""
                              /> -->
                              @if ($errors->has('fqa_answer'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('fqa_answer') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">FQA Type</label>
                              </div>
                              <select id="country" class="form-control" name="fqa_type">
                                 <option value="">Select FQA Type</option>
                                 <option value="general">General</option>
                                 <option value="members">Members</option>
                                 <option value="login">Login</option>
                                 <option value="about">About</option>
                              </select>
                              @if ($errors->has('fqa_type'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('fqa_type') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div> 
                     </div>
                     <button class="btn btn-primary" type="submit">Save FQA</button>
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