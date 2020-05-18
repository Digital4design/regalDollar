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
<?php // dd($userData['amount']);?>
   <section class="white-bg">
      <div class="container">
         <div class="form_outter_section">  
            <!--HEADER SECTION START-->
            <h3 class="subtitle">Agreement</h3>
            @if($userData['paypal_transaction_id']!='')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            
            Payment done with transaction id {{ $userData['paypal_transaction_id'] }} 
            {{ $userData['amount'] }}

            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </a>
            </div>
            @else
            @endif
            @if($userData['paypal_transaction_id']!='')
            <div class="alert alert-success" role="alert">
                         {{ __('Payment done with transaction id ') }} {{ $userData['paypal_transaction_id'] }} amount ${{ $userData['amount'] }}
            </div>
            @else
            @endif
            
            <form action="{{ url('investment/update-sign') }}"  id="registrationform" name="registration" method="post" enctype= "multipart/form-data">
               {{ csrf_field() }}
               <input type="hidden" value="{{$userData->id}}" class="form-control" id="user_id" name="user_id"/>
               <input type="hidden" value="{{ $userData['plan_id'] }}" class="form-control" id="plan_id"  name="plan_id">
               <input type="hidden" value="{{ $userData['investmentId'] }}" class="form-control" id="investmentId"  name="investmentId">
               <span class="section_title">Documents</span>
               <p>The following documents are provided for your reference:</p>
               <ul>
                  @foreach($documentData as $document)
                  <li>
                     <a> 
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                         {{ $document['documents_path'] }}
                      </a>
                   </li>
                   @endforeach
                </ul> 
                <span class="section_title">Acknowledgments</span> 
                <p>Please indicate agreement with the following:</p>
                <div class="break_section1"></div>
                <div class="form-group">
                  <input type="checkbox" name="indicateagreement[]" class="require-one" value="1" required="required"  checked="checked">
                  <span class="checkmark"></span>
                  <label class="container">I have recieved each Offering Circular and Subscription Agreement,per my selected investment plan,and understand the risks associated with such offerings</label>
               </div>
               <div class="form-group">
                  <input type="checkbox" name="indicateagreement[]" class="require-one"  required="required" value="2">
                  <span class="checkmark"></span>
                  <label class="container">I represent that my investment(s) in the offering(s) does not constitute more than the greater 10% of my gross annual income or net worth, either individually or in the aggregate.</label>
               </div>
               <div class="form-group">
                  <input type="checkbox" name="indicateagreement[]" class="require-one" required="required" value="3">
                  <span class="checkmark"></span>
                  <label class="container">I understand that there is no guarantee of any financial return on this investment(s) and that I run the risk of loss in my investment(s) ; and that I have been provided tax advice by Fundrise.</label>
               </div>
               <div class="form-group">
                  <input type="checkbox" name="indicateagreement[]" class="require-one" required="required" value="4">
                  <span class="checkmark"></span>
                  <label class="container">I recognize that my invest is in real property, which is fundamentally a long-term,illiquid investment; that liquidations, if approved, are paid out quarterly for the EREITs,and monthly after a minimum 60-day waiting period for the eFunds; and requests for liquidation may be suspended during periods of finacial stress.</label>
               </div>
               <div class="form-group">
                  <input type="checkbox" name="indicateagreement[]" class="require-one" required="required" value="5">
                  <span class="checkmark"></span>
                  <label class="container">I cerify that the information provided is true and correct and understand it will be used in the W-9. I have reviewed and acknowledge the W-9.</label>
               </div>
               <div class="break_section1"></div> 
               <span class="section_title">Divided Reinvestment</span>
               <div class="form-group">
                  <input type="radio" id="male" name="reinvestment"  value="1" required="required">
                  <label class="container" for="male">I would like my dividends reinvested accouring to the investment plan I have selected</label>
               </div>
               <div class="form-group">
                  <input type="radio" id="female" name="reinvestment"  value="2" required="required">
                  <label class="container" for="female">I would like my dividends distributed to my bank account.</label>
               </div>
               <div class="break_section1"></div> 
               <div id="signArea" class="form-group">
                  <h2 class="tag-ingo">Put signature below,</h2>
                     <div class="sig sigWrapper" style="height:auto;">
                     <div class="typed"></div>
                        <canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
                     </div>
               </div>
               <input type="hidden" name="signature" id="signature">
               
               <a href="{{ url('/investment/create-step4') }}"  class="btn btn-primary" @if($userData['paypal_transaction_id']!='')  @else disabled="disabled" @endif>Back</a>
               <button type="submit" id="btnSaveSign" class="btn btn-primary"> Next </button>
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
   $("#registrationform").validate({
      rules : {
          indicateagreement : {
             required : true
          },
         reinvestment:{
            required : true
         }
      },
      messages: {
         indicateagreement: "Please check indicateagreement",
         reinvestment: "Please check reinvestment",
      },
      submitHandler: function(form) {
         form.submit();
      }
   });

   // $(".send_button").on("click", function(event) {
   //    // alert("JHKHKJH");
	// 		event.preventDefault();
	// 		$.ajax({
	// 			'url': '{{ url("investment/update-amount") }}',
	// 			'method': 'post',
	// 			'dataType': 'json',
	// 			'data': $("#registrationform").serialize(),
	// 			success: function(data) {
   //             alert(data);
   //             if (data.status == 'success') {
   //                 //alert(data);
   //                 location.href='{{ url("investment/create-step5") }}';
						
	// 			}
   //          }
	// 		});
   //       return false;
	// 	});
});



</script>
<script>
$(document).ready(function() {
   $('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
});

$("#sign-pad").mouseout(function(){
   html2canvas([document.getElementById('sign-pad')], {
      onrendered: function (canvas) {
         var canvas_img_data = canvas.toDataURL('image/png');
         var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
         $("#signature").val(img_data);
         
      }
   });
});




// $("#btnSaveSign").click(function(e){
//    html2canvas([document.getElementById('sign-pad')], {
//       onrendered: function (canvas) {
//          var canvas_img_data = canvas.toDataURL('image/png');
//          var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");

//          $("#sing").val(img_data);
//          //ajax call to save image inside folder
//          $.ajax({
//             url      : "{{ url('front/create-step6') }}",
//             // data: { img_data:img_data },
//             data: $("#registrationform").serialize(),
//             type: 'post',
//             dataType: 'json',
//             success: function (response) {
//                window.location.href = "{{ url('front/create-step7') }}";
//                // window.location.reload();
//             }
//          });
//       }
//    });
// });
		  </script> 