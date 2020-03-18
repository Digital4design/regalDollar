@include('homeheader')
<!--CONTENT START-->
<div class="content form-steps">
   <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
         <a href="#step1" type="button" class="btn btn-primary btn-circle">1</a>
         <!-- <p>Step 1</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step2" type="button" class="btn btn-primary btn-circle">2</a>
         <!-- <p>Step 2</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step3" type="button" class="btn btn-primary btn-circle">3</a>
         <!-- <p>Step 3</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
         <!-- <p>Step 4</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
         <!-- <p>Step 5</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
         <!-- <p>Step 6</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
         <!-- <p>Step 7</p> -->
      </div>
   </div>
</div>
<div>
   <section class="white-bg">
      <div class="container">
         <h1>Contact Information - Step 3</h1>
         <?php // dd($userData); ?>
         <hr>
         <form action="{{ url('front/update-info') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
               <input type="hidden" value="{{$userData->id}}" class="form-control" id="user_id"  name="user_id">
            </div>
            <div class="form-group">
               <label for="title">Address Line 1</label>
               <input
                  type="text"
                  value="{{ old('address',(isset($userData) && !empty($userData->address)) ? $userData->address : '' ) }}"
                  class="form-control"
                  id="address"
                  name="address"
               />
            </div>
            <div class="form-group">
               <label for="title">Address Line 2</label>
               <input 
                  type="text"
                  value="{{ old('address2',(isset($userData) && !empty($userData->address2)) ? $userData->address2 : '' ) }}"
                  class="form-control"
                  id="address2"
                  name="address2"
               >
            </div>
            <div class="form-group">
               <label for="title">City</label>
               <input 
                  type="text" 
                  value="{{ old('city',(isset($userData) && !empty($userData->city)) ? $userData->city : '' ) }}"
                  class="form-control" 
                  id="city"  
                  name="city"
               >
            </div>
            <div class="form-group">           
               <label for="description">State</label>
               <select class="form-control" name="country">
                  <option value="" >Select State</option>
                  @foreach ($stateData as $key => $state)
                  <option  value="{{ $state['id'] }}" >{{ $state['name'] }}</option>
                  @endforeach
               </select>
            </div>
            <div class="form-group">
               <label for="title">ZIP Code</label>
               <input 
                  type="text" 
                  value="{{ old('zipcode',(isset($userData) && !empty($userData->zipcode)) ? $userData->zipcode : '' ) }}"
                  class="form-control zipcode required_field valid"
                  maxlength="10" aria-required="true"  
                  id="zipcode"  
                  name="zipcode"
                  placeholder="Zip Code"
               />
            </div>
            <div class="form-group">
               <label for="description">Phone Number</label>
               <input
               type="text" 
               required="required" 
               class="form-control phone required_field valid" 
               maxlength="14" aria-required="true" 
               aria-invalid="false"
               value="{{ old('phoneNumber',(isset($userData) && !empty($userData->phoneNumber)) ? $userData->phoneNumber : '' ) }}"
               id="phoneNumber" 
               name="phoneNumber"
               placeholder="Phone Number"
               />
            </div>
            <div class="form-group">
               <h3>Tax Reporting Information</h3>
            </div>
            <div class="form-group">
               <p>This information is required by the IRS for tax reporting purposes.</p>
            </div>
            <div class="form-group">
               <label for="description">Social Security Number</label>
               <input 
               type="text"  
               value="{{ old('social_security_number',(isset($userData) && !empty($userData->social_security_number)) ? $userData->social_security_number : '' ) }}"
               class="form-control"  
               id="social_security_number" 
               name="social_security_number"
               maxlength="14" aria-required="true" 
               placeholder="Social Security Number"
               />
            </div>
            <div class="form-group">
               <label for="description">Date of Birth</label><br/>
               <input 
               type="date"  
               value="{{ old('birthday',(isset($userData) && !empty($userData->birthday)) ? $userData->birthday : '' ) }}"
               class="form-control"  
               id="birthday" 
               name="birthday" 
               placeholder="___-__-____"
               />
            </div>
            <a href="#"  class="btn btn-primary">Back</a>
            <button type="submit" class="btn btn-primary"> Next </button>
         </form>
      </div>
   </section>
</div>
<!--BUY TEMPLATE SECTION END-->
@include('homefooter')
@include('homescripts')