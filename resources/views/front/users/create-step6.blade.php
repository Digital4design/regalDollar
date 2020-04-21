@include('homeheader')
<!--CONTENT START-->
<?php // dd($investmentData); ?>
<div class="content form-steps">
   <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
         <a href="#step1" type="button" class="btn btn-primary btn-circle">1</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step2" type="button" class="btn btn-primary btn-circle">2</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step3" type="button" class="btn btn-primary btn-circle">3</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step4" type="button" class="btn btn-primary btn-circle">4</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step5" type="button" class="btn btn-primary btn-circle" >5</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step6" type="button" class="btn btn-primary btn-circle">6</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
      </div>
   </div>
</div>
<div>
<section class="white-bg">
      <div class="container">
      <div class="form_outter_section">         
         <!--HEADER SECTION START-->
         <?php // dd($userData);?>
         <h2 class="title">You're almost done !</h2>
         <h3 class="subtitle">Please review your information:</h3> 
         <form action="{{ url('front/create-step7') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" value="{{$userData->id}}" class="form-control" id="user_id" name="user_id"/>
            <input type="hidden" value="{{ $userData['plan_id'] }}" class="form-control" id="plan_id"  name="plan_id">
            <input type="hidden" value="{{ $userData['investmentId'] }}" class="form-control" id="investmentId"  name="investmentId">
            <span class="section_title">Basic info</span>
            <div class="form-group">
               <span class="edit_field" contenteditable="true" >{{ $userData['first_name'] }} 
                  <i  class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span>
               <span class="edit_field" contenteditable="true">{{ $userData['address'] }} {{ $userData['city'] }} {{ $userData['state'] }} {{ $userData['country_id'] }} {{ $userData['zipcode'] }}
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span>
               <span class="edit_field" contenteditable="true">{{ $userData['phoneNumber'] }}
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span>
            </div>
            <div class="break_section"></div>
            <span class="section_title">Investment Information</span>
            <div class="form-group">
               <span class="edit_field">
                  <span class="title" contenteditable="true">Investment plan</span>
                  <span class="result">{{ $planData['plan_name'] }}</span>
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span> 
               <span class="edit_field">
                  <span contenteditable="true" class="title">Initial Amount</span>
                  <span class="result">{{ $investmentData['amount'] }}</span>
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span>            
               <!-- <span class="edit_field">
                  <span contenteditable="true" class="title">Time plans end</span>
                  <span class="result">22-Mar-2020</span>
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span>             -->
               <!-- <span class="edit_field">
                  <span contenteditable="true" class="title">Payment method</span>
                  <span class="result">Bank of america 5544</span>
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span>             -->
            </div>
            <div class="break_section"></div>
            <span class="section_title">Agreements</span> 
            <div class="form-group">
               <p class="sign_on">Signed on Feb 04,2020</p>
               <a class="income_file">Income eREITV, East Coast eREIT, and West Coast eREIT</a>
            </div>
            <a href="#"  class="btn btn-primary">Back</a>
            <button type="submit" class="btn btn-primary"> Next </button>
         </form>
      </div>
   </div>
</section>
</div>
<!--BUY TEMPLATE SECTION END-->
@include('homefooter')
@include('homescripts')