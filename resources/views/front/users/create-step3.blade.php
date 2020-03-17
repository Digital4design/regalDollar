@include('homeheader')
<!--CONTENT START-->
<div class="content form-steps">
   <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
         <a href="{{ url('front/create-details') }}" type="button" class="btn btn-primary btn-circle">1</a>
         <!-- <p>Step 1</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="{{ url('front/create-step2') }}" type="button" class="btn btn-primary btn-circle">2</a>
         <!-- <p>Step 2</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step3" type="button" class="btn btn-primary btn-circle">3</a>
         <!-- <p>Step 3</p> -->
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
               name="address">
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
                  <!-- <option label="Alaska" value="Alaska" {{ ( $userData->country == "Alaska" ) ? 'selected' : '' }}>Alaska</option>
                  <option label="Arizona" value="Arizona" {{ ( $userData->country == "Arizona" ) ? 'selected' : '' }} >Arizona</option>
                  <option label="Arkansas" value="Arkansas" {{ ( $userData->country == "Arkansas" ) ? 'selected' : '' }}>Arkansas</option>
                  <option label="California" value="California" {{ ( $userData->country == "California" ) ? 'selected' : '' }}>California</option>
                  <option label="Colorado" value="Colorado" {{ ( $userData->country == "Colorado" ) ? 'selected' : '' }}>Colorado</option>
                  <option label="Connecticut" value="Connecticut" {{ ( $userData->country == "Connecticut" ) ? 'selected' : '' }}>Connecticut</option>
                  <option label="Delaware" value="Delaware" {{ ( $userData->country == "Delaware" ) ? 'selected' : '' }}>Delaware</option>
                  <option label="District of Columbia" value="District of Columbia" {{ ( $userData->country == "District of Columbia" ) ? 'selected' : '' }}>District of Columbia</option>
                  <option label="Florida" value="Florida" {{ ( $userData->country == "Florida" ) ? 'selected' : '' }}>Florida</option>
                  <option label="Georgia" value="Georgia" {{ ( $userData->country == "Georgia" ) ? 'selected' : '' }}>Georgia</option>
                  <option label="Hawaii" value="Hawaii" {{ ( $userData->country == "Hawaii" ) ? 'selected' : '' }}>Hawaii</option>
                  <option label="Idaho" value="Idaho">Idaho</option>
                  <option label="Illinois" value="Illinois">Illinois</option>
                  <option label="Indiana" value="Indiana">Indiana</option>
                  <option label="Iowa" value="Iowa">Iowa</option>
                  <option label="Kansas" value="Kansas">Kansas</option>
                  <option label="Kentucky" value="Kentucky">Kentucky</option>
                  <option label="Louisiana" value="Louisiana">Louisiana</option>
                  <option label="Maine" value="Maine">Maine</option>
                  <option label="Maryland" value="Maryland">Maryland</option>
                  <option label="Massachusetts" value="Massachusetts">Massachusetts</option>
                  <option label="Michigan" value="Michigan">Michigan</option>
                  <option label="Minnesota" value="Minnesota">Minnesota</option>
                  <option label="Mississippi" value="Mississippi">Mississippi</option>
                  <option label="Missouri" value="Missouri">Missouri</option>
                  <option label="Montana" value="Montana">Montana</option>
                  <option label="Nebraska" value="Nebraska">Nebraska</option>
                  <option label="Nevada" value="Nevada">Nevada</option>
                  <option label="New Hampshire" value="New Hampshire">New Hampshire</option>
                  <option label="New Jersey" value="New Jersey">New Jersey</option>
                  <option label="New Mexico" value="New Mexico">New Mexico</option>
                  <option label="New York" value="New York">New York</option>
                  <option label="North Carolina" value="North Carolina">North Carolina</option>
                  <option label="North Dakota" value="North Dakota">North Dakota</option>
                  <option label="Ohio" value="Ohio">Ohio</option>
                  <option label="Oklahoma" value="Oklahoma">Oklahoma</option>
                  <option label="Oregon" value="Oregon">Oregon</option>
                  <option label="Pennsylvania" value="Pennsylvania">Pennsylvania</option>
                  <option label="Rhode Island" value="Rhode Island">Rhode Island</option>
                  <option label="South Carolina" value="South Carolina">South Carolina</option>
                  <option label="South Dakota" value="South Dakota">South Dakota</option>
                  <option label="Tennessee" value="Tennessee">Tennessee</option>
                  <option label="Texas" value="Texas">Texas</option>
                  <option label="Utah" value="Utah">Utah</option>
                  <option label="Vermont" value="Vermont">Vermont</option>
                  <option label="Virginia" value="Virginia">Virginia</option>
                  <option label="Washington" value="Washington">Washington</option>
                  <option label="West Virginia" value="West Virginia">West Virginia</option>
                  <option label="Wisconsin" value="Wisconsin">Wisconsin</option>
                  <option label="Wyoming" value="Wyoming">Wyoming</option>
                  <option label="Armed Forces - Americas (AA)" value="Armed Forces - Americas (AA)">Armed Forces - Americas (AA)</option>
                  <option label="Armed Forces - Europe (AE)" value="Armed Forces - Europe (AE)">Armed Forces - Europe (AE)</option>
                  <option label="Armed Forces - Pacific (AP)" value="Armed Forces - Pacific (AP)">Armed Forces - Pacific (AP)</option> -->
               </select>
            </div>
            <div class="form-group">
               <label for="title">ZIP Code</label>
               <input 
               type="text" 
               value="{{ old('zipcode',(isset($userData) && !empty($userData->zipcode)) ? $userData->zipcode : '' ) }}"
               class="form-control" 
               id="zipcode"  
               name="zipcode">
            </div>
            <div class="form-group">
               <label for="description">Phone Number</label>
               <input 
               type="text"  
               value="{{ old('phoneNumber',(isset($userData) && !empty($userData->phoneNumber)) ? $userData->phoneNumber : '' ) }}"
               class="form-control"  
               id="phoneNumber" 
               name="phoneNumber" 
               placeholder="(___) ___-____"
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
               placeholder="___-__-____"
               />
            </div>
            <div class="form-group">
               <label for="description">Date of Birth</label><br/>
               <input 
               type="text"  
               value="{{ old('birthday',(isset($userData) && !empty($userData->birthday)) ? $userData->birthday : '' ) }}"
               class="form-control"  
               id="birthday" 
               name="birthday" 
               placeholder="___-__-____"
               />
            </div>
            <button type="submit" class="btn btn-primary"> Next </button>
         </form>
      </div>
   </section>
</div>
<!--BUY TEMPLATE SECTION END-->
</div>
<br>
<br><br><br><br><br>
@include('homefooter')
@include('homescripts')