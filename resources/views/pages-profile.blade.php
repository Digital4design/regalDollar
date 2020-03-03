@extends('layouts.master')

@section('css')

@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title">My Profile</h4>
    </div>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center mb-2">
                        <div class="col-lg-6">
                            <div class="text-center faq-title pt-4 pb-4">
                                <div class="pt-3 pb-3">
                                    <i class="ti-user text-primary h3"></i>
                                </div>
                                <h5>Configure My Profile</h5>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-8">
                            <h4>Basic Information</h4>

                            <form id="frm_info_basic" method="post" action="/post/profile">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">First Name</label>
                                        </div>
                                        <input class="form-control" name="info_first" value="John" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Last Name</label>
                                        </div>
                                        <input class="form-control" name="info_last" value="Smith" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Address</label>
                                        </div>
                                        <input class="form-control" name="info_addr1" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Address 2</label>
                                        </div>
                                        <input class="form-control" name="info_addr1" placeholder="Apt/Bldg #" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">City</label>
                                        </div>
                                        <input class="form-control" name="info_city" placeholder="City" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">State</label>
                                        </div>
                                        <select class="form-control" name="info_state">
                                            @foreach($vars['states'] as $k=>$v)
                                                <option value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Zip</label>
                                        </div>
                                        <input class="form-control" type="text" name="info_zip" placeholder="" />
                                    </div>
                                </div>
                            </div>
                                <button class="btn btn-primary" type="button">Save Profile</button>
                        </form>
                        </div><div class="col-xl-4">
                            <h4>Change Password</h4>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Password</label>
                                </div>
                                <input class="form-control" name="info_pwd" value="" />
                            </div><div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Repeat Password</label>
                                </div>
                                <input class="form-control" name="info_pwd2" value="" />
                            </div>
                            <button class="btn btn-primary" type="button">Change Password</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')
@endsection
