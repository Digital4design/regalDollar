@extends('client.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
   <h4 class="page-title">{{ $pageName }}</h4>
</div>
@endsection
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            
            <!-- end row -->
            <div class="form_outter_section"> 
            <!--HEADER SECTION START-->
            <h3 class="subtitle">Agreement</h3>
            <form action="{{ url('client/purchase-new-plan/update-aggrement-data') }}" method="post">
            {{ csrf_field() }}
               <input type="hidden" class="form-control" id="investmentId" name="investmentId" value="{{ $investmentId }}">
               <span class="section_title">Documents</span>
               <p>The following documents are provided for your reference:</p>
               <ul>
                                  </ul> 
                <span class="section_title">Acknowledgments</span> 
                <p>Please indicate agreement with the following:</p>
                <div class="break_section1"></div>
                <div class="form-group">
                  <input type="checkbox" name="indicateagreement[]" value="1" checked="checked">
                  <span class="checkmark"></span>
                  <label class="container">I have recieved each Offering Circular and Subscription Agreement,per my selected investment plan,and understand the risks associated with such offerings</label>
               </div>
               <div class="form-group">
                  <input type="checkbox" name="indicateagreement[]" required="required" value="2">
                  <span class="checkmark"></span>
                  <label class="container">I represent that my investment(s) in the offering(s) does not constitute more than the greater 10% of my gross annual income or net worth, either individually or in the aggregate.</label>
               </div>
               <div class="form-group">
                  <input type="checkbox" name="indicateagreement[]" required="required" value="3">
                  <span class="checkmark"></span>
                  <label class="container">I understand that there is no guarantee of any financial return on this investment(s) and that I run the risk of loss in my investment(s) ; and that I have been provided tax advice by Fundrise.</label>
               </div>
               <div class="form-group">
                  <input type="checkbox" name="indicateagreement[]" required="required" value="4">
                  <span class="checkmark"></span>
                  <label class="container">I recognize that my invest is in real property, which is fundamentally a long-term,illiquid investment; that liquidations, if approved, are paid out quarterly for the EREITs,and monthly after a minimum 60-day waiting period for the eFunds; and requests for liquidation may be suspended during periods of finacial stress.</label>
               </div>
               <div class="form-group">
                  <input type="checkbox" name="indicateagreement[]" required="required" value="5">
                  <span class="checkmark"></span>
                  <label class="container">I cerify that the information provided is true and correct and understand it will be used in the W-9. I have reviewed and acknowledge the W-9.</label>
               </div>
               <div class="break_section1"></div> 
               <span class="section_title">Divided Reinvestment</span>
               <div class="form-group">
                  <input type="radio" id="male" name="reinvestment" value="1" required="required">
                  <label class="container" for="male">I would like my dividends reinvested accouring to the investment plan I have selected</label>
               </div>
               <div class="form-group">
                  <input type="radio" id="female" name="reinvestment" value="2" required="required">
                  <label class="container" for="female">I would like my dividends distributed to my bank account.</label>
               </div>
               <a href="#" class="btn btn-primary">Back</a>
               <button type="submit" class="btn btn-primary"> Next </button>
            </form>
         </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  

</script>
@endsection