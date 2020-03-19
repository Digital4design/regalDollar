@extends('layouts.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
   <h4 class="page-title">Open Investment Account</h4>
</div>
@endsection
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <ul class="progressbar">
               <li>Account Details</li>
               <li class="active">Funding</li>
               <li>Agreement</li>
               <li>Review & Finish</li>
            </ul>
         </div>
      </div>
      <div class="card">
         <div class="card-body">
            <div class="row justify-content-center mb-5">
               <div class="col-lg-6">
                  <div class="text-center faq-title pt-4 pb-4">
                     <div class="pt-3 pb-3">
                        <i class="ti-bar-chart-alt text-primary h3"></i>
                     </div>
                     <h5>Select Funding Source</h5>
                     <p class="text-muted">You will be prompted to log in with your banking credentials...</p>
                  </div>
               </div>
            </div>
            <!-- end row -->
            <div class="row">
               <div class="col-xl-12">
                  <img src="/assets/images/bank-pp.jpg" />
                  <img src="/assets/images/bank-chase.png" style="width:226px;border:1px solid #ccc;" />
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end row -->
@endsection
@section('script')
@endsection