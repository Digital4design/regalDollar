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
                                 <label class="input-group-text" for="inputGroupSelect01">Select Plan</label>
                              </div>
                              <select id="plan_id" class="form-control" name="plan_id">
                                 <option value="">Select Plan</option>

                              </select>

                           </div>
                        </div>
						
                        <div class="col-sm-6">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Docs Name</label>
                              </div>
                              <input class="form-control" name="documents_title" value="" />
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
                              <input class="form-control" type="file" name="documents_path" />
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
   $("#users_id").change(function() {
      $('#plan_id').html('');
      var client_id = this.value;
      if (client_id !== '') {
         $.ajax({
            type: "post", 
            dataType: 'json',
            data: {
               client_id: client_id,
               _token: "{{csrf_token()}}"
            },
            url: "{{url('admin/users-management/get-client-plan-list')}}",
            success: function(rtnData) {
             $('#plan_id').html('<option value="">--Please select Investment--</option>');
               if (rtnData.list.length > 0) {
                  $.each(rtnData.list, function(index, value) {
                      $('#plan_id').append('<option value="'+value.id+'">'+value.plan_name+' / '+ value.plan_start_date +'</option>');
                  });
               }
            }
         });
      }
   });
</script>
@endsection