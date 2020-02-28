@include('homeheader')
<!--CONTENT START-->
<div class="content">

	<div class="core_plans_section">
		<div class="container">
			<div class="heading heading-4">
				<h2 style="color:#333">Core Plans</h2>				
				<p style="color:#333">Choose from one of three plans that best fits your goals</p>
			</div>
			
			<div class="plans_section">
			
				<div class="block">
					<div class="image_sec">
						<img src="{{ asset('public/assets/images/Supplemental_Income.jpg') }}" alt="">
						<div class="icon_sec">
							<img src="{{ asset('public/assets/images/cash.png') }}" alt="">
						</div>
					</div>
					<div class="detail_sec">
						<h2 class="title">Supplemental Income</h2>
						<p>Create an attractive,  consistent income stream.</p>
						
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
						
						<a class="btn">View detail</a>
					</div>
				</div>
				
				<div class="block">
					<div class="image_sec">
						<img src="{{ asset('public/assets/images/Balanced_Investing.jpg') }}" alt="">
						<div class="icon_sec">
							<img src="{{ asset('public/assets/images/libra.png') }}" alt="">
						</div>
					</div>
					<div class="detail_sec">
						<h2 class="title">Balanced Investing</h2>
						<p>Build wealth confidently with high diversification.</p>
						
						<div class="progress_bar Balanced_track">
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
						
						<a class="btn">View detail</a>
					</div>
				</div>
				
				<div class="block">
					<div class="image_sec">
						<img src="{{ asset('public/assets/images/Long-Term_Growth.jpeg') }}" alt="">
						<div class="icon_sec">
							<img src="{{ asset('public/assets/images/money.png') }}" alt="">
						</div>
					</div>
					<div class="detail_sec">
						<h2 class="title">Long-Term Growth</h2>
						<p>Pursue superior overall returns over the long term.</p>
						
						<div class="progress_bar Long-Term_track">
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
						
						<a class="btn">View detail</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--SERVICES SECTION START-->
	<section class="white-bg">
		<div class="container">
			<!--HEADER SECTION START-->
			<div class="heading heading-4">
				<p style="color:#333">Supplemental Income Plans</p>
				<h2 style="color:#333">Investment Plans</h2>
			</div>
			<!--HEADER SECTION END-->
			<div class="plans">
				<div class="row">
					<?php  foreach ($planData as $key=>$plan) { ?>
					<div class="col-md-6 col-lg-3">
						<div class="kode-event-list-2">
							<div class="kode-thumb"> <a href="#">
                     <img id="pdo" alt="" src="{{ asset('public/uploads/plan_icon') }}/{{$plan->icon}}">
                     </a>
							</div>
							<div class="kode-text">
								<h2>{{ $plan->time_investment}} Month Plan</h2>
								<p class="title">
									<?php $planDescription=json_decode($plan->descritpion); foreach ($planDescription as $key => $planDesc) { ?>
									<p style="text-align: left;"><i class="fa fa-arrow-right"></i> {{ $planDesc }}</p>
									<?php } ?>
									<!-- <p style="text-align: left;"><i class="fa fa-arrow-right"></i> You will be able to withdrawal your earnings every month.</p>
                     <p style="text-align: left;"><i class="fa fa-arrow-right"></i> You cannot cancel within the first year.</p>
                     <p style="text-align: left;"><i class="fa fa-arrow-right"></i> $50,000 become $68,000 in one year // $1,500 a month.</p>
                     </p> -->
									<?php if(date("Y-m-d") >= $plan['plan_valid_from']){ ?> <a class="btn-filled" href="{{ url('/register') }}">Get Started</a>
									<?php }else{ ?>
									<div class="alert alert-warning">This plan will be available in <b> {{ date('m/d/yy', strtotime($plan->plan_valid_from)) }} </b>
									</div> <a class="btn-filled" href="#">Get Started</a>
									<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<!--  <div class="col-md-3">
               <div class="kode-event-list-2">
                  <div class="kode-thumb">
                     <a href="#"><img alt="" src="{{ asset('images/news-img2.png') }}"></a>
                  </div>
                  <div class="kode-text">
                     <h2>24 Month Plan</h2>
                     <p class="title">
                     <p style="text-align: left;"><i class="fa fa-arrow-right"></i> Guaranteed return of 20% annually.</p>
                     <p style="text-align: left;"><i class="fa fa-arrow-right"></i> Two-year commitment, you cannot cancel on the first year.</p>
                     <p style="text-align: left;"><i class="fa fa-arrow-right"></i> $50,000 become $72,000 in 2 years.</p>
                     </p>
                     <a class="btn-filled" href="#">Get Started</a>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="kode-event-list-2">
                  <div class="kode-thumb">
                     <a href="#"><img alt="" src="{{ asset('images/news-img3.png') }}"></a>
                  </div>
                  <div class="kode-text">
                     <h2>36 Month Plan</h2>
                     <p class="title">
                     <p style="text-align: left;"><i class="fa fa-arrow-right"></i> Guaranteed return of 25% annually.</p>
                     <p style="text-align: left;"><i class="fa fa-arrow-right"></i> Three-year commitment, you cannot cancel on the first year.</p>
                     <p style="text-align: left;"><i class="fa fa-arrow-right"></i> When you finish the three years, we will bonus your account $2,500 that's our reward for your commitment.</p>
                     <p style="text-align: left;"><i class="fa fa-arrow-right"></i> $50,000 become $90,000 in 3 years.</p>
                     </p>
                     <a class="btn-filled" href="#">Get Started</a>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="kode-event-list-2">
                  <div class="kode-thumb">
                     <a href="#"><img alt="" src="{{ asset('images/news-img4.png') }}"></a>
                  </div>
                  <div class="kode-text">
                     <h2>60 Month Plan</h2>
                     <p class="title">
                     <p style="text-align: left;"><i class="fa fa-arrow-right"></i> Guaranteed return 150% on completion.</p>
                     <p style="text-align: left;"><i class="fa fa-arrow-right"></i> Five-year commitment, you cannot cancel this plan.</p>
                     <p style="text-align: left;"><i class="fa fa-arrow-right"></i> At completion, we will bonus your account with $5,000 as gratitude of doing business with us.</p>
                     <p style="text-align: left;"><i class="fa fa-arrow-right"></i> $50,000 become $150,000 in 5 years. Bonus and rewards only apply to $50,000 accounts</p>
                     </p>
                     <a class="btn-filled" href="#">Get Started</a>
                  </div>
               </div>
            </div>  
            --></div>
			</div>
		</div>
	</section>
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
						<img src="{{ asset('public/assets/images/inventory.png') }}">
						<h3>Full control</h3>	
						<p>Freedom to cancel at any time</p>
					</div>
					
					<div class="col-md-4">
						<img src="{{ asset('public/assets/images/graphic.png') }}">
						<h3>Low minimum to start</h3>	
						<p>Only $5,000 to start</p>
					</div>
					
					<div class="col-md-4">
						<img src="{{ asset('public/assets/images/cash-flow.png') }}">
						<h3>Cash flow</h3>	
						<p>Withdraw your earning monthly</p> 
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!------->
	
	<section class="Referral-section">
		<div class="container">
			<div class="heading heading-4">
				<h3 style="color:#333">Help grow the community.</h3> 
				<p>When you tell your friends and family about RegalDollars.com, you’re not just sharing new the opportunities – you’re sharing a new way to share and build wealth.</p>
			</div>
	
	    </div> 
	</section>
	
	
	<!------->
	<section class="how-section">
		<div class="container">
			<div class="heading heading-4">
				<h2 style="color:#333">How it works</h2> 
				<p>It only takes a few minutes to start saving for futur.</p>
			</div>
			<div class="how-option">
				<div class="row">
					<div class="col-md-6">
						<img src="{{ asset('public/assets/images/one.png') }}">
							
						<p>Every time you refer regaldollars.com to a friend or family member, you’ll receive a $100 Visa gift card when he or she chooses a core plan. There is no limit to how many people you can refer to.</p>
						<p>* less than $50K</p>
					</div>
					<div class="col-md-6">
						<img src="{{ asset('public/assets/images/two.png') }}">
							
						<p>Every time you refer regaldollars.com to a friend or family member, you’ll receive a $500 Visa gift card when he or she chooses a core plan. There is no limit to how many people you can refer to.</p>
						<p>*greater than $50K</p>
					</div>
					</div>
					
					<div class="row">
					<div class="col-md-12"> 
					   <p>We are honored to work with individuals like you. Thank you for recommending us to your friends and family.</p>
					</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!------->
	<section class="kode-pagesection">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="img-abt">
						<img src="{{ asset('public/assets/images/2019-09-13_opi_53310700_I1.png') }}" style="padding:2em;" />
					</div>
				</div>
				<div class="col-md-8">
					<!--HEADER SECTION START-->
					<!--<div class="heading heading-4">
                  <h2 style="color:#333">About Us</h2>
                </div>  -->
					<div class="content">
						<h3>Neil Kabi, President</h3>
						Regal House Investments started as a lending office for large government contract financing &amp; processing established 1971 in Honk Kong. The company was founded by Hadi Gul, as one of the pioneers in infrastructures financier he dealt with many governments and companies from around the globe such as Macaw-China, Kuwait, Morocco, Brazil, France, Ireland, Spain and Indonesia. The company was sold to Attard Ltd. in 1996. I have long practice my father's saying:
						<p style="padding:10px;font-size:1.25em;">"Legacy is not what you leave behind. Legacy is what you share with the people"</p>We embody the word Regal in great way by stretching your dollars any where from 3% to 150% in value. What is unique about Regal Dollars is that we can explain our process transparently: the conventional financial structure employs many "middle-men". Often times in investment banking, or any processing capital activity in investment, there is a commission-based distribution system that involves paid intermediaries such as broker-dealers, financial planners, escrow services, and others. The total commission and fee structure related to managing capital is typically 10%-27% of the overall cost. In other words, approximately 10%-27% of the capital gets spent on commissions and related fees. With RegalDollars, there are no internal commissions paid. Simply put, that's why we are different.</div>
					<!--HEADER SECTION END-->
				</div>
			</div>
		</div>
	</section>
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