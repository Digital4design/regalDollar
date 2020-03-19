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
         <a href="#step4" type="button" class="btn btn-primary btn-circle">4</a>
         <!-- <p>Step 4</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step5" type="button" class="btn btn-primary btn-circle" >5</a>
         <!-- <p>Step 5</p> -->
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
         <!-- <h1>Payment Section - Step 4</h1>
         <?php // dd($userData); ?>
         <hr>
         <form class="w3-container w3-display-middle w3-card-4 w3-padding-16" method="POST" id="payment-form" action="{{ url('front/payment-process') }}">
            <div class="w3-container w3-teal w3-padding-16">Paywith Paypal</div>
            {{ csrf_field() }}
            <h2 class="w3-text-blue">Payment Form</h2>
            <p> Demo PayPal form -Integrating paypal in Laravel</p>
            <label class="w3-text-blue"><b>Enter Amount</b></label>
            <input type="text" name="amount" id="" value="{{$userData->id}}" class="w3-input w3-border">
            <button class="w3-btn w3-blue">Pay with Paypal</button>

         </form> -->


         <!-- <form action="{{ url('front/payment-process') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
               <input type="hidden" value="{{$userData->id}}" class="form-control" id="user_id"  name="user_id">
            </div>
            <div class="form-group">
               <label for="title">Address Line 1</label>
               <input
               type="text"
              value="{{ old('address',(isset($userData) && !empty($userData->address)) ? $userData->address : '' ) }}"
               class="form-control"
               id="address"
               name="address">
            </div>
            <button type="submit" class="btn btn-primary"> Next </button>
         </form> -->
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

<script src="https://www.paypal.com/sdk/js?client-id=AfzgVTRJ96iUpODF3Pq10ZpzVYRylV5n01-Gx1G0Ap7h5evP7U1tJoAul96LlY3wWiie5l7LeOKJzWJs&currency=INR"></script>
<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({
        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: 10
                    }
                }]
            });
        },
        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Show a success message to the buyer
                var url = '{{ url("/") }}//';
                window.location.href = url;
                $(location).attr('href', url);
                // alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }
    }).render('#paypal-button-container');
</script>
@include('homefooter')
@include('homescripts')