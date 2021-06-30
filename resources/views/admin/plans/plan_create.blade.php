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
                  <h4>New Plan</h4>
                  @if(Session::has('status'))
                  <div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
                  @endif
                  <form id="frm_info_basic" method="post" action="{{ url('/admin/plan-management/saveplan') }}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Plan Name</label>
                              </div>
                              <input
                                class="form-control"
                                name="plan_name"
                                value=""
                              />
                              @if ($errors->has('plan_name'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('plan_name') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Plan Slogan</label>
                              </div>
                              <input
                              class="form-control"
                              name="slogan"
                              value=""
                              />
                              @if ($errors->has('slogan'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('slogan') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Plan Short Description</label>
                              </div>
                              <input
                              class="form-control"
                              name="description"
                              value=""
                              />
                              @if ($errors->has('description'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('description') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Plan Fee</label>
                              </div>
                              <input
                              type="number" 
                              class="form-control"
                              name="plan_fee"
                              placeholder=""
                              value=""
                              />
                              @if ($errors->has('plan_fee'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('plan_fee') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Plan Docs</label>
                              </div>
                              <input
                              type="file"
                              class="form-control"
                              name="plan_doc[]"
                              multiple
                              />
                              @if ($errors->has('plan_doc'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('plan_doc') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Plan Duration</label>
                              </div>
                              <select id="country" class="form-control" name="duration">
                              <?php
                              for ($i = 1; $i < 6; $i++) {
                                 echo "<option value=" . $i . ">" . $i . " Year</option>";
                              }
                              ?>
                              </select>
                              @if ($errors->has('duration'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('duration') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                     
                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Plan Type</label>
                              </div>
                              <select id="country" class="form-control" name="plan_type">
                                 <option value="">Select Plan Type</option>
                                 <option value="1">Core Plan</option>
                                 <!-- <option value="2">Investment plan</option>
                                 <option value="3">Unassign Docs</option>-->
                              </select>
                              @if ($errors->has('plan_type'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('plan_type') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Time Investment</label>
                              </div>
                              <input
                              class="form-control"
                              type="text"
                              name="time_investment"
                              placeholder=""
                              value="" />
                              @if ($errors->has('time_investment'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('time_investment') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">View Details URL</label>
                              </div>
                              <input
                              class="form-control"
                              type="text"
                              name="view_details_url"
                              placeholder=""
                              value="" />
                              @if ($errors->has('view_details_url'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('view_details_url') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        
                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Icon</label>
                              </div>
                              <input
                              class="form-control"
                              type="file"
                              name="icon"
                              placeholder=""  />
                              @if ($errors->has('icon'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('icon') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Plan Valid From</label>
                              </div>
                              <input
                              class="form-control"
                              type="date"
                              name="plan_valid_from"
                              placeholder=""  />
                              @if ($errors->has('plan_valid_from'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('plan_valid_from') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div id="tab_logic" class="col-sm-12">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">descritpion</label>
                              </div>
                              <input
                              class="form-control"
                              type="text"
                              name="descritpion[]"
                              placeholder="" />
                              @if ($errors->has('descritpion'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('descritpion') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="col-sm-12 more-feilds"></div>

                        <div class="col-sm-12">
                           <div class="form-group change">
                              <label for="">&nbsp;</label><br/>
                              <a class="btn btn-success add-more">+ Add More descritpion</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Plan Status</label>
                           </div>
                           <select name="status" id="plan_status" class="form-control">
                              <option value="1">Active</option>
                              <option value="0">Deactive</option>
                           </select>


                           @if ($errors->has('status'))
                           <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('status') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <button class="btn btn-primary" type="submit">Save Plan</button>
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