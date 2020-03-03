@include('homeheader')
<div class="content">
   <div class="core_plans_section">
      <div class="container">
         <div class="heading heading-4">
            <h2 style="color:#333">Core Plans</h2>
            <p style="color:#333">Choose from one of three plans that best fits your goals</p>
         </div>
         <div class="plans_section">
            <?php
			foreach ($coreData as $key=>$plan) { 
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
                  <a class="btn" href="{{ $plan->id}}">View detail</a>
               </div>
            </div>
            <?php } ?>
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
               <?php   
                  foreach ($investmentData as $key=>$plan) { 
                  ?>
               <div class="col-md-3">
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
                        <?php }  if(date("Y-m-d") >= $plan['plan_valid_from']){ ?> <a class="btn-filled" href="{{ url('/register') }}">Get Started</a>
                        <?php }else{ ?>
                        <div class="alert alert-warning">This plan will be available in <b> {{ date('m/d/yy', strtotime($plan->plan_valid_from)) }} </b>
                        </div>
                        <a class="btn-filled" href="#">Get Started</a>
                        <?php } ?>
                     </div>
                  </div>
               </div>
               <?php } ?>
               
            </div>
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
                  <p>Hoodie craft beer tousled chambray thundercats cliche gochujang 8-bit pop-up gentrify taiyaki jianbing tacos. Green juice hammock vexillologist put a bird on it trust fund lyft health goth tbh PBR&B retro shabby chic ugh. Master cleanse venmo dreamcatcher yr pug shaman pinterest banh mi fingerstache pok pok direct trade single-origin coffee knausgaard ramps cred. Cronut cred bespoke, portland four loko readymade man bun keffiyeh wolf normcore. 90's mustache waistcoat hot chicken deep v, plaid bitters brooklyn cloud bread slow-carb street art migas man bun tattooed.</p>
                  <a href="{{ url('/') }}" class="read-more">Read More</a>
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
                  <h3>Competitive rates</h3>
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
               <div class="col-md-6">
                  <img src="{{ asset('public/assets/images/one.png') }}">
                  <h3>Signup</h3>
                  <p>Begin our secure ( and fast ) account opening process.Choose term from months to years.</p>
               </div>
               <div class="col-md-4">
                  <img src="{{ asset('public/assets/images/two.png') }}">
                  <h3>Fund</h3>
                  <p>Including your name, address, date of birth and Social Security Number.</p>
               </div>
               <div class="col-md-4">
                  <img src="{{ asset('public/assets/images/three.png') }}">
                  <h3>Earn</h3>
                  <p>Link to your account at another bank.</p>
               </div>
            </div>
         </div>
      </div>
   </section>
   
   <!--BUY TEMPLATE SECTION END-->
</div>
@include('homefooter')
@include('homescripts')