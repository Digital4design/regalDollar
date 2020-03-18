@include('homeheader')
<!--CONTENT START-->
<div class="content form-steps">
   <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
         <a href="#step1" type="button" class="btn btn-primary btn-circle">1</a>
         <!-- <p>Step 1</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step2" type="button" class="btn btn-primary btn-circle">2</a>
         <!-- <p>Step 2</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step3" type="button" class="btn btn-primary btn-circle">3</a>
         <!-- <p>Step 3</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step4" type="button" class="btn btn-primary btn-circle" disabled="disabled">4</a>
         <!-- <p>Step 4</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
         <!-- <p>Step 5</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
         <!-- <p>Step 6</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
         <!-- <p>Step 7</p> -->
      </div>
   </div>
</div>
<div>
   <section class="white-bg">
      <div class="container">
         <h1>Agreements - Step 5</h1>
         <h3>You're almost done!</h3>
         <form action="{{ url('front/update-info') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
               <input 
               type="hidden" 
               value="{{$userData->id}}" 
               class="form-control" 
               id="user_id"  
               name="user_id"
               />
            </div>
            <div class="form-group">
               <p>Please review your information.</p>
            </div>
            
            <h4>Investment Information</h4>
            <div class="form-group">
               <spam>Please indicate agreement with the following:</spam>
            </div>
            
            
            
            <a href="#"  class="btn btn-primary">Back</a>
            <button type="submit" class="btn btn-primary"> Next </button>
         </form>
      </div>
   </section>
</div>
<!--BUY TEMPLATE SECTION END-->
</div>
@include('homefooter')
@include('homescripts')