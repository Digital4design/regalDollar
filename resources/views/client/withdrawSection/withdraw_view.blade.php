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
  <div class="col-lg-12">
    <div class="card">
          <div class="card-body">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-6">
            <div class="text-center faq-title pt-4 pb-4">
              <div class="pt-3 pb-3">
                <i class="ti-reload text-primary h3"></i>
              </div>
              <h5>Withdraw Dividends or Initial Investment</h5>
              <p class="text-muted">This page will allow you to withdraw any accumulated dividends or your full initial investment, if your investment period has ended.</p>
            </div>
          </div>
        </div>
        @php
			$date=date_create(date('Y-m-d'));
			$mData=  date_format($date,"M d,Y");
		@endphp
        <!-- end row -->
        <div class="row">
          <form method="post" class="withdrow_set" action="{{ url('client/withdraw-management/withdrowRequest') }}">
          {{ csrf_field() }}
         <?php // dd($investmentData['amount']);?>
          <div class="col-xl-6">
            <div class="card">
              <div class="card-body">
                <h4 class="mt-0 mb-5" style="border-bottom:1px solid #ddd;">Withdraw Dividends</h4>
                <div class="row">
                  <div class="col-sm-12">
                    <p></p><h1 style="text-align: center;">
                      @if($investmentData)
                       ${{ $investmentData['amount']}}
                       @else
                          No Data
                       @endif
                       </h1><p></p>
                    <p class="card-subtitle">
                      *Dividends cumulative through <span>{{ $mData }}</span>.
                    </p>
                    @if($investmentData)
                    <input type="hidden" name="investId" value="{{ $investmentData['id']}}">
                    @else
                       @endif
                    <p>
                    <select class="form-control" style="margin:10px;" name="linkAccount" required="required">
                        <option value="">Select an account...</option>
                        @foreach($bankData as $invest)
                        <option value="{{ $invest['id'] }}">Checking account ending in {{ $invest['account_number'] }}</option>
                        @endforeach
                      </select>
                      <button type="submit" class="btn btn-primary" @if($investmentData) @else disabled @endif>Transfer to Linked Account</button>
                      <a href="{{ url('/client/bank-account-management') }}" class="btn btn-secondary">Add Bank Account...</a>
                    </p>
                  </div>
                </div>
                <!-- end row -->
              </div>
            </div>
            <!-- end card -->
          </div>
          <div class="col-xl-6">
            <div class="card">
              <div class="card-body" style="min-height:25em;">
                <h4 class="mt-0 mb-5" style="border-bottom:1px solid #ddd;">Withdraw Initial Investment</h4>
                <div class="row">
                  <div class="col-sm-12">
                    <p></p>
                   
                   
                    <div class="alert alert-info">
                    @if($upcumingInvestData)
                    You are not able to withdraw your initial investment at this time. Your investment of 
                    <span style="font-weight:bold;">${{ $upcumingInvestData['amount']}}</span> 
                    will mature and be available to withdraw on 
                    <span style="font-weight:bold;">
                    @php
						$date=date_create($upcumingInvestData['plan_end_date']);
						$mData=  date_format($date,"M d, Y");
                    @endphp
                    {{ $mData}}</span>.
                    @else
                    <span style="font-weight:bold;"> No Data </span> 
                    @endif
                    </div>
                    
                    <p></p>
                  </div>
                </div>
                <!-- end row -->
              </div>
            </div>
          </div>
          </form>
        </div>
        <!-- end row -->
      </div>
    </div>
  </div>
</div>
<!-- end row -->
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $( "#country" ).change(function() {
    $('#states').html('');
    var countyid =  this.value;
    if(countyid !==''){
      $.ajax({
        type:"POST",
        dataType: 'json',
        data:{country_id:countyid,_token:"{{csrf_token()}}"},
        url:"{{url('admin/states')}}",
        success: function(success){
          console.log(success);
          if(success.data.length > 0){
            $.each( success.data, function( index, value ){
              optionText = value.name;
              optionValue = value.id;
              $('#states').append(`<option value="${optionValue}">${optionText}</option>`);
            });
          }
        }
      });
    }
  });
  $( "#states" ).change(function() {
    $('#cities').html('');
    var id =  this.value;
    if(id !==''){
      $.ajax({
        type:"POST",
        dataType: 'json',
        data:{id:id,_token:"{{csrf_token()}}"},
        url:"{{url('admin/cities')}}",
        success: function(success){
          console.log(success);
          if(success.data.length > 0){
            $.each( success.data, function( index, value ){
              optionText = value.name;
              optionValue = value.id;
              $('#cities').append('<option value="${optionValue}">${optionText}</option>');
            });
          }
        }
      });
    }
  });
</script>
@endsection