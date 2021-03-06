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
            <form action="{{ url('front/create-step3') }}" id="registrationform" name="registration" method="post">
               {{ csrf_field() }}
               <input type="hidden" value="{{ $userData['id'] }}" class="form-control" id="user_id"  name="user_id">
               <input type="hidden" value="{{ $userData['plan_id'] }}" class="form-control" id="plan_id"  name="plan_id">
               <input type="hidden" value="{{ $userData['investmentId'] }}" class="form-control" id="investmentId"  name="investmentId">
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
              
               <a href="{{ url('front/create-step2') }}"  class="btn btn-primary">Back</a>
               <button type="submit" class="btn btn-primary">Next</button>
            </form>
         </div>
      </div>
   </section>
</div>
@include('homefooter')
@include('homescripts')

<script type="text/javascript">
$(document).ready(function(){
   
    // Selecting the form and defining validation method
    $("#registrationform").validate({
      
        // Passing the object with custom rules
        rules : {
            // login - is the name of an input in the form
            accountType : {
               required : true
            }
        },
        // Setting error messages for the fields
        messages: {
         accountType: "Please setect account type",
        },
        // Setting submit handler for the form
        submitHandler: function(form) {
            form.submit();
        }
    });
});
</script>