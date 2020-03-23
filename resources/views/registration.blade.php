@section('css')
@endsection
@include('homeheader')
<div class="content">
<!--SERVICES SECTION START-->
<section class="thumb-with-text">
   <div class="container">
   
		<!-- multistep form -->
<form id="msform">
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active"></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
		
		<div class="move_left">
		
		<h2 class="fs-title">Let's get started</h2>
		<h3 class="fs-subtitle">To invest, please createan account.</h3>
		
			<div class="form_group">
				<div class="name_fields field">
					<div class="first_name">
						<span class="label">First name</span>
						<input type="text" />
					</div>
					<div class="last_name">						
						<span class="label">First name</span>
						<input type="text" />
					</div>
				</div>
			</div>
			
			<div class="form_group">					
				<div class="email_field field">						
					<span class="label">Email address</span>
					<input type="text" />
				</div>
			</div>
			
			<div class="form_group">					
				<div class="password_field field">						
					<span class="label">Password</span>
					<input type="password" />
				</div>
			</div>
			
			<div class="form_group">					
				<div class="password_conf_field field">						
					<span class="label">Password confirm</span>
					<input type="password" />
				</div>
			</div>
			
			<div class="form_group">					
				<div class="term_field field">					
					<input type="checkbox" />
					<p>I have reviewed and agree to the <a href="#">Terms of Service</a> , <a href="#">Privacy Policy</a>.</p>
				</div>
			</div>
		
		<div class="break_section"></div> 
			
			<h2 class="fs-title">We currently only accept investment from US residents.</h2>
			<h3 class="fs-subtitle">Please confirm the following:</h3>
		
			<div class="form_group">					
				<div class="citizenship_field field">						
					<span class="label">Country of citizenship</span>
					<select class="Country_citizenship">
					  <option value="Iceland">Iceland</option>
					  <option value="India">India</option>
					  <option value="United Kingdom">United Kingdom</option>
					  <option value="United States" selected>United States</option>
					</select>
				</div>
			</div>
			
			<div class="form_group">					
				<div class="Residence_field field">						
					<span class="label">Country of Residence</span>
					<select class="Country_Residence">
					  <option value="Iceland">Iceland</option>
					  <option value="India">India</option>
					  <option value="United Kingdom">United Kingdom</option>
					  <option value="United States" selected>United States</option>
					</select>
				</div>
			</div>
		
		</div>

		
		<input type="button" name="next" class="next action-button" value="Continue" />
		
    </fieldset>
	
	<fieldset>
		
		<div class="move_left">
		
		<h2 class="fs-title">Let's finish getting your account set up.</h2>
		<h3 class="fs-subtitle">What type of account would you like to open?</h3>
		
			<div class="form_group">
				<div class="account_type_fields field">
					<div class="account">					
						<input type="radio" />
						<p>Individual account</p>
					</div>
				</div>
			</div>
		
		<div class="break_section"></div> 
		
		<h2 class="fs-title">Thanks, William.</h2>
		<h3 class="fs-subtitle">We just need a few more details.</h3>
		
		<span class="section_title">Contact Information</span>
		
			<div class="form_group">					
				<div class="address_line_field field">					
					<span class="label">Address line 1</span>
					<input type="text" />
					<p>This should be the address used for tax purposes.</p>
				</div>
			</div>
			
			<div class="form_group">					
				<div class="address_line2_field field">					
					<span class="label">Address line 2</span>
					<input type="text" />
				</div>
			</div>
			
			<div class="form_group">					
				<div class="city_field field">					
					<span class="label">City</span>
					<input type="text" />
				</div>
			</div>
			
			<div class="form_group">					
				<div class="atate_field field">					
					<span class="label">State</span>
					<select class="state_Residence">
						<option value="AL" selected>Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
					</select>
				</div>
			</div>
			
			<div class="form_group">					
				<div class="zip_field field">					
					<span class="label">Zip</span>
					<input type="text" />
				</div>
			</div>
			
			<h3 class="fs-subtitle">Tax Reporting Information.</h3>
		
			<div class="form_group">					
				<div class="ssn_field field">			
					<p>This information is required by the IRS for tax reporting purposes.</p>		
					<span class="label">Social Security Number</span>
					<input type="text" />
				</div>
			</div>
			
			<div class="form_group">					
				<div class="dob_field field">				
					<span class="label">Date of Birth</span>
					<input type="text" />
				</div>
			</div>
	
		</div>

		
		<div class="down">
			<input type="button" name="previous" class="previous action-button" value="previous" />
			<input type="button" name="next" class="next action-button" value="next" />
		</div>
			
		
		
    </fieldset>
    
	
	<fieldset>
		
		<div class="move_left">
		
			<h3 class="fs-subtitle">How much would you like to invest?</h3>
		
			<span class="section_title">Initial Contribution</span>
		
			<div class="form_group">
				<div class="prices_field field">	
					<p>This should be the address used for tax purposes.</p>
					<select class="state_Residence">
						<option value="" selected>$10,000</option>
						<option value="">$20,000</option>
						<option value="">$30,000</option>
						<option value="">$40,000</option>
						<option value="">$50,000</option>
						<option value="">$60,000</option>
					</select>
				</div>
			</div>
		
			<div class="break_section"></div> 
		
			<h3 class="fs-subtitle">Agreements</h3>
			
			<span class="section_title">Documents</span>
			
			<div class="form_group">
				<div class="doucments_field field">	
					<p>This should be the address used for tax purposes.</p>
					<div class="show_doc">
						<i class="fa fa-file-text" aria-hidden="true"></i> <span>Tax Invoice</span>
					</div>
					<a class="show_more">View all documents</a>
				</div>
			</div>
			
			<div class="break_section"></div> 
			
			<span class="section_title">Acknowledgments</span>
			
			<span class="ack_title">Please indicate agreement with the following:</span>
			
			<div class="form_group">
				<div class="checkbox_fields field">	
					<input type="checkbox">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				</div>
			</div>
			
			<div class="form_group">
				<div class="checkbox_fields field">	
					<input type="checkbox">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				</div>
			</div>
			
			<div class="form_group">
				<div class="checkbox_fields field">	
					<input type="checkbox">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				</div>
			</div>
			
			<div class="form_group">
				<div class="checkbox_fields field">	
					<input type="checkbox">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				</div>
			</div>
			
			<div class="form_group">
				<div class="checkbox_fields field">	
					<input type="checkbox">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				</div>
			</div>
			
			<div class="break_section"></div> 
			
			<span class="section_title">Dividend Reinvestment</span>
			
			<div class="form_group">
				<div class="radio_field field">	
					<input type="radio">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				</div>
			</div>
			
			<div class="form_group">
				<div class="radio_field field">	
					<input type="radio">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				</div>
			</div>
			
	
		</div>

		
			<div class="down">
				<input type="button" name="previous" class="previous action-button" value="previous" />
				<input type="button" name="next" class="next action-button" value="next" />
			</div>
		
		
    </fieldset>
	
	
	<fieldset>
		
		<div class="move_left">
		
			<h2 class="fs-title">You're almost done!</h2>
			<h3 class="fs-subtitle">Please review your information.</h3>
			
			<div class="show_result">
				<span class="section_title">Basic info</span>
			</div>
			
			
			<div class="show_result">
				<span class="section_title">Investment information</span>
			</div>
			
			<div class="show_result">
				<span class="section_title">Agreements</span>
			</div>
			</div>
			<div class="down">
				<input type="button" name="previous" class="previous action-button" value="previous" />
				<input type="button" name="next" class="next action-button" value="next" />
			</div>
		</fieldset>
    
    
