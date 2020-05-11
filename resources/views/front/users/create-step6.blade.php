@include('homeheader')
<style type="text/css">
/* input[type=text]
{
	margin-top:8px;
	font-size:18px;
	color:#545454;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
	-border-radius: 2px;
	display:none;
	width:280px;
	
} */
/* label
{
	float:left;
	margin-top:8px;
	font-size:18px;
	color:#545454;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
	-border-radius: 2px;
}

.edit
{
	float:left;
	background:url(images/edit.png) no-repeat;
	width:32px;
	height:32px;
	display:block;
	cursor: pointer;
	margin-left:10px;
}

.clear
{
	clear:both;
	height:20px;
} */
</style>
<!--CONTENT START-->
<?php // dd($investmentData); ?>
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
         <?php // dd($userData);?>
         <h2 class="title">You're almost done !</h2>
         <h3 class="subtitle">Please review your information:</h3> 
       
         <form action="{{ url('investment/create-step7') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" value="{{$userData->id}}" class="form-control" id="user_id" name="user_id"/>
            <input type="hidden" value="{{ $userData['plan_id'] }}" class="form-control" id="plan_id"  name="plan_id">
            <input type="hidden" value="{{ $userData['investmentId'] }}" class="form-control" id="investmentId"  name="investmentId">
            <span class="section_title"> {{ $userData['first_name'] }} Basic info</span>
            <div class="form-group">


            <!-- <label class="text_label">Click The Pencil Icon to Edit Me</label><div class="edit"></div>
            <input type="text" value="Click The Pencil Icon to Edit Me" />
            <div class="clear"></div>
            <label class="text_label">This is another text label</label><div class="edit"></div>
            <input type="text" value="This is another text label" />
            <div class="clear"></div>
            <label class="text_label">Another text label</label><div class="edit"></div>
            <input type="text" value="Another text label" />
            <div class="clear"></div>
            <label class="text_label">This is the last text label</label><div class="edit"></div>
            <input type="text" value="This is the last text label" />
            <div class="clear"></div> -->
            
            <span class="edit_field" >
                  <input type="text" contenteditable="true" name="first_name" id="first_name" value="{{ $userData['first_name'] }}" >
                  <i  class="fa fa-pencil-square-o first_name" aria-hidden="true"></i>
               </span>
               <span class="edit_field" contenteditable="true">
               <input type="text" name="address" id="address" value="{{ $userData['address'] }}">
               <i  class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span>
               <span class="edit_field" contenteditable="true">
               <input type="text" name="city" id="city" value="{{ $userData['city'] }}" disabled>
               <i  class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span>
               <span class="edit_field" contenteditable="true">
               <input type="text" name="state" id="state" value="{{ $userData['state'] }}" disabled>
               <i  class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span>
               <!-- <span class="edit_field" contenteditable="true">
               <input type="text" name="country_id" id="country_id" value="{{ $userData['country_id'] }}">
               <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span> -->
               <span class="edit_field" contenteditable="true">
               <input type="text" name="zipcode" id="zipcode" value="{{ $userData['zipcode'] }}" disabled>
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span>
               <span class="edit_field" contenteditable="true">
               <input type="text" name="phoneNumber" id="phoneNumber" value="{{ $userData['phoneNumber'] }}" disabled>
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span>
            </div>
            <div class="break_section"></div>
            <span class="section_title">Investment Information</span>
            <div class="form-group">
               <span class="edit_field">
                  <span class="title" contenteditable="true">Investment plan</span>
                  <span class="result">{{ $planData['plan_name'] }}</span>
                  <!-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->
               </span> 
               <span class="edit_field">
                  <span contenteditable="true" class="title">Initial Amount</span>
                  <span class="result">${{ $investmentData['amount'] }}</span>
                  <!-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->
               </span>            
               <!-- <span class="edit_field">
                  <span contenteditable="true" class="title">Time plans end</span>
                  <span class="result">22-Mar-2020</span>
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span>             -->
               <!-- <span class="edit_field">
                  <span contenteditable="true" class="title">Payment method</span>
                  <span class="result">Bank of america 5544</span>
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span>             -->
            </div>
            <div class="break_section"></div>
            <span class="section_title">Agreements</span> 
            <div class="form-group">
               <p class="sign_on">Signed on Feb 04,2020</p>
               <a class="income_file">Income eREITV, East Coast eREIT, and West Coast eREIT</a>
            </div>
            <a href="{{ url('/investment/create-step5') }}"  class="btn btn-primary">Back</a>
            <button type="submit" class="btn btn-primary"> Next </button>
         </form>
      </div>
   </div>
