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
  <?php
  foreach ($planData as $key=>$plan) { 
     // dd($plan->interest_rate);
    ?>
    <div class="col-xl-3 col-md-6">
        <div class="card pricing-box">
          <div class="card-body">
            <div class="mb-4 pt-3 pb-3">
              <div class="pricing-icon float-left">
                <i class="ion ion-ios-build"></i>
              </div>
              <div class="text-right">
                <h5 class="mt-0">{{ $plan->time_investment}} Month Plan</h5>
                <p class="text-muted em9">{{ $plan->interest_rate }}% return monthly</p>
              </div>
            </div>
            <div class="pricing-features mb-4">
              <?php 
              $planDescription=json_decode($plan->descritpion);
              foreach ($planDescription as $key => $planDesc) {
                ?>
                <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> {{ $planDesc }}</p>
              <?php } ?>
              <!-- <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> You cannot cancel this plan</p>
                <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> $50,000 become $68,000 in one year // $1,500 a month</p> -->
              </div>
              <div class="text-center pt-3 pb-3">
                <!-- <h2><sup><small>$</small></sup>{{ $plan->price}}<br><span class="font-16">One-Time Investment</span></h2> -->
              </div>
              <div class="mt-4">
                <!-- <a href="<?php // echo url('/client/purchase-new-plan/start-with') . '/' . $plan->id  ?>" class="btn btn-primary btn-block waves-effect waves-light">Sign up Now</a> -->
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    <!-- end col 
    <div class="col-xl-3 col-md-6">
        <div class="card pricing-box">
            <div class="card-body">
                <div class="mb-4 pt-3 pb-3">
                    <div class="pricing-icon float-left">
                        <i class="ion ion-ios-wallet"></i>
                    </div>
                    <div class="text-right">
                        <h5 class="mt-0">24 Month Plan</h5>
                        <p class="text-muted em9">40% return on completion</p>
                    </div>
                </div>
                <div class="pricing-features mb-4">
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> You will be able to withdrawal your earnings every month</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> Two-year commitment, you cannot cancel in the first year</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> $50,000 become $72,000 in 2 years</p>
                </div>
                <div class="text-center pt-3 pb-3">
                    <h2><sup><small>$</small></sup>10,000<br><span class="font-16">One-Time Investment</span></h2>
                </div>
                <div class="mt-4">
                    <a href="/select-plan/2" class="btn btn-primary btn-block waves-effect waves-light">Sign up Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card pricing-box">
            <div class="card-body">
                <div class="mb-4 pt-3 pb-3">
                    <div class="pricing-icon float-left">
                        <i class="ion ion-ios-briefcase"></i>
                    </div>
                    <div class="text-right">
                        <h5 class="mt-0">36 Month Plan</h5>
                        <p class="text-muted em9">80% return on completion</p>
                    </div>
                </div>
                <div class="pricing-features mb-4">
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> Three-year commitment, you cannot cancel in the first year</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> $2,500 bonus on completion as gratitude</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> $50,000 become $90,000 in 3 years</p>
                </div>
                <div class="text-center pt-3 pb-3">
                    <h2><sup><small>$</small></sup>50,000<br><span class="font-16">One-Time Investment</span></h2>
                </div>
                <div class="mt-4">
                    <a href="/select-plan/3" class="btn btn-primary btn-block waves-effect waves-light">Sign up Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card pricing-box">
            <div class="card-body">
                <div class="mb-4 pt-3 pb-3">
                    <div class="pricing-icon float-left">
                        <i class="ion ion-ios-cash"></i>
                    </div>
                    <div class="text-right">
                        <h5 class="mt-0">60 Month Plan</h5>
                        <p class="text-muted em9">150% return on completion</p>
                    </div>
                </div>
                <div class="pricing-features mb-4">
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> Five-year commitment</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> $5,000 bonus on completion as gratitude</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> $50,000 become $150,000 in 5 years</p>
                </div>
                <div class="text-center pt-3 pb-3">
                    <h2><sup><small>$</small></sup>50,000<br><span class="font-16">One-Time Investment</span></h2>
                </div>
                <div class="mt-4">
                    <a href="/select-plan/4" class="btn btn-primary btn-block waves-effect waves-light">Sign up Now</a>
                </div>
            </div>
        </div>
    </div>
    end col -->

</div>
</div>
</div>
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

</script>
@endsection