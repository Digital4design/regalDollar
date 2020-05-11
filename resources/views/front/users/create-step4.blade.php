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
                     <option value="10000">$10,000</option>
                     <option value="20000">$20,000</option>
                     <option value="30000">$30,000</option>
                     <option value="40000">$40,000</option>
                     <option value="50000">$50,000</option>
                     <option value="60000">$60,000</option>
                     <option value="70000">$70,000</option>
                     <option value="80000">$80,000</option>
                     <option value="90000">$90,000</option>
                     <option value="100000">$1,00,000</option>
                     <option value="">Other</option>
                  </select>
                  <input type="hidden" name="finalamount" placeholder="Please enter amount" id="finalamount">
                  <input type="number" style="display:none;" name="otheramount" placeholder="Please enter amount"  id="otheramount">
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
$(document).ready(function() {


   $("#otheramount").keyup(function(){
      var val =  $(this).val();
      $('#finalamount').val(val);


});
	$("#amount").change(function() {
      var selectedVal = $("#amount option:selected").text();
     // var selectedVal = $("#amount option:selected").val();
      //alert("Hi, your favorite programming language is " + selectedVal);
      //return false;
      if(selectedVal =='Other'){
         $("#amount").hide();
         $("#otheramount").show();
         //alert("Hi, your favorite programming language is " + selectedVal);
      }else{
         var val = $("#amount").val();
         $('#finalamount').val(val);
         //$("#hiddenamount").show();
         //alert("Hi, your favorite programming language is ");
      }		

	});
});
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
});
function onlyNumberKey(evt) { 
    // Only ASCII charactar in that range allowed 
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
    return false;
    return true; 
    } 
</script>