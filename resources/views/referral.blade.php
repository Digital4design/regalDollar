@section('css')
@endsection
@include('homeheader')
<div class="content">
   <!--SERVICES SECTION START-->
   <section class="thumb-with-text">
      <div class="inner_page_banner">
         <div class="container">
            <div class="banner_content">
               <h2>How can we help you?</h2>
               <div class="search_block">
                  <input type="search" placeholder="Search the help center" >
                  <i class="fa fa-search" aria-hidden="true"></i>
               </div>
            </div>
         </div>
      </div>
      <div class="container">
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
         <!---------------------->
      </div>
</div>
</section>
@include('homefooter')
@include('homescripts')