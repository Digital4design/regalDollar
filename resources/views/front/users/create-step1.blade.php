@include('homeheader')
<?php // dd($userData->country_citizenship); ?>
<div class="content form-steps">
   <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
         <a href="#step1" type="button" class="btn btn-primary btn-circle">1</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
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
         <!-- <p>Step 7</p> -->
      </div>
   </div>
</div>

<div>
   <section class="white-bg">
      <div class="container">
         <div class="form_outter_section">
         <!--HEADER SECTION START-->
         <?php // dd($userData);?>
         <h2 class="title">Let's get started.</h2>
         <h3 class="subtitle">To incest, please create an account.</h3>
         <form action="{{ url('front/create-step1') }}" method="post">
            {{ csrf_field() }}
            <input id="plan_id" type="hidden" class="form-control" name="plan_id" value="{{ $planData->id }}"/>
            <input id="plan_id" type="hidden" class="form-control" name="plan_id" value="{{ $planData->id }}"/>
            <input id="plan_start_date" type="hidden" class="form-control" name="plan_start_date" value="{{ $planData->plan_valid_from }}" />
            <input id="plan_end_date" type="hidden" class="form-control" name="plan_end_date" value="{{ $valid_till }}" />
            <input id="user_id" type="hidden" name="user_id" value="{{ old('user_id',(isset($userData) && !empty($userData->id)) ? $userData->id : '' ) }}" />

            <div class="form-group first_name">
            <label for="title">First Name</label>
               <input
                  id="first_name"
                  type="text"
                  class="form-control"
                  name="first_name"
                  value="{{ old('first_name',(isset($userData) && !empty($userData->first_name)) ? $userData->first_name : '' ) }}"
               />
               @if ($errors->has('first_name'))
               <span style="display:initial;" class="invalid-feedback" role="alert">
               <strong>{{ $errors->first('first_name') }}</strong>
               </span>
               @endif
            </div>
            <div class="form-group last_name">
               <label for="description">Last Name</label>
               <input
                  id="last_name"
                  type="text"
                  class="form-control"
                  name="last_name"
                  value="{{ old('last_name',(isset($userData) && !empty($userData->last_name)) ? $userData->last_name : '' ) }}"
               />
               @if ($errors->has('last_name'))
               <span style="display:initial;" class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('last_name') }}</strong>
               </span>
               @endif
            </div>
            <div class="form-group">
               <label for="description">User Name</label>
               <input
                  id="name"
                  type="text"
                  class="form-control"
                  name="name"
                  value="{{ old('name',(isset($userData) && !empty($userData->name)) ? $userData->name : '' ) }}"
               />
               @if ($errors->has('name'))
               <span style="display:initial;" class="invalid-feedback" role="alert">
               <strong>{{ $errors->first('name') }}</strong>
               </span>
               @endif
            </div>
            <div class="form-group">
               <label for="description">Email</label>
               <input
                  id="email"
                  type="email"
                  class="form-control"
                  name="email"
                  value="{{ old('email',(isset($userData) && !empty($userData->email)) ? $userData->email : '' ) }}"
               />
               @if ($errors->has('email'))
               <span style="display:initial;" class="invalid-feedback" role="alert">
               <strong>{{ $errors->first('email') }}</strong>
               </span>
               @endif
            </div>
           <?php
            if(Auth::user()){

            }else{?>
            <div class="form-group">
               <label for="userpassword">Password</label>
               <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="Enter password"
                  value="{{ old('password',(isset($userData) && !empty($userData->password)) ? $userData->password : '' ) }}"
               />
               @if ($errors->has('password'))
               <span style="display:initial;" class="invalid-feedback" role="alert">
               <strong>{{ $errors->first('password') }}</strong>
               </span>
               @endif
            </div>
            <div class="form-group">
               <label for="userpassword">Confirm Password</label>
               <input
                  type="password"
                  class="form-control"
                  name="password_confirmation"
                  id="userpassword2"
                  placeholder="Enter password"
                  value="{{ old('password',(isset($userData) && !empty($userData->password)) ? $userData->password : '' ) }}"
               />
            </div>

            <?php } ?>
            
            <div class="form_group">
               <div class="term_field field">
                  <input type="checkbox">
                  <p>I have reviewed and agree to the <a href="#">Terms of Service</a> , <a href="#">Privacy Policy</a>.</p>
               </div>
            </div>
            <div class="break_section"></div>
            <h2 class="title">We currently only accept investment from US residents.</h2>
            <h3 class="subtitle">Please confirm the following:</h3>
            <div class="form_group">
               <div class="citizenship_field field">
                  <span class="label">Country of citizenship</span>
                     <select class="Country_citizenship" name="country_citizenship" required="required" >
                     @foreach($countryData as $country)
                        <option value="{{ $country['name']}}" >{{ $country['name']}}</option>
                     @endforeach
                     </select>
                     @if ($errors->has('country_citizenship'))
                     <span style="display:initial;" class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('country_citizenship') }}</strong>
                     </span>
                     @endif
               </div>
            </div>
            <div class="Residence_field field">
               <span class="label">Country of Residence</span>
               <select class="Country_Residence" name="country_residence" required="required" >
                   @foreach($countryData as $country)
                     <option value="{{ $country['name']}}" >{{ $country['name']}}</option>
                   @endforeach
               </select>
               @if ($errors->has('country_residence'))
                     <span style="display:initial;" class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('country_residence') }}</strong>
                     </span>
                     @endif
            </div>
            <a href="#"  class="btn btn-primary">Back</a>
            <button type="submit" class="btn btn-primary">Next</button>
         </form>
         </div>
      </div>
   </section>
</div>
<!--BUY TEMPLATE SECTION END-->
@include('homefooter')
@include('homescripts')