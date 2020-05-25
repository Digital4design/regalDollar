@extends('client.master')
@section('css')
<!--Chartist Chart CSS -->
<link rel="stylesheet" href="{{ URL::asset('plugins/chartist/css/chartist.min.css') }}">
@endsection
@section('breadcrumb')
<div class="col-sm-6">
   <h4 class="page-title">{{ (!empty($pageName))? $pageName :'Page Name'  }}</h4>
   <ol class="breadcrumb">
      <li class="breadcrumb-item active">Welcome back, {{ Auth::user()->name }} !</li>
   </ol>
</div>
@endsection
@section('content')
@php
$date=date_create(date('Y-m-d'));
$curentData=  date_format($date,"M d,Y");
@endphp

<div class="row">
   <div class="col-xl-9">
      <div class="card">
         <div class="card-body">
            <h4 class="mt-0 header-title mb-5">Monthly Earnings</h4>
            <div class="row">
               <div class="col-lg-7">
                  <div>
                     <div id="chart_div" class="ct-chart earning ct-golden-section"></div>
                     <!-- <div id="chartContainer" class="ct-chart earning ct-golden-section"></div> -->
                     <!-- <div id="chart-with-area" class="ct-chart earning ct-golden-section"></div> -->
                  </div>
               </div>
              
               <div class="col-lg-5">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="text-center">
                           <p class="text-muted mb-4">Projected Earnings: <span>{{ date('M')}}</span></p>
                           <h4>${{ $totalgain }}</h4>
                           <p class="text-muted mb-5">You will receive a dividend on {{ $curentData }}.</p>
                           <hr />
                           <p class="text-muted mb-3">Your total earnings to date are: 
                           <h4>${{ $totalgain }}</h4>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end row -->
         </div>
      </div>
      <!-- end card -->
   </div>
   @php
   $date=date_create($matureDate);
   $mData=  date_format($date,"M d,Y");
   @endphp
   <div class="col-xl-3">
      <div class="card">
      <div class="card-body">
            <div class="py-4" style="text-align: center;">
               @if($activeInvest['paypal_transaction_id'] !='')
               <i class="ion ion-ios-checkmark-circle-outline display-4 text-success"></i>
               @else
               <i class="ion ion-ios-checkmark-circle-outline display-4"></i>
               @endif
               <h5 class="text-primary mt-4">{{ $activePlan['time_investment'] }} Month Plan</h5>
               <p class="text-muted">You are currently enrolled in the {{ $activePlan['time_investment'] }} month investment plan with a <span>${{ $investAmount }}</span> fund.</p>
               <hr />
               <p class="text-muted mb-5">Your investment account will mature on <u>{{ $mData }}</u>.</p>
               <div class="mt-4">
                  <a href="" class="btn btn-secondary btn-sm">Contact Us</a> <a href="" class="btn btn-primary btn-sm">Invest More</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end row -->
<div class="row">
   <div class="col-xl-12">
      <div class="card">
         <div class="card-body">
            <h4 class="mt-0 header-title mb-4">Transaction History Snapshot (Nov '19 - Jan '20)</h4>
            <div class="table-responsive">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th scope="col">(#) Id</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col" colspan="2">Status</th>
                     </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; ?>
                  @forelse($investData as $invest)
                     <tr>    
                     <?php // dd($invest->plan_name); ?>                   
                        
                        <th scope="row">#{{ $i }}</th>
                        <td>
                           <div>
                              Added Money to Investment {{ $invest->plan_name }}  <i class="fa fa-arrow-alt-circle-right"></i>
                           </div>
                        </td>
                        <td>{{ $invest->created_at }}</td>
                        <td>${{ $invest->amount }}</td>
                        <td><span class="badge badge-success">Delivered</span></td>                       
                     </tr>
                     <?php $i++; ?>
                     @empty
                     <tr>
                        <th></th>
                        <td></td>
                        <td>No data found </td>
                        <td></td>
                        <td></td>
                     </tr>
                     @endforelse
                     
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<?php 
// dd($graphData);
// foreach($graphData as $graph){
//    dd($graph);
//  }
//  dd($graphData);
?>
<!-- end row -->
@endsection
@section('script')
<!--Chartist Chart-->
<script src="{{ URL::asset('plugins/chartist/js/chartist.min.js') }}"></script>
<script src="{{ URL::asset('plugins/chartist/js/chartist-plugin-tooltip.min.js') }}"></script>
<!-- peity JS -->
<script src="{{ URL::asset('plugins/peity-chart/jquery.peity.min.js') }}"></script>
<script src="{{ URL::asset('assets/pages/dashboard.js') }}"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
         ['Month', 'Plan1', 'Plan2', 'Plan3'],
         ['1',  1000,2000,5000],
          ['2',  1170,2100,5160],
          ['3',  1200,2120,5800],
          ['4',  1330,2240,6000],
         ]);

        var options = {
          title: 'Investment Grouth',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>
@endsection
