@extends('client.master')
@section('css')
<style>
.m-signature-pad {
  position: relative;
  font-size: 10px;
  width: 300px;
  height: 150px;
  /*border: 1px solid #e8e8e8;
  background-color: #fff;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.08) inset;
  border-radius: 4px;*/
}
.m-signature-pad--right-side-section {
    position: relative;
    text-align: right;
}
.m-signature-pad:before, .m-signature-pad:after {
	position: absolute;
    z-index: -1;
    content: "";
	width: 40%;
	height: 10px;
	left: 20px;
	bottom: 10px;
	background: transparent;
	-webkit-transform: skew(-3deg) rotate(-3deg);
	-moz-transform: skew(-3deg) rotate(-3deg);
	-ms-transform: skew(-3deg) rotate(-3deg);
	-o-transform: skew(-3deg) rotate(-3deg);
	transform: skew(-3deg) rotate(-3deg);
	box-shadow: 0 8px 12px rgba(0, 0, 0, 0.4);
}

.m-signature-pad:after {
	left: auto;
	right: 20px;
	-webkit-transform: skew(3deg) rotate(3deg);
	-moz-transform: skew(3deg) rotate(3deg);
	-ms-transform: skew(3deg) rotate(3deg);
	-o-transform: skew(3deg) rotate(3deg);
	transform: skew(3deg) rotate(3deg);
}

.m-signature-pad--body {
  position: absolute;
  left: 20px;
  right: 20px;
  top: 20px;
  bottom: 20px;
  border: 1px solid #f4f4f4;
}

.m-signature-pad--body
  canvas {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    border-radius: 4px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.02) inset;
  }

@media screen and (max-width: 1024px) {
  .m-signature-pad {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: auto;
    height: auto;
    min-width: 250px;
    min-height: 250px;
    margin: 5%;
  }
  #github {
    display: none;
  }
}

.m-signature-pad.sigWrapper_inner {
    width: 100%;
    display: table;
    margin: 0;
    padding: 0;
    height: auto;
}
.m-signature-pad.sigWrapper_inner .m-signature-pad--body {
    position: relative;
    width: 300px;
    height: 150px;
    display: block;
    margin-bottom: 10px;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
	border: 1px solid #eee;
}
.m-signature-pad.sigWrapper_inner canvas.sign-pad {
    width: 100%;
    height: 150px;
    position: static;
}
.m-signature-pad.sigWrapper_inner .m-signature-pad--right-side-section {
    width: auto;
    display: block;
    text-align: left;
}
.m-signature-pad.sigWrapper_inner .m-signature-pad--right-side-section button.button {
    width: auto;
    float: left;
    margin: 0 10px 0 0;
    padding: 5px 20px;
    background: #fff;
    border: 1px solid #ccc;
}
.m-signature-pad.sigWrapper_inner .m-signature-pad--right-side-section button.button:hover {
    background: #0e223a;
    color: #fff;
}
.m-signature-pad.sigWrapper_inner .m-signature-pad--right-side-section button.button:active, .m-signature-pad.sigWrapper_inner .m-signature-pad--right-side-section button.button:focus {
    outline: none;
    color: #fff;
	background: #0e223a;
}






@media screen and (min-device-width: 768px) and (max-device-width: 1024px) {
  .m-signature-pad {
    margin: 10%;
  }
}

