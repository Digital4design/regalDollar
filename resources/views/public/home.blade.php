@include('homeheader')
<?php // dd($activePlan['plan_id']);?>
<!--CONTENT START-->
<div class="content">
<div class="inner-banner kode-team-section overlay movingbg normaltopmargin normalbottommargin light movingbg" data-id="customizer" data-title="Theme Customizer" data-direction='horizontal'>
      <div class="container">
         <p>
            <img src="{{ URL::asset('public/assets/images/peacock.png') }}" style="height:100px;">
         </p>
         <h2>Flexible Investments. Guaranteed Returns.<br />Freedom to cancel at any time.</h2>
         <ol class="breadcrumb">
            <li style="color:#EFEFEF;">
               RegalDollars is a money investment company with
               <span style="text-decoration:underline;">guaranteed</span> returns.<br />
               <span style="font-size:.75em;">(some restrictions apply)</span>
            </li>
         </ol>
        </div>
    </div>

	<div class="core_plans_section">
		<div class="container">
			<div class="heading heading-4">
				<h2 style="color:#333">Core Plans</h2>				
				<!-- <p style="color:#333">Choose from one of three plans that best fits your goals</p> -->
				<p style="color:#333">Each plan designed and created with the goal of growing your wealth</p>
			</div>
			
			<div class="plans_section">
				<?php 
				foreach ($investmentData as $key=>$plan) { 
					?>
				<div class="block"> 
					<div class="image_sec">
						<img src="{{ asset('public/assets/images') }}/{{ $plan->banner}}" alt="">
						<div class="icon_sec">
							<img src="{{ asset('public/assets/images') }}/{{ $plan->icon}}" alt="">
						</div>
					</div>
					<div class="detail_sec">
						<h2 class="title">{{ $plan->plan_name}}</h2>
						<p>{{ $plan->slogan}}</p>
						
						<div class="progress_bar Supplemental_track">
							<div class="row">
								<span class="bar_title">Dividends</span>
								<div class="track">
									<span class="show_result"></span>
								</div>
							</div>
							<div class="row">
								<span class="bar_title">Appreciation</span>
								<div class="track">
									<span class="show_result"></span>
								</div>
							</div>
							<div class="row">
								<span class="bar_title">Total return</span>
								<div class="track">
									<span class="show_result"></span>
								</div>
							</div>
						</div>
						<br/><br/><br/>
						<a  class="btn" href="<?php echo url('/plan-detail-page') . '/' . $plan->id  ?>">View detail</a>
						<br/><br/>
						<a class="get_started" href="<?php echo url('/front/create-details') . '/' . $plan->id  ?>">Get Started </a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>

	
	<section class="causes-section overlay">
		<div class="container">
			<!--HEADER SECTION START-->
			<div class="heading heading-4">
				<p style="color:#fff">How we guarantee returns on investment</p>
				<h2 style="color:#fff">The Regal Dollars Service</h2>
			</div>
			<!--HEADER SECTION END-->
			<div class=" kode-cause">
				<div class="row">
					<div class="col-md-6">
						<img src="{{ asset('public/images/skyscraper.jpg') }}" alt="">
					</div>
					<div class="col-md-6">
						<h2>Why Choose RegalDollars?</h2>
						<p>I would like to explain how the system works here. Let's come up with something : )</p>
						<p>Lorem ipsum dolor amet fixie flannel brooklyn 3 wolf moon flexitarian gentrify kogi green juice lumbersexual. Prism heirloom put a bird on it, palo santo mumblecore PBR&B keytar. Pop-up brooklyn photo booth celiac affogato glossier semiotics banh mi poke. Chartreuse pitchfork meh lyft. Hell of skateboard af beard, pug selvage activated charcoal whatever. Four dollar toast swag intelligentsia cloud bread man braid stumptown.</p>
						<p>Hoodie craft beer tousled chambray thundercats cliche gochujang 8-bit pop-up gentrify taiyaki jianbing tacos. Green juice hammock vexillologist put a bird on it trust fund lyft health goth tbh PBR&B retro shabby chic ugh. Master cleanse venmo dreamcatcher yr pug shaman pinterest banh mi fingerstache pok pok direct trade single-origin coffee knausgaard ramps cred. Cronut cred bespoke, portland four loko readymade man bun keffiyeh wolf normcore. 90's mustache waistcoat hot chicken deep v, plaid bitters brooklyn cloud bread slow-carb street art migas man bun tattooed.</p> <a href="#" class="read-more">Read More</a>
						<!--DONATE TEXT END-->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!------->
	<section class="why-us-section">
		<div class="container">
			<div class="heading heading-4">
				<h2 style="color:#333">Why Us</h2> 
				<p>Here’s What You Get When You choose Regal Dollars.</p>
			</div>
			<div class="why-us-option">
				<div class="row">
				<div class="col-md-4">
						<img src="{{ asset('public/assets/images/percent.png') }}">
						<h3>Guaranteed Return</h3>	
						<p>Lock in a fixed rate so you know exactly how much interest you'll earn</p>
					</div>
					
					<div class="col-md-4">
						<img src="{{ asset('public/assets/images/calaender.png') }}">
						<h3>Flexible Plans</h3>	
						<p>Terms that work on your schedule</p>
					</div>
					
					<div class="col-md-4">
						<img src="{{ asset('public/assets/images/balance.png') }}">
						<h3>Competitive rates and terms</h3>	
						<p>Many options for reaching your financial goals</p>
					</div>
					
					<div class="col-md-4">
						<img src="{{ asset('public/assets/images/balance.png') }}">
						<h3>Full control</h3>	
						<p>Freedom to cancel at any time</p>
					</div>
					
					<div class="col-md-4">
						<img src="{{ asset('public/assets/images/balance.png') }}">
						<h3>Low minimum to start</h3>	
						<p>Only $5,000 to start</p>
					</div>
					
					<div class="col-md-4">
						<img src="{{ asset('public/assets/images/balance.png') }}">
						<h3>Cash flow</h3>	
						<p>Withdraw your earning monthly</p> 
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!------->
	<!------->
	<section class="how-section">
		<div class="container">
			<div class="heading heading-4">
				<h2 style="color:#333">How it works</h2> 
				<p>It only takes a few minutes to start saving for futur.</p>
			</div>
			<div class="how-option">
				<div class="row">
					<div class="col-md-4">
						<img src="{{ asset('public/assets/images/one.png') }}">
						<h1>Signup</h1>	
						<!-- <p>Begin our secure ( and fast ) account opening process.Choose term from months to years.</p> -->
						<p>Inter your info</p>
					</div>
					<div class="col-md-4">
						<img src="{{ asset('public/assets/images/two.png') }}">
						<h1>Fund</h1>	
						<!-- <p>Including your name, address, date of birth and Social Security Number.</p> -->
						<p>contribute to a plan</p>
					</div>
					<div class="col-md-4">
						<img src="{{ asset('public/assets/images/three.png') }}">
						<h1>Earn</h1>	
						<!-- <p>Link to your account at another bank.</p> -->
						<p>enjoy your return</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!------->
	<!-- <section class="kode-pagesection">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="img-abt">
						<img src="{{ asset('public/assets/images/2019-09-13_opi_53310700_I1.png') }}" style="padding:2em;" />
					</div>
				</div>
				<div class="col-md-8">
					
					<div class="content">
						<h3>Neil Kabi, President</h3>
						Regal House Investments started as a lending office for large government contract financing &amp; processing established 1971 in Honk Kong. The company was founded by Hadi Gul, as one of the pioneers in infrastructures financier he dealt with many governments and companies from around the globe such as Macaw-China, Kuwait, Morocco, Brazil, France, Ireland, Spain and Indonesia. The company was sold to Attard Ltd. in 1996. I have long practice my father's saying:
						<p style="padding:10px;font-size:1.25em;">"Legacy is not what you leave behind. Legacy is what you share with the people"</p>We embody the word Regal in great way by stretching your dollars any where from 3% to 150% in value. What is unique about Regal Dollars is that we can explain our process transparently: the conventional financial structure employs many "middle-men". Often times in investment banking, or any processing capital activity in investment, there is a commission-based distribution system that involves paid intermediaries such as broker-dealers, financial planners, escrow services, and others. The total commission and fee structure related to managing capital is typically 10%-27% of the overall cost. In other words, approximately 10%-27% of the capital gets spent on commissions and related fees. With RegalDollars, there are no internal commissions paid. Simply put, that's why we are different.</div>
					
				</div>
			</div>
		</div>
	</section> -->
	<!--
   <section class="buy-template">
      <div class="container" style="text-align: center;">
         <div class="row">
            <div class="col-sm-3">
               <h2 class="social"><a href="#"><i class="fa fa-linkedin" style="border-right:1px solid #ddd;padding:10px;"></i> LinkedIn</a></h2>
            </div>
            <div class="col-sm-3">
               <h2 class="social"><a href="#"><i class="fa fa-twitter" style="border-right:1px solid #ddd;padding:10px;"></i> Twitter</a></h2>
            </div>
            <div class="col-sm-3">
               <h2 class="social"><a href="#"><i class="fa fa-youtube" style="border-right:1px solid #ddd;padding:10px;"></i> Youtube</a></h2>
            </div>
            <div class="col-sm-3">
               <h2 class="social"><a href="#"><i class="fa fa-facebook" style="border-right:1px solid #ddd;padding:10px;"></i> Facebook</a></h2>
            </div>
         </div>
      </div>
   </section>-->
	<!--BUY TEMPLATE SECTION END-->
</div>
@include('homefooter')
@include('homescripts')