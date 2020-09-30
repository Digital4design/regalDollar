@extends('admin.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
   <h4 class="page-title">{{ $pageName }} :- {{ $planData->plan_name }}</h4>
</div>
@endsection
@section('content')
<?php // dd($planDocs);
?>
<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <!-- end row -->
            <div class="row">
               <div class="col-xl-8">
                  <?php // dd($planData); 
                  ?>
                  <h4>Contact Information</h4>
                  @if(Session::has('status'))
                  <div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
                  @endif
                  <form id="frm_info_basic" method="post" action="{{ url('admin/footer-menu-management/update/'.$planData->id) }}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Section</label>
                              </div>
                              <select name="section" id="section">
                                 <option value="Why Regal Dollar">Why Regal Dollar</option>
                                 <option value="Why Regal Dollar">Plans</option>
                                 <option value="Why Regal Dollar">Company</option>
                                 <option value="Why Regal Dollar">Resources</option>
                              </select>


                              @if ($errors->has('section'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('section') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Menu Name</label>
                              </div>
                              <input class="form-control" name="menu_name" value="{{ old('menu_name',(isset($planData) && !empty($planData->menu_name)) ? $planData->menu_name : '' ) }}" />
                              @if ($errors->has('menu_name'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('menu_name') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="col-sm-6">
                           <div class="input-group mb-6">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Link</label>
                              </div>
                              <input class="form-control" name="link" value="{{ old('link',(isset($planData) && !empty($planData->link)) ? $planData->link : '' ) }}" />
                              @if ($errors->has('link'))
                              <span style="display:initial;" class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('link') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                     </div>
                     <br><br>
                     <button class="btn btn-primary" type="submit">Update Footer Menu</button>
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
   $("#country").change(function() {
      $('#states').html('');
      var countyid = this.value;
      if (countyid !== '') {
         $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
               country_id: countyid,
               _token: "{{csrf_token()}}"
            },
            url: "{{url('admin/states')}}",
            success: function(success) {
               console.log(success);
               if (success.data.length > 0) {
                  $.each(success.data, function(index, value) {
                     optionText = value.name;
                     optionValue = value.id;
                     $('#states').append(`<option value="${optionValue}">${optionText}</option>`);
                  });
               }
            }
         });
      }
   });

   $("#states").change(function() {
      $('#cities').html('');
      var id = this.value;
      if (id !== '') {
         $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
               id: id,
               _token: "{{csrf_token()}}"
            },
            url: "{{url('admin/cities')}}",
            success: function(success) {
               console.log(success);
               if (success.data.length > 0) {
                  $.each(success.data, function(index, value) {
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
      $(".add-more").click(function() {
         var html = $("#tab_logic").html();
         $(".more-feilds").append(html);
      });
      $("body").on("click", ".remove", function() {
         $(this).parents("#tab_logic").remove();
      });
   });
</script>
@endsection