@include('homeheader')
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
    <!-- <div class="stepwizard-step">
      <a href="#step7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
    </div> -->
  </div>
</div>
<div>
  <section class="white-bg">
    <div class="container">
      <div class="form_outter_section">
        <!--HEADER SECTION START-->
        <h2 class="title">Let's get started @if (Auth::guest()) @else {{ $userData->name}} @endif.</h2>
        <h3 class="subtitle">@if (Auth::guest()) To incest, please create an account. @else Welcome {{ $userData->name}} for another invest @endif</h3>
        <form action="{{ url('front/create-step1') }}" id="registrationform" name="registration" method="post">
          {{ csrf_field() }}
          <input id="plan_id" type="hidden" class="form-control" name="plan_id" value="" />
          <input id="plan_id" type="hidden" class="form-control" name="plan_id" value="" />
          <input id="plan_start_date" type="hidden" class="form-control" name="plan_start_date" value="" />
          <input id="plan_end_date" type="hidden" class="form-control" name="plan_end_date" value="" />
          <input id="user_id" type="hidden" name="user_id" value="{{ old('user_id',(isset($userData) && !empty($userData->id)) ? $userData->id : '' ) }}" />
          <div class="form-group first_name">
            <label for="title">First Name</label>
            <input id="first_name" class="form-control" name="first_name" value="{{ old('first_name',(isset($userData) && !empty($userData->first_name)) ? $userData->first_name : '' ) }}" @if (Auth::guest()) required @else disabled @endif />
            @if ($errors->has('first_name'))
            <span style="display:initial;" class="invalid-feedback" role="alert">
              <strong class="error">{{ $errors->first('first_name') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group last_name">
            <label for="description">Last Name</label>
            <input id="last_name" class="form-control" name="last_name" value="{{ old('last_name',(isset($userData) && !empty($userData->last_name)) ? $userData->last_name : '' ) }}" @if (Auth::guest()) required @else disabled @endif />
            @if ($errors->has('last_name'))
            <span style="display:initial;" class="invalid-feedback" role="alert">
              <strong class="error">{{ $errors->first('last_name') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group">
            <label for="description">User Name</label>
            <input id="name" class="form-control" name="name" value="{{ old('name',(isset($userData) && !empty($userData->name)) ? $userData->name : '' ) }}" @if (Auth::guest()) required @else disabled @endif />
            @if ($errors->has('name'))
            <span style="display:initial;" class="invalid-feedback" role="alert">
              <strong class="error">{{ $errors->first('name') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group">
            <label for="description">Referral Code</label>
            <input id="ref_by" class="form-control" name="ref_by" value="{{ old('ref_by',(isset($userData) && !empty($userData->ref_by)) ? $userData->ref_by : '' ) }}" @if (Auth::guest()) required @else disabled @endif />
            @if ($errors->has('ref_by'))
            <span style="display:initial;" class="invalid-feedback" role="alert">
              <strong class="error">{{ $errors->first('ref_by') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group">
            <label for="description">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email',(isset($userData) && !empty($userData->email)) ? $userData->email : '' ) }}" @if (Auth::guest()) required @else disabled @endif />
            @if ($errors->has('email'))
            <span style="display:initial;" class="invalid-feedback" role="alert">
              <strong class="error">{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
          <?php
          if (Auth::user()) {
          } else {
          ?>
            <div class="form-group">
              <label for="userpassword">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="{{ old('password',(isset($userData) && !empty($userData->password)) ? $userData->password : '' ) }}" @if (Auth::guest()) @else disabled @endif />
              @if ($errors->has('password'))
              <span style="display:initial;" class="invalid-feedback" role="alert">
                <strong class="error">{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group">
              <label for="userpassword">Confirm Password</label>
              <input type="password" class="form-control" name="password_confirmation" id="userpassword2" placeholder="Enter password" value="{{ old('password',(isset($userData) && !empty($userData->password)) ? $userData->password : '' ) }}" />
            </div>
          <?php } ?>
          <div class="form_group">
            <div class="term_field field">
              <input type="checkbox" name="checkbox" @if (Auth::guest()) required @else disabled @endif>
              <p>I have reviewed and agree to the <a href="#">Terms of Service</a> ,
                <a href="#">Privacy Policy</a>.</p>
            </div>
          </div>
          <div class="break_section"></div>
          <h2 class="title">We currently only accept investment from US residents.</h2>
          <h3 class="subtitle">Please confirm the following:</h3>
          <div class="form_group">
            <div class="citizenship_field field">
              <span class="label">Country of citizenship</span>
              <select class="Country_citizenship" name="country_citizenship" @if (Auth::guest()) required="required" @else disabled @endif>
                <option value="">Please setect country citizenship</option>
                @foreach($countryData as $country)
                <option value="{{ $country['name']}}" @if(Auth::user()) {{ ( $country['name'] == $userData->country_citizenship ) ? 'selected' : '' }} @else @endif> {{ $country['name']}} </option>
                @endforeach
              </select>
              @if ($errors->has('country_citizenship'))
              <span style="display:initial;" class="invalid-feedback" role="alert">
                <strong class="error">{{ $errors->first('country_citizenship') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="Residence_field field">
            <span class="label">Country of Residence</span>
            <select class="Country_Residence" name="country_residence" @if (Auth::guest()) required="required" @else disabled @endif>
              <option value="">Please setect country residence</option>
              @foreach($countryData as $country)
              <option value="{{ $country['name']}}" @if(Auth::user()) {{ ( $country['name'] == $userData->country_residence ) ? 'selected' : '' }} @else @endif>{{ $country['name']}}</option>
              @endforeach
            </select>
            @if ($errors->has('country_residence'))
            <span style="display:initial;" class="invalid-feedback" role="alert">
              <strong class="error">{{ $errors->first('country_residence') }}</strong>
            </span>
            @endif
          </div>
          <a href="#" class="btn btn-primary">Back</a>
          <button type="submit" class="btn btn-primary">Next</button>
        </form>
      </div>
    </div>
  </section>
</div>
<!--BUY TEMPLATE SECTION END-->
@include('homefooter')
@include('homescripts')

<script type="text/javascript">
  $(document).ready(function() {
    // Selecting the form and defining validation method
    $("#registrationform").validate({
      // Passing the object with custom rules
      rules: {
        // login - is the name of an input in the form
        first_name: {
          required: true
        },
        password: {
          required: true
        },
        password_confirmation: {
          required: true
        },
        last_name: {
          required: true
        },
        checkbox: {
          required: true
        },
        name: {
          required: true
        },
        email: {
          required: true,
          email: true
        },
        country_citizenship: {
          required: true
        },
        country_residence: {
          required: true
        }
        // password : {
        //     required : true,
        //     // Setting minimum and maximum lengths of a password
        //     minlength : 5,
        //     maxlength : 8
        // }
      },
      // Setting error messages for the fields
      messages: {
        first_name: "Enter first name",
        last_name: "Enter last name",
        name: "Enter user name",
        country_citizenship: "Please select country citizenship",
        country_residence: "Please select country residence",
        checkbox: "Please check it",
        //   password: {
        //        required: "Enter your password",
        //        minlength: "Minimum password length is 5",
        //        maxlength: "Maximum password length is 8"
        //    },
        email: "Enter valid email"
      },
      // Setting submit handler for the form
      submitHandler: function(form) {
        form.submit();
      }
    });
  });
</script>