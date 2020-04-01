@include('homeheader')
<!--CONTENT START-->
<div class="content form-steps">
   <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
         <a href="#step1" type="button" class="btn btn-primary btn-circle">1</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step2" type="button" class="btn btn-primary btn-circle">2</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step3" type="button" class="btn btn-primary btn-circle">3</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
      </div>
   </div>
</div>
<div>
   <section class="white-bg">
      <div class="container">
         <div class="form_outter_section">
            <h2 class="title">Thanks, William!</h2>
            <h3 class="subtitle">We just need a few more details.</h3>
            <hr>
            <form action="{{ url('front/update-info') }}" method="post">
               {{ csrf_field() }}
               <input type="hidden" value="{{ $userData->id }}" class="form-control" id="user_id" name="user_id" />
               <input type="hidden" value="{{ $userData->plan_id }}" class="form-control" id="plan_id" name="plan_id" />
               <input type="hidden" value="{{ $userData['investmentId'] }}" class="form-control" id="investmentId"  name="investmentId">
               <div class="form-group">
                  <label for="title">Address Line 1</label>
                  <input 
                  type="text" 
                  value="{{ old('address',(isset($userData) && !empty($userData->address)) ? $userData->address : '' ) }}" 
                  class="form-control"
                  id="address"
                  name="address"
                  required="required" 
                  />
                  @if ($errors->has('address'))
                     <span style="display:initial;" class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('address') }}</strong>
                     </span>
                     @endif
               </div>
               <div class="form-group">
                  <label for="title">Address Line 2</label>
                  <input 
                  type="text"
                  value="{{ old('address2',(isset($userData) && !empty($userData->address2)) ? $userData->address2 : '' ) }}"
                  class="form-control"
                  id="address2"
                  name="address2"
                  required="required" 
                  />
                  @if ($errors->has('address2'))
                     <span style="display:initial;" class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('address2') }}</strong>
                     </span>
                     @endif
               </div>
               <div class="form-group">
                  <label for="title">City</label>
                  <input 
                  type="text"
                  value="{{ old('city',(isset($userData) && !empty($userData->city)) ? $userData->city : '' ) }}"
                  class="form-control"
                  id="city"
                  name="city"
                  required="required" 
                  />
                  @if ($errors->has('city'))
                     <span style="display:initial;" class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('city') }}</strong>
                     </span>
                     @endif
               </div>
               <div class="form-group">
                  <label for="description">State</label>
                  <select class="form-control" name="state" required="required" >
                     <option value="" >Select State</option>
                     @foreach ($stateData as $key => $state)
                        <option  value="{{ $state['name'] }}" >{{ $state['name'] }}</option>
                     @endforeach
                  </select>
                  @if ($errors->has('state'))
                     <span style="display:initial;" class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('state') }}</strong>
                     </span>
                     @endif
               </div>
               <div class="form-group">
                  <label for="title">ZIP Code</label>
                  <input 
                  type="text" 
                  value="{{ old('zipcode',(isset($userData) && !empty($userData->zipcode)) ? $userData->zipcode : '' ) }}" 
                  class="form-control zipcode required_field valid" 
                  maxlength="10" 
                  aria-required="true" 
                  id="zipcode" 
                  name="zipcode" 
                  placeholder="Zip Code"
                  required="required" 
                  />
                  @if ($errors->has('zipcode'))
                     <span style="display:initial;" class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('zipcode') }}</strong>
                     </span>
                     @endif
               </div>
               <div class="form-group">
                  <label for="description">Phone Number</label>
                  <input 
                  type="text" 
                  required="required" 
                  class="form-control phone required_field valid" 
                  maxlength="14" 
                  aria-required="true" 
                  aria-invalid="false" 
                  value="{{ old('phoneNumber',(isset($userData) && !empty($userData->phoneNumber)) ? $userData->phoneNumber : '' ) }}" 
                  id="phoneNumber"
                  name="phoneNumber"
                  placeholder="Phone Number"
                  />
                  @if ($errors->has('phoneNumber'))
                     <span style="display:initial;" class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('phoneNumber') }}</strong>
                     </span>
                     @endif
               </div>
               <div class="break_section"></div>
               <h2 class="title">Tax Reporting Information</h2>
               <h3 class="subtitle">This information is required by the IRS for tax reporting purposes.</h3>
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
                  required="required" 
                  />
                  @if ($errors->has('social_security_number'))
                     <span style="display:initial;" class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('social_security_number') }}</strong>
                     </span>
                     @endif
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
                  required="required" 
                  />
                  @if ($errors->has('birthday'))
                     <span style="display:initial;" class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('birthday') }}</strong>
                     </span>
                     @endif
               </div>
               <a href="#"  class="btn btn-primary">Back</a>
               <button type="submit" class="btn btn-primary"> Next </button>
            </form>
         </div>
      </div>
   </section>
</div>
<!--BUY TEMPLATE SECTION END-->
@include('homefooter')
@include('homescripts')