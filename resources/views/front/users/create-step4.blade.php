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
            <?php 
            // dd($userData->id);
            // dd($userData); 
            ?>
            <h2 class="title">We currently accept investment from US residents.</h2>
            <h3 class="subtitle">Please confirm the following:</h3>
            <form action='{{ url("investment/update-amount") }}'  id="registrationform" name="registration" method="post">
               {{ csrf_field() }} 
               <input type="hidden" value="{{$userData->id}}" class="form-control" id="user_id" name="user_id"/>
               <input type="hidden" value="{{$userData->plan_id}}" class="form-control" id="plan_id" name="plan_id"/>
               <input type="hidden" value="{{ $userData['investmentId'] }}" class="form-control" id="investmentId"  name="investmentId">
               <span class="subtitle">How much would you like to invest?</span>
               <div class="form-group">
                  <p>How much should your initial contibution be?</p>
               </div>
               <div class="form-group">
                  <select class="form-control" id="amount" name="amount" required="required" >
                     <option value="" >Select Amount</option>
                     <option value="100">$100</option>
                     <option value="10,000">$10,000</option>
                     <option value="20,000">$20,000</option>
                     <option value="30,000">$30,000</option>
                     <option value="40,000">$40,000</option>
                     <option value="50,000">$50,000</option>
                     <option value="60,000">$60,000</option>
                     <option value="70,000">$70,000</option>
                     <!--option value="other">Other</option -->
                  </select>
                  @if ($errors->has('amount'))
                  <span style="display:initial;" class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('amount') }}</strong>
                  </span>
                  @endif
                  <p id="error_amount" style="display:none; color:red" class="error">Plese select amount</p>
                  <!--input type="text" name="amount" id="custamount" -->
               </div>
               <a href="{{ url('/investment/create-step3') }}"  class="btn btn-primary"> Back </a>
               <button type="submit" class="btn btn-primary send_button"> Next </button>
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
   
   // function checkValidation(){
   //    var amount = $('#amount :selected').text();
   //    if(amount=='Select Amount'){
   //       $("#error_amount").show();

   //       //alert("khsdfjksd");
   //       return false;
   //    }
   //    //var amount = $('#amount').val();
   //    console.log(amount);
     

   // }
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

   //  $(".send_button").on("click", function(event) {
        
   //     event.preventDefault();
   //     // checkValidation();
   //     //$("#error_amount").hide();
   //     $.ajax({
   //        'url': '{{ url("investment/update-amount") }}',
   //        'method': 'post',
   //        'dataType': 'json',
   //        'data': $("#registrationform").serialize(),
   //        success: function(data) {
   //           alert(data.status);
   //           return false;
   //           if (data.status == 'success') {
   //              alert(data);
   //              location.href='{{ url("investment/create-step5") }}';
                
						
	// 			}
   //          }
	// 		});
   //       return false;
	// 	});
});
</script>