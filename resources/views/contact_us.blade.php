@section('css')
@endsection
@include('homeheader')
<div class="content">
    <!--SERVICES SECTION START-->
    <section class="thumb-with-text">
        <div class="inner_page_banner">
            <div class="overlay"></div>
            <div class="container">
                <div class="banner_content">
                    <h2>Contact Us</h2>
                    <p>We’re open for any suggestion or just to have a chat.</p>
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>
            </div>
        </div>
</div>
<?php // dd($contactUsDetail);?>
<div class="container">
    <div class="contact_section">
        <div class="left">

            <div class="overlay"></div>
            <img src="{{ URL::asset('public/assets/images/dark_bg.jpg') }}" />

            <div class="block">
                <h2>Call us</h2>
                <div class="icon">
                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                </div>
                <div class="detail">
                    <span>{{ $contactUsDetail[0]['contact_number']}}</span>
                    <!-- <span>+1 8888 999 22</span> -->
                </div>
            </div>
            <div class="block">
                <h2>Mail Us</h2>
                <div class="icon">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="detail">
                    <span>{{ $contactUsDetail[0]['contact_email']}}</span>
                    <!-- <span>RegalDollar@gmail.com</span> -->
                </div>
            </div>

            <div class="block">
                <h2>Address</h2>
                <div class="icon">
                    <i class="fa fa-location-arrow" aria-hidden="true"></i>
                </div>
                <div class="detail">
                    <span>{{ $contactUsDetail[0]['contact_address']}}</span>
                    <!-- <span>#21 Greens Road RD 2 Ruawai 0592.</span> -->
                </div>
            </div>

        </div>

        <div class="right">
            @if(Session::has('status'))
            <div class="alert alert-{{ Session::get('status') }} alert-box">
                <i class="ti-user"></i> {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            @endif
            <form method="post" action="{{ url('/contact') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group @error('name')">
                    <label for="">Name</label>
                    <input name="name" placeholder="Enter your Name" value="{{ old('name',(isset($userData) && !empty($userData->name)) ? $userData->name : '' ) }}">
                </div>
                @if ($errors->has('name'))
                <span style="display:initial;" class="invalid-feedback" role="alert">
                    <strong class="error">{{ $errors->first('name') }}</strong>
                </span>
                @endif
                <div class="form-group @error('email')">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Enter Your Email" value="{{ old('email',(isset($userData) && !empty($userData->email)) ? $userData->email : '' ) }}">
                </div>
                @if ($errors->has('email'))
                <span style="display:initial;" class="invalid-feedback" role="alert">
                    <strong class="error">{{ $errors->first('email') }}</strong>
                </span>
                @endif
                <div class="form-group @error('phone')">
                    <label for="">Phone</label>
                    <input name="phone" id="phoneNumber" placeholder="Enter your phone like (123) 456-7890" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);" maxlength="13" aria-required="true" aria-invalid="false" value="{{ old('phone',(isset($userData) && !empty($userData->phone)) ? $userData->phone : '' ) }}" />
                </div>
                @if ($errors->has('phone'))
                <span style="display:initial;" class="invalid-feedback" role="alert">
                    <strong class="error">{{ $errors->first('phone') }}</strong>
                </span>
                @endif
                <div class="form-group @error('message')">
                    <label for="">Message</label>
                    <textarea name="message" placeholder="Enter your message" id="message">{{ old('message',(isset($userData) && !empty($userData->message)) ? $userData->message : '' ) }}</textarea>
                </div>
                @if ($errors->has('message'))
                <span style="display:initial;" class="invalid-feedback" role="alert">
                    <strong class="error">{{ $errors->first('message') }}</strong>
                </span>
                @endif
                <button type="submit" class="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
</section>
@include('homefooter')
@include('homescripts')
<script>
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
</script>