@media screen and (max-height: 320px) {
  .m-signature-pad--body {
    left: 0;
    right: 0;
    top: 0;
    bottom: 32px;
  }
  .m-signature-pad--footer {
    left: 20px;
    right: 20px;
    bottom: 4px;
    height: 28px;
  }
  .m-signature-pad--footer
    .description {
      font-size: 1em;
      margin-top: 1em;
    }
}
  </style>
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
            
            <!-- end row -->
            <div class="form_outter_section"> 
            <!--HEADER SECTION START-->
            <h3 class="subtitle">Agreement</h3>
            <form action="{{ url('client/purchase-new-plan/update-aggrement-data') }}" method="post">
            {{ csrf_field() }}
               <input type="hidden" class="form-control" id="investmentId" name="investmentId" value="{{ $investmentId }}">
               <span class="section_title">Documents</span>
               <p>The following documents are provided for your reference:</p>
               <ul>
               @foreach($documentData as $document)
               <li>
               <a target="_blank" href="{{ url('public/uploads/documents_management/') }}/{{ $document['documents_path'] }}">
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
                  <input type="checkbox" name="indicateagreement[]" value="1" checked="checked">
                  <span class="checkmark"></span>
                  <label class="container">I have recieved each Offering Circular and Subscription Agreement,per my selected investment plan,and understand the risks associated with such offerings</label>
               </div>
               <div class="form-group">
                  <input type="checkbox" name="indicateagreement[]" required="required" value="2">
                  <span class="checkmark"></span>
                  <label class="container">I represent that my investment(s) in the offering(s) does not constitute more than the greater 10% of my gross annual income or net worth, either individually or in the aggregate.</label>
               </div>
               <div class="form-group">
                  <input type="checkbox" name="indicateagreement[]" required="required" value="3">
                  <span class="checkmark"></span>
                  <label class="container">I understand that there is no guarantee of any financial return on this investment(s) and that I run the risk of loss in my investment(s) ; and that I have been provided tax advice by Fundrise.</label>
               </div>
               <div class="form-group">
                  <input type="checkbox" name="indicateagreement[]" required="required" value="4">
                  <span class="checkmark"></span>
                  <label class="container">I recognize that my invest is in real property, which is fundamentally a long-term,illiquid investment; that liquidations, if approved, are paid out quarterly for the EREITs,and monthly after a minimum 60-day waiting period for the eFunds; and requests for liquidation may be suspended during periods of finacial stress.</label>
               </div>
               <div class="form-group">
                  <input type="checkbox" name="indicateagreement[]" required="required" value="5">
                  <span class="checkmark"></span>
                  <label class="container">I cerify that the information provided is true and correct and understand it will be used in the W-9. I have reviewed and acknowledge the W-9.</label>
               </div>
               <div class="break_section1"></div> 
               <span class="section_title">Divided Reinvestment</span>
               <div class="form-group">
                  <input type="radio" id="male" name="reinvestment" value="1" required="required">
                  <label class="container" for="male">I would like my dividends reinvested accouring to the investment plan I have selected</label>
               </div>
               <div class="form-group">
                  <input type="radio" id="female" name="reinvestment" value="2" required="required">
                  <label class="container" for="female">I would like my dividends distributed to my bank account.</label>
               </div>
               <div class="break_section1"></div> 
               <div id="signArea1" class="form-group">
                  <h2 class="tag-ingo">Put signature below,</h2>
				  <div class="typed"></div>
          <!--div class="sig sigWrapper" id="signArea"  style="height:auto;">
						<canvas class="sign-pad" id="sign-pad" width="300" height="100" ></canvas>
            </div--->
            <div id="signature-pad" class=" sig sigWrapper m-signature-pad sigWrapper_inner">
                <div class="m-signature-pad--body">
                <canvas class="sign-pad" width="300" height="100"></canvas>
            </div>
						<div class="m-signature-pad--right-side-section">
							<button type="button" class="button clear" data-action="clear">Clear Sign</button>
							<button type="button" class="button save" data-action="savesign">Confirm Sign</button>
						</div>
					</div>
          </div> 
          <input type="hidden" name="signature" id="signature">
          <a href="#" class="btn btn-primary">Back</a>
          <button type="submit" class="btn btn-primary"> Next </button>
            </form>
         </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection

@section('script')
<!--script src="{{ URL::asset('public/assets/js/jquery.signaturepad.js') }}"></script-->
<script src="{{ URL::asset('public/assets/js/bezier.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/json2.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/numeric-1.2.6.min.js') }}"></script>
<!--script src="{{ URL::asset('public/assets/js/signaturepad.js') }}"></script-->
<script src="{{ URL::asset('public/assets/js/html2canvas.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.4/signature_pad.min.js"></script>

<script type="text/javascript">
	var wrapper = document.getElementById("signature-pad"),
		canvas = wrapper.querySelector("canvas"),
		clearButton = wrapper.querySelector("[data-action=clear]"),
		saveButton = wrapper.querySelector("[data-action=savesign]"),
		b = document.getElementById("replace");

	function resizeCanvas(canvas){
		var ratio =  window.devicePixelRatio || 1;
		console.log(ratio);
		canvas.width = 300; //canvas.offsetWidth * ratio;
		canvas.height = 150; canvas.offsetHeight * ratio;
		canvas.getContext("2d").scale(ratio, ratio);
	}

	resizeCanvas(canvas);
  signaturePad = new SignaturePad(canvas);
  clearButton.addEventListener("click", function (event) {
		signaturePad.clear();
	});
  if(saveButton != null ){
    saveButton.addEventListener("click", function (event) {
      if (signaturePad.isEmpty()) {

        alert("Please provide signature first.");
			} else {
        /* alert(signaturePad.toDataURL("image/png")); */
        var canvas_img_data = signaturePad.toDataURL('image/png');
				var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
				console.log(img_data);
        $('#signature').val(img_data);
        }
		});
  }

	/*var data;
	var signaturePad = new SignaturePad(canvas);
	$("#signArea").mouseout(function(e){
		var img_data = signaturePad.toDataURL();
		console.log(img_data)
		var sing =  $("#signature").val(img_data);
		if(!sing){
          $("#signError").show();
		  return false;
        }
	});
 

*/


/*


$(document).ready(function() {
   $('#signArea').signaturePad({
    drawOnly:true, 
    drawBezierCurves:true, 
    lineTop:90
  });
});

$("#sign-pad").mouseout(function(e){
   html2canvas([document.getElementById('sign-pad')], {
      onrendered: function (canvas) {
         var canvas_img_data = canvas.toDataURL('image/png');
         var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
         var sing =  $("#signature").val(img_data);
        // $canvas.preventDefault();
         // 
        if(!sing){
          $("#signError").show();
        }
      }
   });
});

*/


</script>
@endsection