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
            <?php // dd($investmentId );?>
        <div class="form_outter_section">
            <!--HEADER SECTION START-->
                        <h2 class="title">We currently accept investment from US residents.</h2>
            <h3 class="subtitle">Please confirm the following:</h3>
            <form action="{{ url('client/purchase-new-plan/update-amount') }}" id="registrationform" name="registration" method="post" novalidate="novalidate">
            {{ csrf_field() }} 
               <input type="hidden" value="{{Auth::user()->id}}" class="form-control" id="user_id" name="user_id">
               <input type="hidden" value="{{ $investmentId }}" class="form-control" id="investmentId" name="investmentId">
               <span class="subtitle">How much would you like to invest?</span>
               <div class="form-group">
                  <p>How much should your initial contibution be?</p>
               </div>
               <div class="form-group">
                  <select class="form-control" id="amount" name="amount" required="required">
                     <option value="">Select Amount</option>
                     <option value="100">$100</option>
                     <option value="10,000">$10,000</option>
                     <option value="20,000">$20,000</option>
                     <option value="30,000">$30,000</option>
                     <option value="40,000">$40,000</option>
                     <option value="50,000">$50,000</option>
                     <option value="60,000">$60,000</option>
                     <option value="70,000">$70,000</option>
                     <option value="">Other</option>
                  </select>
                  <input type="hidden" name="finalamount" placeholder="Please enter amount" id="finalamount">
                  <input type="number" style="display:none;" name="otheramount" placeholder="Please enter amount"  id="otheramount">
               </div>
               <button type="submit" class="btn btn-primary send_button"> Next </button>
            </form>
         </div>
         </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ URL::asset('public/assets/js/jquery.signaturepad.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/bezier.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/json2.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/numeric-1.2.6.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/signaturepad.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/html2canvas.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
$(document).ready(function() {
  $("#otheramount").keyup(function(){
      var val =  $(this).val();
      $('#finalamount').val(val);
  });
	$("#amount").change(function() {
      var selectedVal = $("#amount option:selected").text();
      //var selectedVal = $("#amount option:selected").val();
      //alert("Hi, your favorite programming language is " + selectedVal);
      //return false;
      if(selectedVal =='Other'){
         $("#amount").hide();
         $("#custamount").show();
         //alert("Hi, your favorite programming language is " + selectedVal);
      }else{
        var val = $("#amount").val();
         $('#finalamount').val(val);
         //alert("Hi, your favorite programming language is ");
      }
		

	});
});
$(document).ready(function() {
  function initialise(){
      var canvas = document.getElementById("sign-pad");
      canvas.addEventListener("mousedown",doMouseDown,false);
    }
    function doMouseDown(event){
      canvas_x =event.pageX;
      canvas_y =event.pageY;
      alert("X="+canvas_x + "Y="+canvas_y);
    }
   });
// $(document).ready(function() {
//     var canvas = document.getElementById("sign-pad");
//     canvas.addEventListener("onmouseleave", function(){
//       //alert('hello');
//     });
//   });


  $(document).ready(function() {
    $('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
  });
  $("#btnSaveSign").click(function(e){
    html2canvas([document.getElementById('sign-pad')], {
      onrendered: function (canvas) {
        var canvas_img_data = canvas.toDataURL('image/png');
        var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
        //ajax call to save image inside folder
        $.ajax({
          url: 'save_sign.php',
          data: { img_data:img_data },
          type: 'post',
          dataType: 'json',
          success: function (response) {
            window.location.reload();
          }
        });
      }
    });
  });
      </script> 
@endsection