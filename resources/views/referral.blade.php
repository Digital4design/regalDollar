@section('css')
@endsection
@include('homeheader')
<div class="content">
<!--SERVICES SECTION START-->
<section class="thumb-with-text">
   <div class="join_us_section referral">
      <img src="{{ URL::asset('public/assets/images/internal_banner.jpg') }}" />
      <div class="overlay"></div>
         <div class="container">
            <div class="join_contnet">
               <h2>Referral</h2>
               <p>Get paid like a million-dollar guy without writing a million-dollars check</p>
            </div>
         </div>
      </div>
   </div>

   <div class="container">

      <div class="story community">
         <h2 class="section_title">Help grow the community.</h2>
         <h4>When You Tell Your Friends and Family About RegalDollars.Com,You’re Not Just Sharing New Opportunities – You’re Sharing A New Way To Share And Build Wealth.</h4>
      </div>      
   </div>
   
   
   <!------->
   <section class="how-section">
		<div class="container">
			<div class="heading heading-4 howit">
				<h2 style="color:#333">How it works</h2> 
				<p>It only takes a few minutes to start saving for futur.</p>
			</div>
			<div class="how-option howto-referal">
				<div class="row">
					<div class="col-md-12">
						<img src="{{ asset('public/assets/images/one.png') }}">
						<!-- <h3>Signup</h3>	 -->
						<!-- <p>Begin our secure ( and fast ) account opening process.Choose term from months to years.</p> -->
						<p>Every time you refer regaldollars.com to a friend or family member, you’ll receive a $100 Visa gift card when he or she chooses a core plan. There is no limit to how many people you can refer to.</p>
                  <p>less than $50K</p>
               </div>

					<div class="col-md-12">
						<img src="{{ asset('public/assets/images/two.png') }}">
						<!-- <h3>Fund</h3>	 -->
						<!-- <p>Including your name, address, date of birth and Social Security Number.</p> -->
						<p>Every time you refer regaldollars.com to a friend or family member, you’ll receive a $500 Visa gift card when he or she chooses a core plan. There is no limit to how many people you can refer to.</p>
                  <p>greater than $50K</p>
               </div>

               <div class="col-md-12">
                  <p>We are honored to work with individuals like you. Thank you for recommending us to your friends and family.</p>
               </div>
				</div>
			</div>
		</div>
	</section>

</section>
@include('homefooter')
@include('homescripts')