@extends('client.master')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />
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
                <!-- end row -->
                <div class="row">
                    <div class="col-xl-8">
                        <h4>{{ $pageName }}</h4>
                        @if(Session::has('status'))
                        <div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
                        @endif
                    </div>

                    <div class="table-responsive m-t-40">
                        <table class="table">
                            <thead>
                                <tr>
								<th scope="col">S No</th>
                                    <th scope="col">Month</th>
                                    <th scope="col">Growth</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php $i=1;?>
                                @foreach($growthData as $growth)
                               
                                <tr>
									<th scope="row">{{ $i}}</th>
                                    <th scope="row">{{ $growth['month']}}</th>
                                    <td>${{ floor($growth['gowth'] * 100) / 100  }}</td>
                                </tr>
								<?php $i++;?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ url('/client') }}" >Back To Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
@section('script')

@endsection