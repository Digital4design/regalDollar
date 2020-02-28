@section('css')
@endsection
@include('homeheader')
<div class="content">
<!--SERVICES SECTION START-->
<section class="thumb-with-text">

   <div class="inner_page_banner">
      <div class="overlay"></div>
         <div class="container">
            <div class="banner_content">
               <h2>Contact Us</h2>
               <p>We’re open for any suggestion or just to have a chat.</p>

               <i class="fa fa-angle-down" aria-hidden="true"></i>

            </div>
         </div>
      </div>
   </div>

   <div class="container">
         <div class="contact_section">
            <div class="left">

               <div class="overlay"></div>
               <img src="{{ URL::asset('public/assets/images/dark_bg.jpg') }}" />

               <div class="block">
                  <h2>Call us</h2>
                  <div class="icon">
                     <i class="fa fa-phone-square" aria-hidden="true"></i>
                  </div>
                  <div class="detail">
                     <span>+1 9999 888 22</span>
                     <span>+1 8888 999 22</span>
                  </div>
               </div>

               <div class="block">
                  <h2>Mail Us</h2>
                  <div class="icon">
                     <i class="fa fa-envelope" aria-hidden="true"></i>
                  </div>
                  <div class="detail">
                     <span>RegalDollar@gmail.com</span>
                     <span>RegalDollar@gmail.com</span>
                  </div>
               </div>

               <div class="block">
                  <h2>Address</h2>
                  <div class="icon">
                  <i class="fa fa-location-arrow" aria-hidden="true"></i> 
                  </div>
                  <div class="detail">
                        <span>#445 Mount Eden Road, Mount Eden, Auckland.</span>
                        <span>#21 Greens Road RD 2 Ruawai 0592.</span>                        
                  </div>
               </div>

            </div>
            <div class="right">
               <form>
                  <div class="form-group">
                     <label for="">Name</label>
                     <input type="text">
                  </div>
                  <div class="form-group">
                     <label for="">Email</label>
                     <input type="text">
                  </div>
                  <div class="form-group">
                     <label for="">Phone</label>
                     <input type="text">
                  </div>
                  <div class="form-group">
                     <label for="">Message</label>
                     <textarea name="" id="" ></textarea>
                  </div>

                  <a class="submit">Submit</a>

               </form>
            </div>
         </div>
   </div>
</section>
@include('homefooter')
@include('homescripts')