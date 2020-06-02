@extends('client.master')
@section('css')

@endsection

@section('content')
@php
$date=date_create(date('Y-m-d'));
$curentData=  date_format($date,"M d,Y");
@endphp




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

@endsection
