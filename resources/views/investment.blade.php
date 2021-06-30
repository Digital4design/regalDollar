@include('homeheader')
<!--CONTENT START-->
<div class="content">
    <div class="core_plans_section">
        <div class="container">
            <div class="heading heading-4">
                <h2 style="color:#333">Core Plans</h2>
                <!-- <p style="color:#333">Choose from one of three plans that best fits your goals</p> -->
                <p style="color:#333">Each plan designed and created with the goal of growing your wealth</p>
            </div>
            <div class="plans_section">
                <?php
                foreach ($investmentData as $key => $plan) {
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
                            <p>{{ $plan->description}}</p>
                            <!-- <div class="progress_bar Supplemental_track">
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
                            </div> -->
                            <br /><br /><br />
                            
                                <a class="btn" href="<?php echo url('/plan-detail-page') . '/' . $plan->id  ?>">View detail</a>
                            
                            <br /><br />
                            <!-- <a class="get_started" href="<?php // echo url('/investment/create-step2') . '/' . $plan->id  ?>">Get Started </a> -->
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

    <div id="inactivePlanModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Plane Info</h4>
				</div>
				<div class="modal-body">
					<p>You cannot buy this plan because the administrator has made this plan interactive</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

    <div id="inactivePlanModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Plane Info</h4>
				</div>
				<div class="modal-body">
					<p>You cannot buy this plan because the administrator has made this plan interactive</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

</div>
@include('homefooter')
@include('homescripts')