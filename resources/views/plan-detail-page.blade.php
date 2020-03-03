@section('css')
@endsection
@include('homeheader')
<div class="content">
<!--SERVICES SECTION START-->
<section class="thumb-with-text">
   <div class="inner_page_banner">
      <div class="container">
         <div class="banner_content">
            <div class="main_title_block">
               <div class="eta  ml-25 display-none-smo">
                  <a class="text-color-current-color" href="/investments">Investments</a>
                  <svg class="ml-50 mr-50" width="0.25em" height="0.5em">
                     <line stroke-linecap="square" stroke="currentColor" stroke-width="1.25" x1="0" y1="0" x2="0.25em" y2="0.25em"></line>
                     <line stroke-linecap="square" stroke="currentColor" stroke-width="1.25" x1="0" y1="0.5em" x2="0.25em" y2="0.25em"></line>
                  </svg>
                  <a class="text-color-current-color" href="/investments#advanced-plans">Core Plans</a>
                  <svg class="ml-50 mr-50" width="0.25em" height="0.5em">
                     <line stroke-linecap="square" stroke="currentColor" stroke-width="1.25" x1="0" y1="0" x2="0.25em" y2="0.25em"></line>
                     <line stroke-linecap="square" stroke="currentColor" stroke-width="1.25" x1="0" y1="0.5em" x2="0.25em" y2="0.25em"></line>
                  </svg>
                  <a class="text-color-current-color" href="/investments/advanced-plans/balanced-investing">Balanced Investing</a>
               </div>
               <h1 class="heading-text-color">Balanced Investing</h1>
               <p>
                  Build wealth confidently through a mix of </br>cash-flowing and	growth-oriented real&nbsp;estate.
               </p>
            </div>
            <div class="banner_content2">
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
               <div class="btn_top"> 
                  <button>
                  Invest now
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="bred-crumb">
      <div class="container">
         <ul class="in-page-nav">
            <li>
               <a href="">
               Overview
               </a>
            </li>
            <li>
               <a href="">
               Return Profile
               </a>
            </li>
            <li>
               <a href="">
               Strategy
               </a>
            </li>
            <li>
               <a href="">
               Featured Asset
               </a>
            </li>
            <li>
               <a href="">
               Portfolio
               </a>
            </li>
            <li>
               <a href="">
               Top Questions
               </a>
            </li>
         </ul>
      </div>
   </div>
   <div class="marketing-section" id="overview">
      <div class="container">
         <div class="plan-portfolio-overview">
            <p class="heading-text-color">Key takeaways</p>
            <ul class="gamma-md">
               <li class="goal-selection__list-item">
                  Aim to earn returns via a blend of<br class="display-none-smo display-none-mdo"> <strong class="dark">dividends and appreciation</strong>
               </li>
               <li class="goal-selection__list-item">
                  Invest in a balanced mix of<br class="display-none-smo display-none-mdo"> <strong class="dark">income and growth</strong>&nbsp;strategies
               </li>
               <li class="goal-selection__list-item">
                  Target allocation across a broad range of investment types and&nbsp;structures
               </li>
            </ul>
         </div>
         <div class="img_right"> 
            <img src="{{ URL::asset('public/images/1_img.jpg') }}" />
         </div>
      </div>
   </div>
   <div class="bg-dark-blue js-track-scroll-depth" id="return-profile">
      <div class="container">
         <div class="marketing-section">
            <div class="text-align-center line-height-125 gamma text-color-white font-weight-lighter-md reversed-md">Return Profile</div>
            <h2 class="text-align-center reversed mt-100-smo line-height-125-md text-color-white-md font-weight-lighter-md beta-md">
               Aim to realize returns through both <strong class="font-weight-normal-smo">dividends and&nbsp;appreciation</strong>
            </h2>
            <img src="{{ URL::asset('public/images/blu.jpg') }}"/>    
         </div>
      </div>
   </div>
   <div class="Strategy-section" id="Strategy">
   <div class="container">
   <div class="marketing-section">
      <div class="gamma dark ">Strategy</div>
      <h2 class="text-align-center">
         <span class="font-weight-normal">We execute two distinct real estate<br class="display-none-smo">
         private equity businesses on your&nbsp;behalf.</span>
      </h2>
   </div>
   <div  class="button-group">
      <a class="button active">
      Income
      <span class="stacked-step__button-connector ng-scope"></span>
      </a>
      <a class="button">
      Growth							
      </a>
   </div>
   <div class="marketing-section2" id="overview">
   <div class="container">
      <div class="block-sec">
         <div class="stacked-step__body col-sec" >
            <div class="stacked-step__count ng-binding">1</div>
            <h3 class="line-height-125 delta beta-md heading-text-color">
               <strong  class="ng-binding">Acquire</strong> 
               <span class="font-weight-lighter-md ng-binding" >assets that generate consistent cash flow</span>
            </h3>
            <p class="delta-md ng-binding" >We invest primarily in assets that generate predictable returns from the moment we make the investment. This could mean lending to the developer of a new property, or buying an existing building with tenants in place.</p>
            <p  class="zeta muted ng-binding ng-scope">Pictured: New apartment community in Springfield, MO</p>
         </div>
         <div class="img_div col-sec">
            <img src="{{ URL::asset('public/images/aspen-heights-springfield.jpg') }}" />
         </div>
      </div>
      <div class="block-sec">
         <div class="img_div col-sec">
            <img src="{{ URL::asset('public/images/wewew.jpg') }}" />
         </div>
         <div class="stacked-step__body col-sec" >
            <div class="stacked-step__count ng-binding">2</div>
            <h3 class="line-height-125 delta beta-md heading-text-color">
               <strong  class="ng-binding">Improve</strong> 
               <span class="font-weight-lighter-md ng-binding" >the real estate to increase margin of safety</span>
            </h3>
            <p class="delta-md ng-binding" >To maintain and grow a high-income stream, we prefer to invest in a business plan that improves the value of the property. Investors can more predictably capture above-market returns by increasing the value of a building.</p>
            <p class="zeta muted ng-binding ng-scope">Pictured: Before and after renovations on apartments in Jacksonville, FL</p>
         </div>
      </div>
      <div class="block-sec">
         <div class="stacked-step__body col-sec" >
            <div class="stacked-step__count ng-binding">3</div>
            <h3 class="line-height-125 delta beta-md heading-text-color">
               <strong  class="ng-binding">Realize</strong> 
               <span class="font-weight-lighter-md ng-binding" > returns over time via rent or interest payments</span>
            </h3>
            <p class="delta-md ng-binding" >Unlike in a growth strategy, where returns are typically “back-ended” when the property is sold, investors in an income strategy can look forward to earning consistent distributions over time as we collect rent or interest payments.</p>
         </div>
         <div class="img_div col-sec">
            <img src="{{ URL::asset('/public/images/dgees.jpg') }}" />
         </div>
      </div>
   </div>
   <div>
</section>
@include('homefooter')
@include('homescripts')