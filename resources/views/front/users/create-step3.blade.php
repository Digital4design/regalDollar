@include('homeheader')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--CONTENT START-->
<?php // dd($userData['stateData']);?>
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
      <!-- <div class="stepwizard-step">
         <a href="#step7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
      </div> -->
   </div>
</div>
<div>
@if(Session::get('status') == "success")
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ Session::get('message') }}
      <a href="#" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </a>
    </div>
@elseif(Session::get('status') == "error")
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ Session::get('message') }}
      <a href="#" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </a>
    </div>
    @endif
   <section class="white-bg">
      <div class="container">
         <div class="form_outter_section">
            <h2 class="title">Thanks, {{ Auth::user()->name}}</h2>
            <h3 class="subtitle">We just need a few more details.</h3>
            <hr>
            <form action="{{ url('investment/update-address') }}" id="registrationform" name="registration" method="post">
              {{ csrf_field() }}
              <input type="hidden" value="{{$userData['id']}}" class="form-control" id="user_id" name="user_id" />
              <input type="hidden" value="{{$planData['id']}}" class="form-control" id="plan_id" name="plan_id" />
              <input type="hidden" value="{{$investmentData['id']}}" class="form-control" id="investmentId"  name="investmentId">
              <div class="form-group">
                <label for="title">Address Line 1</label>
                <input
                value="{{ old('address',(isset($userData) && !empty($userData->address)) ? $userData->address : '' ) }}" 
                class="form-control"
                id="address"
                name="address"
                required="required" 
                />
                @if ($errors->has('address'))
                <span style="display:initial;" class="invalid-feedback" role="alert">
                  <strong class="error">{{ $errors->first('address') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group">
                <label for="title">Address Line 2</label>
                <input
                  value="{{ old('address2',(isset($userData) && !empty($userData->address2)) ? $userData->address2 : '' ) }}"
                  class="form-control"
                  id="address2"
                  name="address2"
                  required="required" 
                  />
                  @if ($errors->has('address2'))
                  <span style="display:initial;" class="invalid-feedback" role="alert">
                    <strong class="error">{{ $errors->first('address2') }}</strong>
                  </span>
                  @endif
               </div>
               <div class="form-group">
                <label for="title">City</label>
                <input
                  value="{{ old('city',(isset($userData) && !empty($userData->city)) ? $userData->city : '') }}"
                  class="form-control"
                  id="city"
                  name="city"
                  required="required"
                  />
                  @if ($errors->has('city'))
                  <span style="display:initial;" class="invalid-feedback" role="alert">
                    <strong class="error">{{ $errors->first('city') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="description">State</label>
                  <select class="form-control" name="state" required="required" >
                    <option value="" >Select State</option>
                    @foreach ($stateData as $key => $state)
                    <option  value="{{ $state['name'] }}" {{ ( $state['name'] == $userData['state'] ) ? 'selected' : '' }}>{{ $state['name'] }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('state'))
                  <span style="display:initial;" class="invalid-feedback" role="alert">
                    <strong class="error">{{ $errors->first('state') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="title">ZIP Code</label>
                  <input 
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
                      <strong class="error">{{ $errors->first('zipcode') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="description">Phone Number</label>
                  <input 
                    required="required"
                    class="form-control phone required_field valid"
                    maxlength="11" 
                    aria-required="true"
                    aria-invalid="false"
                    value="{{ old('phoneNumber',(isset($userData) && !empty($userData->phoneNumber)) ? $userData->phoneNumber : '' ) }}" 
                    id="phoneNumber"
                    name="phoneNumber"
                    placeholder="(123) 456-7890" 
                    onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);"
                    />
                    @if ($errors->has('phoneNumber'))
                    <span style="display:initial;" class="invalid-feedback" role="alert">
                      <strong class="error">{{ $errors->first('phoneNumber') }}</strong>
                    </span>
                    @endif
                  </div>
                  <div class="break_section"></div>
                  <h2 class="title">Tax Reporting Information</h2>
                  <h3 class="subtitle">This information is required by the IRS for tax reporting purposes.</h3>
                  <div class="form-group">
                    <label for="description">Social Security Number</label>
                    <input 
                    value="{{ old('social_security_number',(isset($userData) && !empty($userData->social_security_number)) ? $userData->social_security_number : '' ) }}" 
                    class="form-control social_security_number"
                    id="social_security_number_id" 
                    name="social_security_number"
                    maxlength="14"
                    aria-required="true" 
                    placeholder="Social Security Number"
                    required="required"
                    />
                    @if ($errors->has('social_security_number'))
                    <span style="display:initial;" class="invalid-feedback" role="alert">
                      <strong class="error">{{ $errors->first('social_security_number') }}</strong>
                    </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="description">Date of Birth</label><br/>
                    <input
                    value="{{ old('birthday',(isset($userData) && !empty($userData->birthday)) ? $userData->birthday : '' ) }}"
                    class="form-control"
                    id="birthday" 
                    name="birthday"
                    required="required" 
                    />
                    @if ($errors->has('birthday'))
                    <span style="display:initial;" class="invalid-feedback" role="alert">
                      <strong class="error">{{ $errors->first('birthday') }}</strong>
                    </span>
                    @endif
                  </div>
               <a href="{{ url('/investment/create-step2') }}"  class="btn btn-primary">Back</a>
               <button type="submit" class="btn btn-primary send_button"> Next </button>
            </form>
         </div>
      </div>
   </section>
</div>

<!--BUY TEMPLATE SECTION END-->
@include('homefooter')
@include('homescripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
       $('#social_security_number_id').keyup(function() {
         var val = this.value.replace(/\D/g, '');
         val = val.replace(/^(\d{3})/, '$1-');
         val = val.replace(/-(\d{2})/, '-$1-');
         val = val.replace(/(\d)-(\d{4}).*/, '$1-$2');
         this.value = val;
      });
});
// Selecting the form and defining validation method
$("#registrationform").validate({
     rules : {
        address : {
            required : true
        },
        address2 : {
            required : true
        },
        city : {
            required : true
        },
        state : {
            required : true
        },
        zipcode : {
            required : true
        },
        phoneNumber : {
            required : true
        },
        social_security_number : {
            required : true
        },
        state : {
            required : true
        },
        birthday:{
            required : true
        }
        },
        messages: {
            address: "Please enter address",
            address2:"Please enter address2",
            city:"Please enter city",
            state:"Please select state",
            zipcode:"Please enter zipcode",
            phoneNumber:"Please enter phone Number",
            social_security_number:"Please enter social security number",
            birthday:"Please enter birthday",
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
   

var zChar = new Array(' ', '(', ')', '-', '.');
var maxphonelength = 13;
var phonevalue1;
var phonevalue2;
var cursorposition;
function ParseForNumber1(object) {
    phonevalue1 = ParseChar(object.value, zChar);
}
function ParseForNumber2(object) {
    phonevalue2 = ParseChar(object.value, zChar);
}
function backspacerUP(object, e) {
    if (e) {
        e = e
    } else {
        e = window.event
    }
    if (e.which) {
        var keycode = e.which
    } else {
        var keycode = e.keyCode
    }
    ParseForNumber1(object)
    if (keycode >= 48) {
        ValidatePhone(object)
    }
}
function backspacerDOWN(object, e) {
    if (e) {
        e = e
    } else {
        e = window.event
    }
    if (e.which) {
        var keycode = e.which
    } else {
        var keycode = e.keyCode
    }
    ParseForNumber2(object)
}
function GetCursorPosition() {
    var t1 = phonevalue1;
    var t2 = phonevalue2;
    var bool = false
    for (i = 0; i < t1.length; i++) {
        if (t1.substring(i, 1) != t2.substring(i, 1)) {
            if (!bool) {
                cursorposition = i
                bool = true
            }
        }
    }
}
function ValidatePhone(object) {
    var p = phonevalue1
    p = p.replace(/[^\d]*/gi, "")
    if (p.length < 3) {
        object.value = p
    } else if (p.length == 3) {
        pp = p;
        d4 = p.indexOf('(')
        d5 = p.indexOf(')')
        if (d4 == -1) {
            pp = "(" + pp;
        }
        if (d5 == -1) {
            pp = pp + ")";
        }
        object.value = pp;
    } else if (p.length > 3 && p.length < 7) {
        p = "(" + p;
        l30 = p.length;
        p30 = p.substring(0, 4);
        p30 = p30 + ")"
        p31 = p.substring(4, l30);
        pp = p30 + p31;
        object.value = pp;
    } else if (p.length >= 7) {
        p = "(" + p;
        l30 = p.length;
        p30 = p.substring(0, 4);
        p30 = p30 + ")"
        p31 = p.substring(4, l30);
        pp = p30 + p31;
        l40 = pp.length;
        p40 = pp.substring(0, 8);
        p40 = p40 + "-"
        p41 = pp.substring(8, l40);
        ppp = p40 + p41;
        object.value = ppp.substring(0, maxphonelength);
    }
    GetCursorPosition()
    if (cursorposition >= 0) {
        if (cursorposition == 0) {
            cursorposition = 2
        } else if (cursorposition <= 2) {
            cursorposition = cursorposition + 1
        } else if (cursorposition <= 5) {
            cursorposition = cursorposition + 2
        } else if (cursorposition == 6) {
            cursorposition = cursorposition + 2
        } else if (cursorposition == 7) {
            cursorposition = cursorposition + 4
            e1 = object.value.indexOf(')')
            e2 = object.value.indexOf('-')
            if (e1 > -1 && e2 > -1) {
                if (e2 - e1 == 4) {
                    cursorposition = cursorposition - 1
                }
            }
        } else if (cursorposition < 11) {
            cursorposition = cursorposition + 3
        } else if (cursorposition == 11) {
            cursorposition = cursorposition + 1
        } else if (cursorposition >= 12) {
            cursorposition = cursorposition
        }
        var txtRange = object.createTextRange();
        txtRange.moveStart("character", cursorposition);
        txtRange.moveEnd("character", cursorposition - object.value.length);
        txtRange.select();
    }
}
function ParseChar(sStr, sChar) {
    if (sChar.length == null) {
        zChar = new Array(sChar);
    } else zChar = sChar;
    for (i = 0; i < zChar.length; i++) {
        sNewStr = "";
        var iStart = 0;
        var iEnd = sStr.indexOf(sChar[i]);
        while (iEnd != -1) {
            sNewStr += sStr.substring(iStart, iEnd);
            iStart = iEnd + 1;
            iEnd = sStr.indexOf(sChar[i], iStart);
        }
        sNewStr += sStr.substring(sStr.lastIndexOf(sChar[i]) + 1, sStr.length);
        sStr = sNewStr;
    }
    return sNewStr;
}
/*
let telEl = document.querySelector('#phoneNumber')
telEl.addEventListener('keyup', (e) => {
  let val = e.target.value;
  e.target.value = val
    .replace(/\D/g, '')
    .replace(/(\d{1,4})(\d{1,3})?(\d{1,3})?/g, function(txt, f, s, t) {
      if (t) {
        return `(${f}) ${s}-${t}`
      } else if (s) {
        return `(${f}) ${s}`
      } else if (f) {
        return `(${f})`
      }
    });
})
*/

$( function() {
          $( "#birthday" ).datepicker({
              dateFormat: 'yy-mm-dd',
              maxDate: '0'
        });
    });
</script>

