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
            <!--HEADER SECTION START-->
            <h2 class="title">We currently accept investment from US residents.</h2>
            <h3 class="subtitle">Please confirm the following:</h3>
            <form action="{{ url('front/create-step5') }}" id="registrationform" name="registration" method="post">
               {{ csrf_field() }} 
               <input type="hidden" value="{{$userData->id}}" class="form-control" id="user_id" name="user_id"/>
               <input type="hidden" value="{{$userData->plan_id}}" class="form-control" id="plan_id" name="plan_id"/>
               <input type="hidden" value="{{ $userData['investmentId'] }}" class="form-control" id="investmentId"  name="investmentId">
               <span class="subtitle">How much would you like to invest?</span>
               <div class="form-group">
                  <p>How much should your initial contibution be?</p>
               </div>
               <div class="form-group">
                  <select class="form-control" name="amount" id="amount" onchange="val()" required="required" >
                     <option value="" >Select Amount</option>
                     <option value="100">$100</option>
                     <option value="10,000">$10,000</option>
                     <option value="20,000">$20,000</option>
                     <option value="30,000">$30,000</option>
                     <option value="40,000">$40,000</option>
                     <option value="50,000">$50,000</option>
                     <option value="60,000">$60,000</option>
                     <option value="70,000">$70,000</option>
                     <option value="other">Other</option>
                  </select>
                  <input type="text"  name="amount" id="custamount">
               </div>
               <a href="{{ url('front/create-step3') }}"  class="btn btn-primary"> Back </a>
               <button type="submit" class="btn btn-primary"> Next </button>
            </form>
         </div>
      </div>
   </section>
</div>
<!--BUY TEMPLATE SECTION END-->
@include('homefooter')
@include('homescripts')

<script type="text/javascript">
$(document).ready(function(){
   
    // Selecting the form and defining validation method
    $("#registrationform").validate({
      
        // Passing the object with custom rules
        rules : {
            // login - is the name of an input in the form
            amount : {
               required : true
            }
        },
        // Setting error messages for the fields
        messages: {
         amount: "Please setect amount",
        },
        // Setting submit handler for the form
        submitHandler: function(form) {
            form.submit();
        }
    });

    document.getElementById('amount').addEventListener('change', function() {
          console.log('You selected: ', this.value);
   });

   //   $("#amount").on("change", function(event) {
   //    var selected = $('#dropDownId :selected').text();
   //    alert(selected);
   //    return false;
	// 		event.preventDefault();
   //       console.log(event);
			
   //       return false;
	// 	});
});
</script>