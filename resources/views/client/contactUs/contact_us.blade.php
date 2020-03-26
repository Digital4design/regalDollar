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
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-6">
            <div class="text-center faq-title pt-4 pb-4">
              <div class="pt-3 pb-3">
                <i class="ti-email text-primary h3"></i>
              </div>
              <h5>Send us a message</h5>
              <p class="text-muted">Let us know if you have any questions at all. We try to respond within 1-2 business days.</p>
            </div>
          </div>
        </div>
        <!-- end row -->
        <div class="row">
          <div class="col-xl-3"></div>
          <div class="col-xl-6">
            <form id="contact_frm" method="post" action="{{ url('/client/contact-us-management/save-data') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Your Name</label>
                </div>
                <input name="name" class="form-control" type="text" value="{{Auth::user()->first_name }} {{Auth::user()->last_name }}" readonly="">
                @if ($errors->has('name'))
                <span style="display:initial;" class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Subject Matter</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="contact_subject" required>
                  <option value="" selected="">Please Select...</option>
                  <option value="New Sales">New Sales</option>
                  <option value="Help with a Product or Service">Help with a Product or Service</option>
                  <option value="Problems with the Website/Dashboard">Problems with the Website/Dashboard</option>
                  <option value="Other">Other...</option>
                  @if ($errors->has('contact_subject'))
                  <span style="display:initial;" class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('contact_subject') }}</strong>
                  </span>
                  @endif
                </select>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Best Contact Option</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="contact_option">
                  <option value="Email">Email</option>
                  <option value="Phone">Phone</option>
                </select>
                @if ($errors->has('contact_option'))
                <span style="display:initial;" class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('contact_option') }}</strong>
                </span>
                @endif
              </div>
              <div class="input-group mb-3">
                <textarea class="form-control" style="height:10em;" name="message" placeholder="What can we help you with?"></textarea>
              </div>
              <div style="text-align: right;">
                <button type="submit" class="btn btn-primary">Send Message</button>
              </div>
            </form>
          </div>
          <div class="col-xl-3"></div>
        </div>
        <!-- end row -->
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
  
</script>
@endsection