</section>
</div>

<!--BUY TEMPLATE SECTION END-->
@include('homefooter')
@include('homescripts')
<script>


$(document).ready(function() {

  
   // $("#first_name").keyup(function( event ) {
   //    var selectedVal = $('input:text[name=first_name]').val();
   //    alert(selectedVal);
   // });

   // $('.first_name').click(function(){
   //    var first_name = $('input:text[name=first_name]').val();
   //    //alert(first_name);
   //   // return false;
	// 	$(this).show();
	// 	//$(this).prev().hide();
	// 	$(this).next().show();
	// 	$(this).next().select();
	// });
  

   $("#first_name").keyup(function( event ) {
      var first_name = $('input:text[name=first_name]').val();
      event.preventDefault();
      $.ajax({
         'url': '{{ url("front/upadate-user-data") }}',
         'method': 'post',
         'dataType': 'json',
         'data':{first_name:first_name,_token:"{{csrf_token()}}",userid:"{{$userData->id}}"},
         success: function(data) {
            if (data.status == 'success') {
               console.log(data);
               //location.href='{{ url("investment/create-step6") }}';
            }
            }
			});
         return false;
		});
      
      
      $("#address").keyup(function( event ) {
         var address = $('input:text[name=address]').val();
         //alert(address);
         //return false;
         event.preventDefault();
         $.ajax({
            'url': '{{ url("front/upadate-user-data") }}',
            'method': 'post',
            'dataType': 'json',
            'data':{address:address,_token:"{{csrf_token()}}",userid:"{{$userData->id}}"},
            success: function(data) {
               if (data.status == 'success') {
                  console.log(data);
                  //location.href='{{ url("investment/create-step6") }}';
                  }
               }
			});
         return false;
		});

      $("#city").keyup(function( event ) {
         var city = $('input:text[name=city]').val();
         event.preventDefault();
         $.ajax({
            'url': '{{ url("front/upadate-user-data") }}',
            'method': 'post',
            'dataType': 'json',
            'data':{city:city,_token:"{{csrf_token()}}",userid:"{{$userData->id}}"},
            success: function(data) {
               if (data.status == 'success') {
                  console.log(data);
              // location.href='{{ url("investment/create-step6") }}';
                  }
               }
			});
         return false;
		});

      $("#state").keyup(function( event ) {
         var state = $('input:text[name=state]').val();
         event.preventDefault();
         $.ajax({
            'url': '{{ url("front/upadate-user-data") }}',
            'method': 'post',
            'dataType': 'json',
            'data':{state:state,_token:"{{csrf_token()}}",userid:"{{$userData->id}}"},
            success: function(data) {
               if (data.status == 'success') {
                  console.log(data);
               //location.href='{{ url("investment/create-step6") }}';
                  }
               }
			});
         return false;
		});

      $("#zipcode").keyup(function( event ) {
         var zipcode = $('input:text[name=zipcode]').val();
         event.preventDefault();
         $.ajax({
            'url': '{{ url("front/upadate-user-data") }}',
            'method': 'post',
            'dataType': 'json',
            'data':{zipcode:zipcode,_token:"{{csrf_token()}}",userid:"{{$userData->id}}"},
            success: function(data) {
               if (data.status == 'success') {
                  console.log(data);
              // location.href='{{ url("investment/create-step6") }}';
                  }
               }
			});
         return false;
		});

      $("#phoneNumber").keyup(function( event ) {
         var phoneNumber = $('input:text[name=phoneNumber]').val();
         event.preventDefault();
         $.ajax({
            'url': '{{ url("front/upadate-user-data") }}',
            'method': 'post',
            'dataType': 'json',
            'data':{phoneNumber:phoneNumber,_token:"{{csrf_token()}}",userid:"{{$userData->id}}"},
            success: function(data) {
               if (data.status == 'success') {
                  console.log(data);
               //location.href='{{ url("investment/create-step6") }}';
                  }
               }
			});
         return false;
		});

});

</script>