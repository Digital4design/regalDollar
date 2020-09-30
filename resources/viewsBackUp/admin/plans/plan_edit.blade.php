@extends('admin.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
<h4 class="page-title">{{ $pageName }} :- {{ $planData->plan_name }}</h4>
</div>
@endsection
@section('content')
<?php // dd($planDocs);?>
<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <!-- end row -->
            <div class="row">
               <div class="col-xl-8">
                  <h4>Plan Information</h4>
                  @if(Session::has('status')) 
                  <div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
                  @endif 	
                  <form id="frm_info_basic" method="post" action="{{ url('admin/plan-management/update/'.Crypt::encrypt($planData->id)) }}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="row">
                     <input type="hidden" name="plan_id" value="{{$planData->id}}"/>
                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Plan Name </label>
                              </div>
                              <input 
                                 class="form-control" 
                                 name="plan_name" 
                                 value="{{ old('plan_name',(isset($planData) && !empty($planData->plan_name)) ? $planData->plan_name : '' ) }}" />
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
                                 value="{{ old('slogan',(isset($planData) && !empty($planData->slogan)) ? $planData->slogan : '' ) }}" />
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
                                 <label class="input-group-text" for="inputGroupSelect01">Plan Fee</label>
                              </div>
                              <input
                              type="number" 
                              class="form-control"
                              name="plan_fee"                              
                              {{ ( $is_disable == "1") ? 'disabled' : '' }}
                              value="{{ old('plan_fee',(isset($planData) && !empty($planData->plan_fee)) ? $planData->plan_fee : '' ) }}"
                              />
                              @if($is_disable == "1")
                                  <span style="display:initial;" class="invalid-feedback" role="alert">
                                  Plan Fee can not be update, As plan already purchased.
                                  </span>
                              @endif
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
                        <div class="col-sm-12">
                           <ul>
                              @forelse($planDocs as $docs)
                              <li>
                                 {{ $docs->documents_path }}
                              </li>
                              <br>
                              @empty
                              No docs found.
                              @endforelse
                           </ul>
                        </div>
                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Plan Duration</label>
                              </div>
                              <select id="country" class="form-control" name="duration" {{ ( $is_disable == "1") ? 'disabled' : '' }}>
                              <?php
                                 for($i=1;$i<6;$i++){ ?>
                                 <option value="<?php echo $i;?>" <?php if ($i === $planData->duration) {
                                    echo 'selected="selected"';
                                    
                                 }
                                 ?> ><?php echo $i;?> Year</option>
                                <?php }
                              ?>
                              </select>
                              @if($is_disable == "1")
                                  <span style="display:initial;" class="invalid-feedback" role="alert">
                                  Plan Duration can not be update, As plan already purchased.
                                  </span>
                               @endif
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
                                 <label class="input-group-text" for="inputGroupSelect01">Interest Rate</label>
                              </div>
                              <input 
                                 class="form-control" 
                                 name="interest_rate" 
                                 {{ ( $is_disable == "1") ? 'disabled' : '' }}
                                 value="{{ old('interest_rate',(isset($planData) && !empty($planData->interest_rate)) ? $planData->interest_rate : '' ) }}" 
                                 />
                                 @if($is_disable == "1")
                                  <span style="display:initial;" class="invalid-feedback" role="alert">
                                  Plan Interest Rate can not be update, As plan already purchased.
                                  </span>
                                  @endif
                              @if ($errors->has('interest_rate'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('interest_rate') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Plan Type</label>
                              </div>
                              <select id="country" class="form-control" name="plan_type" >
                              <option {{old('plan_type',$planData->plan_type)=="0"? 'selected':''}}  value="0">Select Plan Type</option>
                              <option {{old('plan_type',$planData->plan_type)=="1"? 'selected':''}}  value="1">Core Plan</option>
                              <!-- <option {{old('plan_type',$planData->plan_type)=="2"? 'selected':''}} value="2">Investment plan</option> -->
                              
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
                                 <label class="input-group-text" for="inputGroupSelect01">Time Investment</label>
                              </div>
                              <input 
                                 class="form-control" 
                                 type="text" 
                                 name="time_investment"
                                 {{ ( $is_disable == "1") ? 'disabled' : '' }}
                                 value="{{ old('time_investment',(isset($planData) && !empty($planData->time_investment)) ? $planData->time_investment : '' ) }}"
                                  />
                                  @if($is_disable == "1")
                                  <span style="display:initial;" class="invalid-feedback" role="alert">
                                  Plan Time Investment can not be update, As plan already purchased.
                                  </span>
                                  @endif

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
                              value="{{ old('view_details_url',(isset($planData) && !empty($planData->view_details_url)) ? $planData->view_details_url : '' ) }}" 
                              />

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
                              <input class="form-control" type="file" name="icon"/>
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
                                 <label class="input-group-text" for="inputGroupSelect01">Valid From</label>
                              </div>
                              <input
                                 class="form-control"
                                 type="date"
                                 name="plan_valid_from"
                                 value="{{ old('plan_valid_from',(isset($planData) && !empty($planData->plan_valid_from)) ? $planData->plan_valid_from : '' ) }}" 
                              />
                              @if ($errors->has('plan_valid_from'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('plan_valid_from') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <?php
                        $descritpion = json_decode($planData->descritpion);
                        foreach ($descritpion as $key => $des) {
                        ?>
                        <div id="tab_logic" class="col-sm-12">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">descritpion</label>
                              </div>
                              <input 
                                 class="form-control" 
                                 type="text" 
                                 name="descritpion[]" 
                                 placeholder="" 
                                 value="{{ old('descritpion',(isset($des) && !empty($des)) ? $des : '' ) }}" 
                              />
                              @if ($errors->has('descritpion'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('descritpion') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <?php } ?>

                        <div class="col-sm-12 more-feilds"></div>
                        <div class="col-sm-12">
                           <div class="form-group change">
                              <label for="">&nbsp;</label><br/>
                              <a class="btn btn-success add-more">+ Add More descritpion</a>
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
