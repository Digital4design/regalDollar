@extends('layouts.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
   <h4 class="page-title">Documents & Agreements</h4>
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
                        <i class="ti-files text-primary h3"></i>
                     </div>
                     <h5>View Documents & Contracts</h5>
                     <p class="text-muted"></p>
                  </div>
               </div>
            </div>
            <!-- end row -->
            <div class="row">
               <div class="col-xl-6">
                  <div class="card">
                     <div class="card-body">
                        <p class="card-subtitle">
                        <h4>Contracts</h4>
                        </p>
                        <ul>
                           <li><i class="ti-file"></i> <a href="#">24 Month Investment Contract</a></li>
                           <li><i class="ti-file"></i> <a href="#">Supplemental Agreement</a></li>
                           <li><i class="ti-file"></i> <a href="#">Supplemental Agreement</a></li>
                        </ul>
                        <!-- end row -->
                     </div>
                  </div>
                  <!-- end card -->
               </div>
               <div class="col-xl-6">
                  <div class="card">
                     <div class="card-body">
                        <p class="card-subtitle">
                        <h4>Other Documents</h4>
                        </p>
                        <ul>
                           <li><i class="ti-file"></i> <a href="#">anything else</a></li>
                        </ul>
                        <!-- end row -->
                     </div>
                  </div>
                  <!-- end card -->
               </div>
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