</form>
      
   </div>
</section> 
@include('homefooter')
@include('homescripts')

<script type="text/javascript">

var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 500, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeOutQuint'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 500, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeOutQuint'
	});
});

$(".submit").click(function(){
	return false;
})

 $(document).ready(function() {
    $('select').material_select();
  });

 var counter = 0;
var orderCounter = 1;
function newKeyword() {
   
  $( ".keywords" ).append( '<div class=\"row rowKey animated zoomIn2\">\r\n        <div class=\"input-field col s6\" style=\"\r\n    width: 42%;\r\n\">\r\n          \r\n          <input id=\"icon_prefix1' + counter + '\" type=\"text\" class=\"validate\">\r\n          <label for=\"icon_prefix1' + counter + '\" class=\"\">Keyword<\/label>\r\n        <\/div>\r\n   <div class=\"row\">\r\n    <!--<div style=\"    top: 0.8rem;\" class=\"col s2\"> Density :<\/div> -->\r\n     <div class=\"input-field col s2\" style=\"    top: 0.7rem;\"> Density<\/div>\r\n        <div class=\"input-field col s2\">\r\n          <input id=\"icon_telephone1' + counter + '\" type=\"number\" class=\"validate\">\r\n          <label for=\"icon_telephone1' + counter + '\" class=\"\">Min<\/label>\r\n        <\/div>\r\n        <div class=\"input-field col s2\">\r\n          <input id=\"max1' + counter + '\" type=\"number\" class=\"validate\">\r\n          <label for=\"max1' + counter + '\" class=\"\">Max<\/label>\r\n        <\/div>\r\n    <i class=\"material-icons prefix remove active\" style=\"\r\n    margin-top: 1.7rem; cursor: pointer;color: #607D8B;\r\n\">close<\/i><\/div>\r\n       <\/div>' );
  counter++;
};

