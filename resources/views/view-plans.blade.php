@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title">Investment Plans & Options</h4>
</div>
@endsection

@section('content')
    <div class="alert alert-info"><b>Notice</b> You are already enrolled in the 24 month plan, with an investment of $10,000.</div>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card pricing-box">
            <div class="card-body">
                <div class="mb-4 pt-3 pb-3">
                    <div class="pricing-icon float-left">
                        <i class="ion ion-ios-build"></i>
                    </div>
                    <div class="text-right">
                        <h5 class="mt-0">12 Month Plan</h5>
                        <p class="text-muted em9">3% return monthly</p>
                    </div>
                </div>
                <div class="pricing-features mb-4">
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> You will be able to withdrawal your earnings every month</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> You cannot cancel this plan</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> $50,000 become $68,000 in one year // $1,500 a month</p>
                </div>
                <div class="text-center pt-3 pb-3">
                    <h2><sup><small>$</small></sup>10,000<br /><span class="font-16">One-Time Investment</span></h2>
                </div>
                <div class="mt-4">
                    <a href="/select-plan/1" class="btn btn-primary btn-block waves-effect waves-light">Sign up Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card pricing-box">
            <div class="card-body">
                <div class="mb-4 pt-3 pb-3">
                    <div class="pricing-icon float-left">
                        <i class="ion ion-ios-wallet"></i>
                    </div>
                    <div class="text-right">
                        <h5 class="mt-0">24 Month Plan</h5>
                        <p class="text-muted em9">40% return on completion</p>
                    </div>
                </div>
                <div class="pricing-features mb-4">
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> You will be able to withdrawal your earnings every month</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> Two-year commitment, you cannot cancel in the first year</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> $50,000 become $72,000 in 2 years</p>
                </div>
                <div class="text-center pt-3 pb-3">
                    <h2><sup><small>$</small></sup>10,000<br /><span class="font-16">One-Time Investment</span></h2>
                </div>
                <div class="mt-4">
                    <a href="/select-plan/2" class="btn btn-primary btn-block waves-effect waves-light">Sign up Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card pricing-box">
            <div class="card-body">
                <div class="mb-4 pt-3 pb-3">
                    <div class="pricing-icon float-left">
                        <i class="ion ion-ios-briefcase"></i>
                    </div>
                    <div class="text-right">
                        <h5 class="mt-0">36 Month Plan</h5>
                        <p class="text-muted em9">80% return on completion</p>
                    </div>
                </div>
                <div class="pricing-features mb-4">
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> Three-year commitment, you cannot cancel in the first year</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> $2,500 bonus on completion as gratitude</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> $50,000 become $90,000 in 3 years</p>
                </div>
                <div class="text-center pt-3 pb-3">
                    <h2><sup><small>$</small></sup>50,000<br /><span class="font-16">One-Time Investment</span></h2>
                </div>
                <div class="mt-4">
                    <a href="/select-plan/3" class="btn btn-primary btn-block waves-effect waves-light">Sign up Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card pricing-box">
            <div class="card-body">
                <div class="mb-4 pt-3 pb-3">
                    <div class="pricing-icon float-left">
                        <i class="ion ion-ios-cash"></i>
                    </div>
                    <div class="text-right">
                        <h5 class="mt-0">60 Month Plan</h5>
                        <p class="text-muted em9">150% return on completion</p>
                    </div>
                </div>
                <div class="pricing-features mb-4">
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> Five-year commitment</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> $5,000 bonus on completion as gratitude</p>
                    <p><i class="mdi mdi-arrow-right text-primary mr-2"></i> $50,000 become $150,000 in 5 years</p>
                </div>
                <div class="text-center pt-3 pb-3">
                    <h2><sup><small>$</small></sup>50,000<br /><span class="font-16">One-Time Investment</span></h2>
                </div>
                <div class="mt-4">
                    <a href="/select-plan/4" class="btn btn-primary btn-block waves-effect waves-light">Sign up Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

</div>
<!-- end row -->
@endsection

@section('script')
@endsection
