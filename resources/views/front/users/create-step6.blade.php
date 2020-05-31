@include('homeheader')

<!--CONTENT START-->
<?php // dd($investmentData); ?>
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
         <a href="#step4" type="button" class="btn btn-primary btn-circle">4</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step5" type="button" class="btn btn-primary btn-circle" >5</a>
      </div>
      <div class="stepwizard-step">
         <a href="#step6" type="button" class="btn btn-primary btn-circle">6</a>
      </div>
      <!-- <div class="stepwizard-step">
         <a href="#step7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
      </div> -->
   </div>
   <?php //dd($investmentData->created_at);?>
</div>
<div>
<section class="white-bg">
      <div class="container">
      <div class="form_outter_section">         
         <!--HEADER SECTION START-->
         <h2 class="title">You're almost done !</h2>
         <h3 class="subtitle">Please review your information:</h3> 
         <form action="{{ url('investment/create-step7') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" value="{{$userData->id}}" class="form-control" id="user_id" name="user_id"/>
          <input type="hidden" value="{{ $userData['plan_id'] }}" class="form-control" id="plan_id"  name="plan_id">
          <input type="hidden" value="{{ $userData['investmentId'] }}" class="form-control" id="investmentId"  name="investmentId">
          <span class="section_title editable"> {{ $userData['first_name'] }} Basic info</span>
          <div class='edit_requst'>
            <i class="fa fa-pencil-square-o open"   aria-hidden="true"></i>
          </div>
          <div class="form-group update_field">
            <span class="edit_field" >
              <input 
              name="first_name" 
              class="form-control edit_here" 
              contenteditable="true" 
              id="first_name"
              value="{{ $userData['first_name'] }}"
              disabled
              />
              <!-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->
            </span>
            <span class="edit_field" >
              <input
              name="address"
              class="form-control edit_here" 
              contenteditable="true" 
              id="address" 
              value="{{ $userData['address'] }}"
              disabled
              />
              <!-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->
            </span>
            <span class="edit_field" >
              <input
              name="city" 
              class="form-control edit_here" 
              id="city"
              value="{{ $userData['city'] }}" 
              disabled
              />
              <!-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->
            </span>
            <span class="edit_field" >
              <!-- <input
              name="state" 
              class="edit_here" 
              id="state" 
              value="{{ $userData['state'] }}" 
              > -->
              <select class="form-control edit_here" name="state"  id="state" disabled >
                <option value="" >Select State</option>
                @foreach ($stateData as $key => $state)
                <option  value="{{ $state['name'] }}" {{ ( $userData['state'] == $state['name']) ? 'selected' : '' }}>{{ $state['name'] }}</option>
                @endforeach
              </select>
              <!-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->
            </span>
            <!-- <span class="edit_field" contenteditable="true">
               <input  name="country_id" id="country_id" value="{{ $userData['country_id'] }}">
               <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span> -->
               <span class="edit_field" >
               <input  
               name="zipcode" 
               class="form-control edit_here" 
               id="zipcode" 
               maxlength="10"
               aria-required="true" 
               disabled
               value="{{ $userData['zipcode'] }}" 
               
               >
               <!-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->
            </span>
               <span class="edit_field" >
               <input  
               name="phoneNumber" 
               class="form-control edit_here" 
               id="phoneNumber" 
               value="{{ $userData['phoneNumber'] }}" 
               disabled
               onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);"
               >
               <!-- <i class="fa fa-pencil-square-o"  aria-hidden="true"></i> -->
            </span>
          </div>
            <div class="break_section"></div>
            <span class="section_title">Investment Information</span>
            <div class="form-group">
               <span class="edit_field">
                  <span class="title" contenteditable="true">Investment plan</span>
                  <span class="result">{{ $planData['plan_name'] }}</span>
                  <!-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->
               </span> 
               <span class="edit_field">
                  <span contenteditable="true" class="title">Initial Amount</span>
                  <span class="result">${{ $investmentData['amount'] }}</span>
                  <!-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->
               </span>            
               <!--
                <span class="edit_field">
                  <span contenteditable="true" class="title">Time plans end</span>
                  <span class="result">22-Mar-2020</span>
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span>
               -->
               <!--
                <span class="edit_field">
                  <span contenteditable="true" class="title">Payment method</span>
                  <span class="result">Bank of america 5544</span>
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </span> 
               -->
            </div>
            <div class="break_section"></div>
            <span class="section_title">Agreements</span> 
            <div class="form-group">
            @php
            $date=date_create($investmentData->created_at);
            $curentData=  date_format($date,"M d,Y")
            @endphp
               <p class="sign_on">Signed on {{ $curentData }}</p>
               <a class="income_file">Income eREITV, East Coast eREIT, and West Coast eREIT</a>
            </div>
            <?php // dd($userData['investmentData']['paypal_transaction_id']);?>
            <a href="{{ url('/investment/create-step5') }}"  class="btn btn-primary" @if($userData['investmentData']['paypal_transaction_id']!='')  @else disabled="disabled" @endif>Back</a>
            <button type="submit" class="btn btn-primary"> Submit </button>
         </form>
      </div>
   </div>
</section>
</div>

