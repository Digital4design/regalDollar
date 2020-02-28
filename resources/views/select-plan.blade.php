@extends('layouts.master')

@section('css')

@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title">Open Investment Account</h4>
    </div>

@endsection

@section('content')

    <?
    $vals = ['1'=>'12 Month Plan','2'=>'24 Month Plan','3'=>'48 Month Plan','4'=>'60 Month Plan'];
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="progressbar">
                        <li class="active">Account Details</li>
                        <li>Funding</li>
                        <li>Agreement</li>
                        <li>Review & Finish</li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center mb-5">
                        <div class="col-lg-6">
                            <div class="text-center faq-title pt-4 pb-4">
                                <div class="pt-3 pb-3">
                                    <i class="ti-bar-chart-alt text-primary h3"></i>
                                </div>
                                <h5>Establish a New Investment Account</h5>
                                <p class="text-muted">This process will allow you to create a new Investment account with RegalDollars!</p>

                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Investment Options</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option value="0" selected>Choose an investment plan...</option>
                                    @foreach($vals as $k=>$v)
                                        <option value="{{$k}}" <?=(Request::route('id')==$k)?'selected':''?>>{{$v}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Terms & Conditions</h4>
                            <p>
                                Lorem ipsum dolor amet fixie flannel brooklyn 3 wolf moon flexitarian gentrify kogi green juice lumbersexual. Prism heirloom put a bird on it, palo santo mumblecore PBR&B keytar. Pop-up brooklyn photo booth celiac affogato glossier semiotics banh mi poke. Chartreuse pitchfork meh lyft. Hell of skateboard af beard, pug selvage activated charcoal whatever. Four dollar toast swag intelligentsia cloud bread man braid stumptown.</p>

                                <p>Hoodie craft beer tousled chambray thundercats cliche gochujang 8-bit pop-up gentrify taiyaki jianbing tacos. Green juice hammock vexillologist put a bird on it trust fund lyft health goth tbh PBR&B retro shabby chic ugh. Master cleanse venmo dreamcatcher yr pug shaman pinterest banh mi fingerstache pok pok direct trade single-origin coffee knausgaard ramps cred. Cronut cred bespoke, portland four loko readymade man bun keffiyeh wolf normcore. 90's mustache waistcoat hot chicken deep v, plaid bitters brooklyn cloud bread slow-carb street art migas man bun tattooed.
                            </p>
                        </div>
                        <div class="col-sm-6" style="text-align: right;">
                            <button class="btn btn-primary" onclick="window.location.href='/funding-plan'">Continue to Funding...</button>
                        </div>
                    </div>

                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')
@endsection
