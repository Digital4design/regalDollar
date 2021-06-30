@section('css')
@endsection
@include('homeheader')
<div class="content">
   <!--SERVICES SECTION START-->
   <section class="thumb-with-text cont-section">
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
   @if(Session::has('status'))
   <div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
   @endif
      <h2 class="section_title">Help grow the community.</h2>
      <?php // Auth::user()->id 
      ?>
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

            <div class="col-md-12">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Share to your freind
               </button>
               <!-- <a class="btn btn-info" href="">Share to your freind</a> -->
            </div>
            <div class="col-md-12"></div>
            <br>
         </div>
      </div>
   </div>

   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">User Referral</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="post" action="{{ url('/user-referral') }}" enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="modal-body">
                  <div class="form-group">
                     <label for="">Freind Email</label>
                     <input name="email" id="email" class="form-control" placeholder="Enter friend email" />
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Send</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>

</section>


@include('homefooter')
@include('homescripts')