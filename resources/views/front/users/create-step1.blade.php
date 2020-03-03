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
      <h1>Basic Info - Step 1</h1>
      <hr>
      <form action="{{ url('front/create-step1') }}" method="post">
         {{ csrf_field() }}
         <div class="form-group">
            <label for="title">First Name</label>
            <input id="last_name" type="text"  class="form-control"   name="last_name">
            @if ($errors->has('last_name'))
            <span style="display:initial;" class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('last_name') }}</strong>
            </span>
            @endif
         </div>
         <div class="form-group">
            <label for="description">Last Name</label>
            <input id="last_name" type="text" class="form-control"  name="last_name"/>
            @if ($errors->has('last_name'))
            <span style="display:initial;" class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('last_name') }}</strong>
            </span>
            @endif
         </div>
         <div class="form-group">
            <label for="description">User Name</label>
            <input id="name" type="text" class="form-control"  name="name"/>
            @if ($errors->has('name'))
            <span style="display:initial;" class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
         </div>
         <div class="form-group">
            <label for="description">Email</label>
            <input id="email" type="email" class="form-control"  name="email"/>
            @if ($errors->has('email'))
            <span style="display:initial;" class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
         </div>
         <div class="form-group">
            <label for="userpassword">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            @if ($errors->has('password'))
            <span style="display:initial;" class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
         </div>
         <div class="form-group">
            <label for="userpassword">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="userpassword2" placeholder="Enter password">
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