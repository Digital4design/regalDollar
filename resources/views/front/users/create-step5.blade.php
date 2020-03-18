@include('homeheader')

<!--CONTENT START-->
<div class="content form-steps">
   <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
         <a href="#step1" type="button" class="btn btn-primary btn-circle">1</a>
         <!-- <p>Step 1</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step2" type="button" class="btn btn-primary btn-circle">2</a>
         <!-- <p>Step 2</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step3" type="button" class="btn btn-primary btn-circle">3</a>
         <!-- <p>Step 3</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step4" type="button" class="btn btn-primary btn-circle">4</a>
        </div>
      <div class="stepwizard-step">
         <a href="#step5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
         <!-- <p>Step 5</p> -->
      </div>
      <div class="stepwizard-step">
         <a href="#step6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
         <!-- <p>Step 6</p> -->
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
         <h1>Agreements - Step 5</h1>
         <h3>Documents</h3>
         <form action="{{ url('front/update-docs') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
               <input 
               type="hidden" 
               value="{{$userData->id}}" 
               class="form-control" 
               id="user_id"  
               name="user_id"
               />
            </div>
            <div class="form-group">
               <p>The following documents are provided for your reference:</p>
            </div>
            <ul>
               @foreach($documentData as $document)
                  <li>{{ $document['documents_path'] }}</li>
               @endforeach
            </ul> 
            <h4>Acknowledgments</h4>
            <div class="form-group">
               <spam>Please indicate agreement with the following:</spam>
            </div>
            <div class="form-group">
               <label class="container">I have recieved each Offering Circular and Subscription Agreement,per my selected investment plan,and understand the risks associated with such offerings
                  <input type="checkbox" name="indicateagreement[]" value="1"  checked="checked">
                  <span class="checkmark"></span>
               </label>
               <label class="container">I represent that my investment(s) in the offering(s) does not constitute more than the greater 10% of my gross annual income or net worth, either individually or in the aggregate.
                  <input type="checkbox" name="indicateagreement[]" value="2">
                  <span class="checkmark"></span>
               </label>
               <label class="container">I understand that there is no guarantee of any financial return on this investment(s) and that I run the risk of loss in my investment(s) ; and that I have been provided tax advice by Fundrise.
                  <input type="checkbox" name="indicateagreement[]" value="3">
                  <span class="checkmark"></span>
               </label>
               <label class="container">I recognize that my invest is in real property, which is fundamentally a long-term,illiquid investment; that liquidations, if approved, are paid out quarterly for the EREITs,and monthly after a minimum 60-day waiting period for the eFunds; and requests for liquidation may be suspended during periods of finacial stress.
                  <input type="checkbox" name="indicateagreement[]" value="4">
                  <span class="checkmark"></span>
               </label>
               <label class="container">I cerify that the information provided is true and correct and understand it will be used in the W-9. I have reviewed and acknowledge the W-9.
                  <input type="checkbox" name="indicateagreement[]" value="5">
                  <span class="checkmark"></span>
               </label>
            </div>
            <div class="form-group">
               <input
                    type="text"
                    class="form-control"
                    name="signature"
                    id="signature"
                    placeholder="signature"
                    value="{{ old('signature',(isset($userData) && !empty($userData->name)) ? $userData->name : '' ) }}"
               />
            </div>
            <div class="form-group">
               <p>Divided Reinvestment</p>
            </div>
            <div class="form-group">
               <input type="radio" id="male" name="reinvestment" value="1">
               <label for="male">I would like my dividends reinvested accouring to the investment plan I have selected</label><br>
               <input type="radio" id="female" name="reinvestment" value="2">
               <label for="female">I would like my dividends distributed to my bank account.</label><br>
            </div>
            <a href="#"  class="btn btn-primary">Back</a>
            <button type="submit" class="btn btn-primary"> Next </button>
         </form>
      </div>
   </section>
</div>
<!--BUY TEMPLATE SECTION END-->
@include('homefooter')
@include('homescripts')