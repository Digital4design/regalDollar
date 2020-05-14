@include('homeheader')

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
            <div class="form-group update_field">


            <span class="edit_field" >
            <input  name="first_name" class="edit_here" contenteditable="true" id="first_name" value="{{ $userData['first_name'] }}" >
            <i class="fa fa-pencil-square-o first_name" aria-hidden="true"></i>
            </span>
            <span class="edit_field" >
            <input  name="address" class="edit_here"  contenteditable="true" id="address" value="{{ $userData['address'] }}">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </span>
            <span class="edit_field" >
            <input  name="city" class="edit_here" id="city" value="{{ $userData['city'] }}" >
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </span>
            <span class="edit_field" >
            <input  name="state" class="edit_here" id="state" value="{{ $userData['state'] }}" >
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </span>
            <!-- <span class="edit_field" contenteditable="true">
               <input  name="country_id" id="country_id" value="{{ $userData['country_id'] }}">
               <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span> -->
               <span class="edit_field" >
               <input  name="zipcode" class="edit_here" id="zipcode" value="{{ $userData['zipcode'] }}" >
               <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </span>
               <span class="edit_field" >
               <input  name="phoneNumber" class="edit_here" id="phoneNumber" value="{{ $userData['phoneNumber'] }}" >
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

  
   $( ".fa-pencil-square-o" ).click(function() {
      var prev=$(this).prev();
      $('.edit_here').removeClass('active');
      prev.addClass('active');
      //prev.css("background-color", "yellow");
      //alert( "Handler for .click() called." );
   });
  

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