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
      <div class="faq_block">

         <div class="block">
            <div class="top">
               <h2>About Regal Dollar</h2>
            </div>
            <div class="bottom">
               <p>What we do, how we’re different, and how you can contact us.</p>
               <a href="#">View Detail</a>
            </div>
         </div>

         <div class="block">
            <div class="top">
               <h2>Getting started</h2>
            </div>
            <div class="bottom">
               <p>Learn more about investing on Fundrise, and what to expect.</p>
               <a href="#">View Detail</a>
            </div>
         </div>

         <div class="block">
            <div class="top">
               <h2>Our investments</h2>
            </div>
            <div class="bottom">
               <p>Get to know the investments that make up a Regal Dollar portfolio.</p>
               <a href="#">View Detail</a>
            </div>
         </div>

         <div class="block">
            <div class="top">
               <h2>Account management</h2>
            </div>
            <div class="bottom">
               <p>Here’s what you need to know about navigating your dashboard. </p>
               <a href="#">View Detail</a>
            </div>
         </div>

         <div class="block">
            <div class="top">
               <h2>Taxes</h2>
            </div>
            <div class="bottom">
               <p>Find answers to the most common tax filing questions.</p>
               <a href="#">View Detail</a>
            </div>
         </div>

      </div>
   </div>

</section>

@include('homefooter')

@include('homescripts')