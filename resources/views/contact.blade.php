@extends('layouts.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
   <h4 class="page-title">Contact Us</h4>
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
                  <form id="contact_frm">
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="inputGroupSelect01">Your Name</label>
                        </div>
                        <input name="contact_name" class="form-control" type="text" value="John Smith" readonly />
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="inputGroupSelect01">Subject Matter</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="contact_subject">
                           <option value="0" selected>Please Select...</option>
                           <option value="1">New Sales</option>
                           <option value="2">Help with a Product or Service</option>
                           <option value="3">Problems with the Website/Dashboard</option>
                           <option value="4">Other...</option>
                        </select>
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="inputGroupSelect01">Best Contact Option</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="contact_option">
                           <option value="1">Email</option>
                           <option value="2">Phone</option>
                        </select>
                     </div>
                     <div class="input-group mb-3">
                        <textarea class="form-control" style="height:10em;" name="contact_text" placeholder="What can we help you with?"></textarea>
                     </div>
                     <div style="text-align: right;">
                        <button type="button" class="btn btn-primary">Send Message</button>
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
<!-- end row -->
@endsection
@section('script')
@endsection