@extends('admin.master')
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

<div class="row">
   <div class="col-xl-9">
      <div class="card">
         <div class="card-body">
            <h4 class="mt-0 header-title mb-5">Monthly Earnings</h4>
            <div class="row">
               <div class="col-lg-7">
                  <div>
                  <div id="chartContainer" class="ct-chart earning ct-golden-section"></div>
                     <!-- <div id="chart-with-area" class="ct-chart earning ct-golden-section"></div> -->
                  </div>
               </div>
               <div class="col-lg-5">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="text-center">
                           <p class="text-muted mb-4">Projected Earnings: <span>January</span></p>
                           <h4>${{$totalgain}}</h4>
                           <p class="text-muted mb-5">You will receive a dividend on January 11, 2020.</p>
                           <hr />
                           <p class="text-muted mb-3">Your total earnings to date are: 
                           <h4>${{$totalgain}}</h4>
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
   <div class="col-xl-3">
      <div class="card">
         <div class="card-body">
            <div class="py-4" style="text-align: center;">
               <i class="ion ion-ios-checkmark-circle-outline display-4 text-success"></i>
               <h5 class="text-primary mt-4">24 Month Plan</h5>
               <p class="text-muted">You are currently enrolled in the 24 month investment plan with a <span>$10,000</span> fund.</p>
               <hr />
               <p class="text-muted mb-5">Your investment account will mature on <u>November 12, 2022</u>.</p>
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
                        <th scope="row">#{{ $i }}</th>
                        <td>
                           <div>
                              <i class="fa fa-arrow-alt-circle-left"></i> Monthly Dividend (December)
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
                     <!-- <tr>
                        <th scope="row">#14256</th>
                        <td>
                           <div>
                              Added Money to Investment <i class="fa fa-arrow-alt-circle-right"></i>
                           </div>
                        </td>
                        <td>Nov 30, 2019</td>
                        <td>$10,000</td>
                        <td><span class="badge badge-warning">Pending</span></td>
                     </tr>
                     <tr>
                        <th scope="row">#14214</th>
                        <td>
                           <div>
                              <i class="fa fa-arrow-alt-circle-left"></i> Monthly Dividend (November)
                           </div>
                        </td>
                        <td>Nov 12, 2019</td>
                        <td>$115.21</td>
                        <td><span class="badge badge-success">Delivered</span></td>
                     </tr>
                     <tr>
                        <th scope="row">#14201</th>
                        <td>
                           <div>
                              <i class="fa fa-arrow-alt-circle-left"></i> Monthly Dividend (October)
                           </div>
                        </td>
                        <td>Oct 12, 2019</td>
                        <td>$115.21</td>
                        <td><span class="badge badge-success">Delivered</span></td>
                     </tr>
                     <tr>
                        <th scope="row">#14152</th>
                        <td>
                           <div>
                              Initiated 24 Month Investment Plan <i class="fa fa-arrow-alt-circle-right"></i>
                           </div>
                        </td>
                        <td>Sept 11, 2019</td>
                        <td>$10,000.00</td>
                        <td><span class="badge badge-success">Delivered</span></td>
                     </tr>-->
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
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
<script>
   window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Investment Line Chart"
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",
      	indexLabelFontSize: 16,
		dataPoints: [
			{ y: 400 },
         { y: 450 },
         { y: 500 },
         { y: 550 },
         { y: 600 },
         { y: 650 },
         { y: 700 }
		]
	}]
});
chart.render();

}

	</script>
@endsection