<!--BUY TEMPLATE SECTION END-->
@include('homefooter')
@include('homescripts')
<script>
  $(document).ready(function() {
    /*$( ".fa-pencil-square-o" ).click(function() {
        var prev=$(this).prev();
        $('.edit_here').removeClass('active');
        
        prev.addClass('active');
        $(".edit_here").removeAttr("disabled");
        //prev.css("background-color", "yellow");
        //alert( "Handler for .click() called." );
   });*/
   
   $( ".fa-pencil-square-o" ).click(function() {
      if($( ".fa-pencil-square-o" ).hasClass( "open" )){
        var prev=$(this).prev();
        $('.edit_here').removeClass('active');
        prev.addClass('active');
        $(".edit_here").removeAttr("disabled");
        $('.fa-pencil-square-o').removeClass('open');
        $(".fa-pencil-square-o").addClass('closedDis');
      }else{
        $(".edit_here").attr("disabled",true);
        $('.fa-pencil-square-o').removeClass('closedDis');
        $(".fa-pencil-square-o").addClass('open');
      }
      return false;
    });


  //  $( ".white-bg" ).click(function() {
  //       $(".edit_here").attr("disabled","disabled");
  //       //$(".edit_here").removeAttr("disabled");
  //       //prev.css("background-color", "yellow");
  //       //alert( "Handler for .click() called." );
  //  });



    $("#first_name").keyup(function( event ) {
      var first_name = $('input:text[name=first_name]').val();
      event.preventDefault();
      $.ajax({
         'url': '{{ url("front/upadate-user-data") }}',
         'method': 'post',
         'dataType': 'json',
         'data':{first_name:first_name,_token:"{{csrf_token()}}",userid:"{{$userData->id}}"},
         success: function(data) {
            if (data.status == 'success') { 
               console.log(data);
               //location.href='{{ url("investment/create-step6") }}';
            }
            }
			});
      return false;
    });
    $("#address").keyup(function( event ) {
      var address = $('input:text[name=address]').val();
      event.preventDefault();
      $.ajax({
        'url': '{{ url("front/upadate-user-data") }}',
        'method': 'post',
        'dataType': 'json',
        'data':{address:address,_token:"{{csrf_token()}}",userid:"{{$userData->id}}"},
        success: function(data) {
          if (data.status == 'success') {
            console.log(data);
            //location.href='{{ url("investment/create-step6") }}';
          }
        }
      });
      return false;
		});
    $("#city").keyup(function( event ) {
      var city = $('input:text[name=city]').val();
      event.preventDefault();
      $.ajax({
        'url': '{{ url("front/upadate-user-data") }}',
        'method': 'post',
        'dataType': 'json',
        'data':{city:city,_token:"{{csrf_token()}}",userid:"{{$userData->id}}"},
        success: function(data) {
          if (data.status == 'success') {
            console.log(data);
            // location.href='{{ url("investment/create-step6") }}';
          }
        }
      });
      return false;
    });
    $("#state").change(function(event){
      var state = $(this).val();
      event.preventDefault();
      $.ajax({
        'url': '{{ url("front/upadate-user-data") }}',
        'method': 'post',
        'dataType': 'json',
        'data':{state:state,_token:"{{csrf_token()}}",userid:"{{$userData->id}}"},
        success: function(data) {
          if (data.status == 'success') {
            console.log(data);
            //location.href='{{ url("investment/create-step6") }}';
          }
        }
      });
      return false;
    });
    // $("#state").keyup(function( event ) {
    //    //var state = $('input:text[name=state]').val();
    //    var state = $('input:text[name=state]').val();
    //    event.preventDefault();
    //    $.ajax({
    //       'url': '{{ url("front/upadate-user-data") }}',
    //       'method': 'post',
    //       'dataType': 'json',
    //       'data':{state:state,_token:"{{csrf_token()}}",userid:"{{$userData->id}}"},
    //       success: function(data) {
    //          if (data.status == 'success') {
    //             console.log(data);
    //          //location.href='{{ url("investment/create-step6") }}';
    //             }
    //          }
    // 	});
    //    return false;
    // });
    $("#zipcode").keyup(function( event ) {
      var zipcode = $('input:text[name=zipcode]').val();
      event.preventDefault();
      $.ajax({
        'url': '{{ url("front/upadate-user-data") }}',
        'method': 'post',
        'dataType': 'json',
        'data':{zipcode:zipcode,_token:"{{csrf_token()}}",userid:"{{$userData->id}}"},
        success: function(data) {
          if (data.status == 'success') {
            console.log(data);
            // location.href='{{ url("investment/create-step6") }}';
          }
        }
      });
      return false;
		});
    $("#phoneNumber").keyup(function( event ) {
      var phoneNumber = $('input:text[name=phoneNumber]').val();
      event.preventDefault();
      $.ajax({
        'url': '{{ url("front/upadate-user-data") }}',
        'method': 'post',
        'dataType': 'json',
        'data':{phoneNumber:phoneNumber,_token:"{{csrf_token()}}",userid:"{{$userData->id}}"},
        success: function(data) {
          if (data.status == 'success') {
                  console.log(data);
               //location.href='{{ url("investment/create-step6") }}';
                  }
               }
			});
         return false;
		});

});

</script>

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