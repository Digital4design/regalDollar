@include('homeheader')
<?php //dd($planData->plan_valid_from); ?>
<div class="content form-steps">
   <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
         <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
         <!-- <p>Step 1</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
         <!-- <p>Step 3</p> -->
      </div>
   </div>
</div>
<div>
   <section class="white-bg">
      <div class="container">
         <!--HEADER SECTION START-->
         <h1>Basic Info - Step 1</h1>
         <hr>
         <form action="{{ url('front/create-step1') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
            <input
               id="plan_id"
               type="hidden"
               class="form-control"
               name="plan_id"
               value="{{ $planData->id }}"
            />
            </div>
            <div class="form-group">
               <input
                  id="plan_id"
                  type="hidden"
                  class="form-control"
                  name="plan_id"
                  value="{{ $planData->id }}"
               />
            </div>

            <div class="form-group">
               <input
                  id="plan_start_date"
                  type="hidden"
                  class="form-control"
                  name="plan_start_date"
                  value="{{ $planData->plan_valid_from }}"
               />
            </div>

            <div class="form-group">
               <input
                  id="plan_end_date"
                  type="hidden"
                  class="form-control"
                  name="plan_end_date"
                  value="{{ $valid_till }}"
               />
            </div>

            <div class="form-group">
               <input
                  id="user_id"
                  type="hidden"
                  name="user_id"
                  value="{{ old('user_id',(isset($userData) && !empty($userData->id)) ? $userData->id : '' ) }}"
               />
            </div>
            <div class="form-group">
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
            <div class="form-group">
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
            <button type="submit" class="btn btn-primary">Next</button>
         </form>
      </div>
   </section>
</div>
<!--BUY TEMPLATE SECTION END-->
</div>
@include('homefooter')
@include('homescripts')