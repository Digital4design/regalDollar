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
                     placeholder="(123) 456-7890" 
                     onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);"
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
                  class="form-control social_security_number"
                  id="social_security_number" 
                  name="social_security_number"
                  maxlength="14" 
                  aria-required="true" 
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
<script>


// main.js
<!-- This script is based on the javascript code of Roman Feldblum (web.developer@programmer.net) -->
<!-- Original script : http://javascript.internet.com/forms/format-phone-number.html -->
<!-- Original script is revised by Eralper Yilmaz (http://www.eralper.com) -->
<!-- Revised script : http://www.kodyaz.com -->

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
var clipboard = new Clipboard('.btn');

clipboard.on('success', function(e) {
    console.log(e);
});

clipboard.on('error', function(e) {
    console.log(e);
});



// $('#social_security_number').on('keydown keyup mousedown mouseup', function() {
//      var res = this.value, //grabs the value
//          len = res.length, //grabs the length
//          max = 9, //sets a max chars
//          stars = len>0?len>1?len>2?len>3?len>4?'XXX-XX-':'XXX-X':'XXX-':'XX':'X':'', //this provides the masking and formatting
//         result = stars+res.substring(5); //this is the result
//      $(this).attr('maxlength', max); //setting the max length
//     $(".number").val(result); //spits the value into the input
// });


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
</script>
<!--BUY TEMPLATE SECTION END-->
@include('homefooter')
@include('homescripts')