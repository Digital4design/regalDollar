@include('homeheader')
<div class="content form-steps">
   <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
         <a href="#step1" type="button" class="btn btn-primary btn-circle">1</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step2" type="button" class="btn btn-primary btn-circle">2</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
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
            <!--HEADER SECTION START-->
            <h2 class="title">We currently accept investment from US residents.</h2>
            <h3 class="subtitle">Please confirm the following:</h3>
            <?php // dd($userData['plan_id']); ?>
            <form action="{{ url('front/create-update') }}" method="post">
               {{ csrf_field() }}
               <input type="hidden" value="{{ $userData['id'] }}" class="form-control" id="user_id"  name="user_id">
               <input type="hidden" value="{{ $userData['plan_id'] }}" class="form-control" id="plan_id"  name="plan_id">
               <div class="form-group">
                  <label for="description">Account Type</label>
                  <select class="form-control" name="accountType" required="required" >
                     <option value="" >Select Account Type</option>
                     <option value="individual" {{ ( $userData->accountType == "individual" ) ? 'selected' : '' }}>Individual</option>
                     <!-- <option value="company" {{ ( $userData->accountType == "company") ? 'selected' : '' }}>Company</option> -->
                  </select>
                  @if ($errors->has('accountType'))
                     <span style="display:initial;" class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('accountType') }}</strong>
                     </span>
                     @endif

               </div>
               <!-- <div class="break_section"></div>
               <h2 class="title">Let's finish getting your account set up.</h2>
               <h3 class="subtitle">What type of account would you like to open?</h3>
               <div class="form_group">
                  <div class="account_type_fields field">
                     <div class="account">
                        <input type="radio">
                        <p>Individual account</p>
                     </div>
                  </div>
               </div> -->
               <a href="#"  class="btn btn-primary">Back</a>
               <button type="submit" class="btn btn-primary">Next</button>
            </form>
         </div>
      </div>
   </section>
</div>
@include('homefooter')
@include('homescripts')