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
      <!-- <div class="stepwizard-step">
         <a href="#step7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
      </div> -->
   </div>
</div>
<div>
<?php // dd($investmentData['paypal_transaction_id']);?>
   <section class="white-bg">
      <div class="container">
         <div class="form_outter_section">
            <!--HEADER SECTION START-->
            @if($investmentData['paypal_transaction_id']!='')
            @else
            <h2 class="title">We currently accept investment from US residents.</h2>
            <h3 class="subtitle">Please confirm the following:</h3>
            @endif
            <form action='{{ url("investment/update-amount") }}'  id="registrationform" name="registration" method="post">
              {{ csrf_field() }}
              <input type="hidden" value="{{$userData->id}}" class="form-control" id="user_id" name="user_id"/>
               <input type="hidden" value="{{$planData->id}}" class="form-control" id="plan_id" name="plan_id"/>
               <input type="hidden" value="{{ $investmentData['id'] }}" class="form-control" id="investmentId"  name="investmentId">
               @if($investmentData['paypal_transaction_id']!='')
               <div class="white-bg" >
                <div class="">
                  <div class="form_outter_section">
                    <!--HEADER SECTION START-->
                    <h3 class="subtitle">Payment Details:</h3>
                    <div class="alert alert-success" role="alert">
                      Payment done with transaction id  {{ $investmentData['paypal_transaction_id'] }} amount ${{ $investmentData['amount'] }}
                    </div>
                  </div>
                </div>
              </div>
              @else
              <span class="subtitle">How much would you like to invest?</span>
              <div>
                <input type="checkbox" id="custum_amount" name="" value="other">
                <label for="custum_amount">Custom Amount</label><br>
              </div>
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
                     <!-- <option value="">Other</option> -->
                  </select>
                  <input type="hidden" name="finalamount" placeholder="Please enter amount" id="finalamount">
                  <input type="number" style="display:none;" name="otheramount" placeholder="Please enter amount"  id="otheramount">
                  @if ($errors->has('amount'))
                  <span style="display:initial;" class="invalid-feedback" role="alert">
                    <strong class="error">{{ $errors->first('amount') }}</strong>
                  </span>
                  @endif
                  <p id="error_amount" style="display:none; color:red" class="error">Plese select amount</p>
                  <!--input type="text" name="amount" id="custamount" -->
                  <div class="white-bg" id="payment_sec" style="display:none;">
                    <div class="">
                      <div class="form_outter_section">
                        <!--HEADER SECTION START-->
                        <h3 class="subtitle">Payment Process:</h3>
                        <div id="paypal-button-container"></div>
                      </div>
                    </div>
                  </div>
                  @endif
                  @if($investmentData['paypal_transaction_id'] !='')
                  <div class="pay_button">
                    <a href="{{ url('/investment/create-step3') }}"  class="btn btn-primary " > Back </a>
                    <a href="{{ url('/investment/create-step5') }}" class="btn btn-primary next" > Next </a>
                  </div>
                  @else
                </div>
                <a href="{{ url('/investment/create-step3') }}"  class="btn btn-primary" > Back </a>
                <button type="submit" class="btn btn-primary send_button" @if($investmentData['paypal_transaction_id']!='')  @else disabled="disabled" @endif> Next </button>
                @endif
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

  $("input:checkbox").change(function() {
      var ischecked= $(this).is(':checked');
      if(!ischecked){
         $("#amount").show();
         $("#otheramount").hide();
      }else{
         $("#amount").hide();
         $("#otheramount").show();
      }
   });
  $("#otheramount").keyup(function(){
      var val =  $(this).val();
      $('#finalamount').val(val);
      $("#payment_sec").show();
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
         $("#payment_sec").show();
         //$("#hiddenamount").show();
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

<script>
    var PAYPAL_CLIENT_ID = '{{ env('PAYPAL_CLIENT') }}';
    // alert(PAYPAL_CLIENT_ID);
    // AXFpNdPb11eazXIJU3Q2O72EAfmXDeCJK03zhx_mQZrG6Qo2lFEeHeWvaYLrtAd5fN2GxRPMv1sET2wS
    // AWPsCpzkfkeu8vHrBEHS2IXa_EuZz1v-5EtbmiFzFZ1UjqgpqEVX3wuKic4EGz5aW36HTdtqeZujli1x
    // AbpeJ8bE592FBrtUFCVEujzGkmtd5PfQLniO_nW6k8GrYlqnbJ4VlZ1XYy_YWY0lWmUC4LnbuvYoWhQW
</script>
<script src="https://www.paypal.com/sdk/js?client-id=AfzgVTRJ96iUpODF3Pq10ZpzVYRylV5n01-Gx1G0Ap7h5evP7U1tJoAul96LlY3wWiie5l7LeOKJzWJs&currency=USD"></script>
<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({
        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value:  $('#finalamount').val()
                    }
                }]
            });
        },
        // Finalize the transaction
        onApprove: function(data, actions) {
           return actions.order.capture().then(function(details) {
               // alert(details);
               // Show a success message to the buyer
                var url = '{{ url("investment/payment-update") }}/' + details.id+'/'+$('#finalamount').val();
                window.location.href = url;
                $(location).attr('href', url);
                // alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }
    }).render('#paypal-button-container');
</script>