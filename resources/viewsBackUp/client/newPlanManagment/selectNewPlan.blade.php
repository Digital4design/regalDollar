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
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-6">
                    <div class="text-center faq-title pt-4 pb-4">
                        <div class="pt-3 pb-3">
                            <i class="ti-bar-chart-alt text-primary h3"></i>
                        </div>
                        <h5>Establish a New Investment Account</h5>
                        <p class="text-muted">This process will allow you to create a new Investment account with RegalDollars!</p>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <form  method="post" action="{{ url('client/purchase-new-plan/save-data') }}" id="registrationform" name="registration" enctype= "multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-xl-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Investment Options</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="plan_id">
                                <option value="0" selected="">Choose an investment plan...</option>
                                @foreach($planData as $plan)
                                <option value="{{ $plan['id'] }}" {{ ( $plan['id'] == $selected) ? 'selected' : '' }}>{{ $plan['time_investment']}} Month Plan</option>
                                @endforeach
                                <!-- <option value="2" selected="">24 Month Plan</option>
                                    <option value="3">48 Month Plan</option>
                                    <option value="4">60 Month Plan</option> -->
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Terms &amp; Conditions</h4>
                        <p>Lorem ipsum dolor amet fixie flannel brooklyn 3 wolf moon flexitarian gentrify kogi green juice lumbersexual. Prism heirloom put a bird on it, palo santo mumblecore PBR&amp;B keytar. Pop-up brooklyn photo booth celiac affogato glossier semiotics banh mi poke. Chartreuse pitchfork meh lyft. Hell of skateboard af beard, pug selvage activated charcoal whatever. Four dollar toast swag intelligentsia cloud bread man braid stumptown.</p>
                        <p>Hoodie craft beer tousled chambray thundercats cliche gochujang 8-bit pop-up gentrify taiyaki jianbing tacos. Green juice hammock vexillologist put a bird on it trust fund lyft health goth tbh PBR&amp;B retro shabby chic ugh. Master cleanse venmo dreamcatcher yr pug shaman pinterest banh mi fingerstache pok pok direct trade single-origin coffee knausgaard ramps cred. Cronut cred bespoke, portland four loko readymade man bun keffiyeh wolf normcore. 90's mustache waistcoat hot chicken deep v, plaid bitters brooklyn cloud bread slow-carb street art migas man bun tattooed.</p>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <button class="btn btn-primary" type="submit">Continue to Funding...</button>
                        <!-- <button class="btn btn-primary" onclick="window.location.href='/funding-plan'">Continue to Funding...</button> -->
                    </div>
                </div>
            </form>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   
    // Selecting the form and defining validation method
    $("#registrationform").validate({
      
        // Passing the object with custom rules
        rules : {
            // login - is the name of an input in the form
            plan_id : {
               required : true
            }            
        },
        // Setting error messages for the fields
        messages: {
            plan_id: "Enter first name",
        },
        // Setting submit handler for the form
        submitHandler: function(form) {
            form.submit();
        }
    });
});
</script>
@endsection