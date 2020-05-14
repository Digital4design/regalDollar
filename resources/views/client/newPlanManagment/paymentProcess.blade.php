@extends('client.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
   <h4 class="page-title">{{ $pageName }}</h4>
</div>
@endsection
@section('content')
<div class="row">
<?php // dd($investmentdata->amount);?>
    <div class="card">
        <div class="card-body">
            <!-- end row -->
            <div class="form_outter_section"> 
            <!--HEADER SECTION START-->
            <h3 class="subtitle">Payment Section</h3>
            <div id="paypal-button-container"></div> 
        </div>
        <!-- end row -->
    </div>
</div>
</div>
@endsection
@section('script')
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
                        value: '{{$investmentdata->amount}}'
                    }
                }]
            });
        },
        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
               // alert(details);
               // Show a success message to the buyer
                var url = '{{ url("client/purchase-new-plan/update-payment") }}/' + details.id;
                window.location.href = url;
                $(location).attr('href', url);
                // alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }
    }).render('#paypal-button-container');
</script>
@endsection