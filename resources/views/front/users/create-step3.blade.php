@include('homeheader')
<!--CONTENT START-->
<div class="content">
   <!--SERVICES SECTION START-->
   <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Step 2</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Step 3</p>
      </div>
    </div>
  </div>
   <div>
      <section class="white-bg">
         <div class="container">
            <!--HEADER SECTION START-->
            <h1>Contact Information - Step 3</h1>
            <?php // dd($userData); ?>
            <hr>
            <form action="{{ url('front/create-update') }}" method="post">
               {{ csrf_field() }}
               <div class="form-group">
                  <input type="hidden" value="{{$userData->id}}" class="form-control" id="user_id"  name="user_id">
               </div>
               <div class="form-group">
                  <label for="title">Address Line 1</label>
                  <input type="text" value="" class="form-control" id="addressLine1"  name="addressLine1">
               </div>
               <div class="form-group">
                  <label for="title">Address Line 2</label>
                  <input type="text" value="" class="form-control" id="addressLine2"  name="addressLine2">
               </div>
               <div class="form-group">
                  <label for="title">City</label>
                  <input type="text" value="" class="form-control" id="city"  name="city">
               </div>
               <div class="form-group">
                  <label for="description">State</label>
                  <select class="form-control" name="company">
                     <option label="Alabama" value="AL" ">Alabama</option>
                     <option label="Alaska" value="AK">Alaska</option>
                     <option label="Arizona" value="AZ">Arizona</option>
                     <option label="Arkansas" value="AR">Arkansas</option>
                     <option label="California" value="CA">California</option>
                     <option label="Colorado" value="CO">Colorado</option>
                     <option label="Connecticut" value="CT">Connecticut</option>
                     <option label="Delaware" value="DE">Delaware</option>
                     <option label="District of Columbia" value="DC">District of Columbia</option>
                     <option label="Florida" value="FL">Florida</option>
                     <option label="Georgia" value="GA">Georgia</option>
                     <option label="Hawaii" value="HI">Hawaii</option>
                     <option label="Idaho" value="ID">Idaho</option>
                     <option label="Illinois" value="IL">Illinois</option>
                     <option label="Indiana" value="IN">Indiana</option>
                     <option label="Iowa" value="IA">Iowa</option>
                     <option label="Kansas" value="KS">Kansas</option>
                     <option label="Kentucky" value="KY">Kentucky</option>
                     <option label="Louisiana" value="LA">Louisiana</option>
                     <option label="Maine" value="ME">Maine</option>
                     <option label="Maryland" value="MD">Maryland</option>
                     <option label="Massachusetts" value="MA">Massachusetts</option>
                     <option label="Michigan" value="MI">Michigan</option>
                     <option label="Minnesota" value="MN">Minnesota</option>
                     <option label="Mississippi" value="MS">Mississippi</option>
                     <option label="Missouri" value="MO">Missouri</option>
                     <option label="Montana" value="MT">Montana</option>
                     <option label="Nebraska" value="NE">Nebraska</option>
                     <option label="Nevada" value="NV">Nevada</option>
                     <option label="New Hampshire" value="NH">New Hampshire</option>
                     <option label="New Jersey" value="NJ">New Jersey</option>
                     <option label="New Mexico" value="NM">New Mexico</option>
                     <option label="New York" value="NY">New York</option>
                     <option label="North Carolina" value="NC">North Carolina</option>
                     <option label="North Dakota" value="ND">North Dakota</option>
                     <option label="Ohio" value="OH">Ohio</option>
                     <option label="Oklahoma" value="OK">Oklahoma</option>
                     <option label="Oregon" value="OR">Oregon</option>
                     <option label="Pennsylvania" value="PA">Pennsylvania</option>
                     <option label="Rhode Island" value="RI">Rhode Island</option>
                     <option label="South Carolina" value="SC">South Carolina</option>
                     <option label="South Dakota" value="SD">South Dakota</option>
                     <option label="Tennessee" value="TN">Tennessee</option>
                     <option label="Texas" value="TX">Texas</option>
                     <option label="Utah" value="UT">Utah</option>
                     <option label="Vermont" value="VT">Vermont</option>
                     <option label="Virginia" value="VA">Virginia</option>
                     <option label="Washington" value="WA">Washington</option>
                     <option label="West Virginia" value="WV">West Virginia</option>
                     <option label="Wisconsin" value="WI">Wisconsin</option>
                     <option label="Wyoming" value="WY">Wyoming</option>
                     <option label="Armed Forces - Americas (AA)" value="AA">Armed Forces - Americas (AA)</option>
                     <option label="Armed Forces - Europe (AE)" value="AE">Armed Forces - Europe (AE)</option>
                     <option label="Armed Forces - Pacific (AP)" value="AP">Armed Forces - Pacific (AP)</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="title">ZIP Code</label>
                  <input type="text" value="" class="form-control" id="taskTitle"  name="name">
               </div>
               <div class="form-group">
                  <label for="description">Phone Number</label>
                  <input type="text"  value="" class="form-control"  id="phoneNumber" name="phoneNumber" placeholder="(___) ___-____"/>
               </div>
               <div class="form-group">
                  <h3>Tax Reporting Information</h3>
               </div>
               <div class="form-group">
                  <p>This information is required by the IRS for tax reporting purposes.</p>
               </div>
               <div class="form-group">
                  <label for="description">Social Security Number</label>
                  <input type="text"  value="" class="form-control"  id="SSN" name="SSN" placeholder="___-__-____"/>
               </div>
               <div class="form-group">
                  <label for="description">Date of Birth</label><br/>
                  <input type="text"  value="" class="form-control"  id="SSN" name="SSN" placeholder="___-__-____"/>
               </div>
               <button type="submit" class="btn btn-primary">Next</button>
            </form>
         </div>
      </section>
   </div>
   <!--BUY TEMPLATE SECTION END-->
</div>
@include('homefooter')
@include('homescripts')