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
            <form action="{{ url('investment/update-account') }}" id="registrationform" name="registration" method="post">
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
              
               <a href="{{ url('investment/create-step2') }}"  class="btn btn-primary">Back</a>
               <button type="submit" id="send_button" class="btn btn-primary send_button">Next</button>
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

   //  $( "#registrationform" ).submit(function( event ) {
   //       alert( "Handler for .submit() called." );
   //       event.preventDefault();
   // });

   $(".send_button").validate({
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
  
   //  $(".send_button").on("click", function(event) {
	// 		event.preventDefault();
   //       console.log(event);
	// 		$.ajax({
	// 			'url': '{{ url("investment/update-account") }}',
	// 			'method': 'post',
	// 			'dataType': 'json',
	// 			'data': $("#registrationform").serialize(),
            
	// 			success: function(data) {
               
   //             if (data.status == 'success') {
   //                 //alert(data);
   //                 location.href='{{ url("investment/create-step3") }}';
   //                window.location.href='{{ url("investment/create-step3") }}';
						
	// 			}
   //          }
	// 		});
   //       return false;
	// 	});
     

});
</script>