$(".promo-example").hover(
  function () {
    $(this).addClass("hovered");
  },
  function () {
    $(this).removeClass("hovered");
  }
);
     


$(".promo-example").click(
  function () {
    $(".promo-example").removeClass("selected")
    $(this).addClass("selected");
  }
);  

$(".promo-example2").hover(
  function () {
    $(this).addClass("hovered");
  },
  function () {
    $(this).removeClass("hovered");
  }
);
     


$(".promo-example2").click(
  function () {
    $(".promo-example").removeClass("selected")
    $(this).addClass("selected");
  }
);  

$(".keywords").delegate(".remove", "click", function () {  
    $(this).closest('.rowKey').remove();
  }
);  


function newOrder() {
  var orderNumber = $( ".card" ).length;
  //var orderNumber = $(".card").index(this);
  $( ".creation" ).prepend('<div class=\"card animated zoomIn\">\r\n\t\t<h2 class=\"fs-title\" style=\"    padding-top: 25px;\r\n    padding-left: 25px;\r\n    text-align: left;\r\n    width: 100%;\">Product description n\u00B0'+ orderNumber +'<\/h2>\r\n<div class=\"row\">\r\n      <div class=\"input-field col s12\">\r\n          <input  id=\"first_name'+ orderNumber +'\" type=\"text\" class=\"validate\">\r\n          <label for=\"first_name'+ orderNumber +'\">Order name<\/label> \r\n        <\/div> \r\n  <div class=\"row col s12\" style=\"color:grey;font-size: 10px;text-align: left;margin-top: -10px;margin-left: 0px\">Name your order, you can also use a reference Id from your system to find it easily <\/div>\r\n      <\/div>\r\n    <div class=\"row\">\r\n      <div class=\"input-field col s12\">\r\n          <input  id=\"first_name2'+ orderNumber +'\" type=\"text\" class=\"validate\">\r\n          <label for=\"first_name2'+ orderNumber +'\">URL (optional)<\/label> \r\n        <\/div> \r\n     \r\n      <div class=\"row col s12\" style=\"color:grey;font-size: 10px;text-align: left;margin-top: -10px;margin-left: 0px\">You can add an url to give more informations to the writer<\/div> <\/div> \r\n      \r\n       <div class=\"row\">\r\n      <div class=\"input-field col s12\">\r\n          <input  id=\"first_name2'+ orderNumber +'\" type=\"text\" class=\"validate\">\r\n          <label for=\"first_name2'+ orderNumber +'\">Reference id (optional)<\/label> \r\n        <\/div> \r\n     \r\n      <div class=\"row col s12\" style=\"color:grey;font-size: 10px;text-align: left;margin-top: -10px;margin-left: 0px\">You can add a reference id to match the order with your system<\/div> <\/div>  \r\n  <div class=\"keywords\">    \r\n<!-- <div class=\"row\">\r\n        <div class=\"input-field col s6\">\r\n          <i class=\"material-icons prefix\">label<\/i>\r\n          <input id=\"icon_prefix'+ orderNumber +'\" type=\"text\" class=\"validate\">\r\n          <label for=\"icon_prefix'+ orderNumber +'\">Keyword<\/label>\r\n        <\/div>\r\n   <div class=\"row\">\r\n    <div style=\"margin-top:2rem\" class=\"col s2\"> Density<\/div> \r\n     <div class=\"input-field col s2\"> Density<\/div>\r\n        <div class=\"input-field col s2\">\r\n          <input id=\"icon_telephone'+ orderNumber +'\" type=\"number\" class=\"validate\">\r\n          <label for=\"icon_telephone'+ orderNumber +'\">Min<\/label>\r\n        <\/div>\r\n        <div class=\"input-field col s2\">\r\n          <input id=\"max'+ orderNumber +'\" type=\"number\" class=\"validate\">\r\n          <label for=\"max'+ orderNumber +'\">Max<\/label>\r\n        <\/div>\r\n    <\/div>\r\n       <\/div>-->\r\n    \r\n\r\n    <\/div>\r\n          <div><a class=\"waves-effect waves-light btn\" onClick=\"newKeyword()\"><i class=\"material-icons left\">add<\/i>Add a Keyword<\/a><\/div> \r\n      <\/div>\r\n    <\/div>');
  orderCounter++;
  counter++;
};

$("fieldset").delegate(".removeOrder", "click", function () {  
    $(this).closest('.card').remove();
  }
);
</script>
