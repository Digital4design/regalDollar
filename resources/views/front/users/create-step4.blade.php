@include('homeheader')
<!--CONTENT START-->
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
         <a href="#step4" type="button" class="btn btn-primary btn-circle" disabled="disabled">4</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
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
         <?php 
         dd();
         ?>
            <!--HEADER SECTION START-->
            <h2 class="title">We currently accept investment from US residents.</h2>
            <h3 class="subtitle">Please confirm the following:</h3>
            <form action="{{ url('front/update-amounts') }}" method="post">
               {{ csrf_field() }} 
               <input
               type="hidden"
               value="{{$userData->id}}"
               class="form-control"
               id="user_id"
               name="user_id"
               />
               <span class="subtitle">How much would you like to invest?</span>
               <div class="form-group">
                  <p>How much should your initial contibution be?</p>
               </div>
               <div class="form-group">
                  <select class="form-control" name="amount">
                     <option value="" >Select Amount</option>
                     <option value="$1000"  >$1000</option>
                     <option value="$2000"  >$2000</option>
                  </select>
               </div>
               <a href="#"  class="btn btn-primary"> Back </a>
               <button type="submit" class="btn btn-primary"> Next </button>
            </form>
         </div>
      </div>
   </section>
</div>
<!--BUY TEMPLATE SECTION END-->
@include('homefooter')
@include('homescripts')