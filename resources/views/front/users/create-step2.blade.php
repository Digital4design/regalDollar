@include('homeheader')
<!--CONTENT START-->
<div class="content form-steps">
<div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
         <a href="#" type="button" class="btn btn-primary btn-circle">1</a>
         <!-- <p>Step 1</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="{{ url('front/create-step2') }}" type="button" class="btn btn-primary btn-circle">2</a>
         <!-- <p>Step 2</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
         <!-- <p>Step 3</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
         <!-- <p>Step 3</p> -->
      </div>
   </div>
</div>
<div>
   <section class="white-bg">
      <div class="container">
         <!--HEADER SECTION START-->
         <h1>Add New Details - Step 2</h1>
         <?php
// dd($userData->accountType);
?>
         <hr>
         <form action="{{ url('front/create-update') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
               <input type="hidden" value="{{$userData->id}}" class="form-control" id="user_id"  name="user_id">
            </div>
            <div class="form-group">
               <label for="description">Account Type</label>
               <select class="form-control" name="accountType">
                  <option value="" >Select Account Type</option>
                  <option value="individual" {{ ( $userData->accountType == "individual" ) ? 'selected' : '' }}>Individual</option>
                  <option value="company" {{ ( $userData->accountType == "company") ? 'selected' : '' }}>Company</option>
               </select>
            </div>
            <button type="submit" class="btn btn-primary">Next</button>
         </form>
      </div>
   </section>
</div>
</div>
@include('homefooter')
@include('homescripts')