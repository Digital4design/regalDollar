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
         <a href="#step4" type="button" class="btn btn-primary btn-circle">4</a>
       </div>
      <div class="stepwizard-step">
         <a href="#step5" type="button" class="btn btn-primary btn-circle" >5</a>
       </div>
      <div class="stepwizard-step">
         <a href="#step6" type="button" class="btn btn-primary btn-circle">6</a>
         <!-- <p>Step 6</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step7" type="button" class="btn btn-primary btn-circle">7</a>
         <!-- <p>Step 7</p> -->
      </div>
   </div>
</div>
<div>
   <section class="white-bg">
      <div class="container">
      <div class="form_outter_section">         
         <!--HEADER SECTION START-->
         <h3 class="subtitle">Payment Process:</h3>
      <div id="paypal-button-container"></div>
      </div>
</div>
   </section>
</div>
<!--BUY TEMPLATE SECTION END-->
</div>
<script>
    var PAYPAL_CLIENT_ID = '{{ env('PAYPAL_CLIENT ') }}';
    // alert(PAYPAL_CLIENT_ID);
    // AXFpNdPb11eazXIJU3Q2O72EAfmXDeCJK03zhx_mQZrG6Qo2lFEeHeWvaYLrtAd5fN2GxRPMv1sET2wS
    //AWPsCpzkfkeu8vHrBEHS2IXa_EuZz1v-5EtbmiFzFZ1UjqgpqEVX3wuKic4EGz5aW36HTdtqeZujli1x
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
                        value: '{{ $userData->amount }}'
                    }
                }]
            });
        },
        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
               alert('Transaction completed by ' + details.payer.name.given_name + '!');
               exit;
                // Show a success message to the buyer
                var url = '{{ url("front/payment-update") }}/' + details.id;
                window.location.href = url;
                $(location).attr('href', url);
                // alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }
    }).render('#paypal-button-container');
</script>
@include('homefooter')
@include('homescripts')