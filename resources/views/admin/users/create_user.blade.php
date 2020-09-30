@extends('admin.master')
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
                <!-- end row -->
                <div class="row">
                    <div class="col-xl-8">
                        <h4>New User</h4>
                        @if(Session::has('status'))
                        <div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
                        @endif
                        <form id="frm_info_basic" method="post" action="{{ url('/admin/users-management/save-user') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">First Name</label>
                                        </div>
                                        <input class="form-control" name="first_name" value="" required/>
                                        @if ($errors->has('first_name'))
                                        <span style="display:initial;" class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Last Name</label>
                                        </div>
                                        <input class="form-control" name="last_name" value="" required/>
                                        @if ($errors->has('last_name'))
                                        <span style="display:initial;" class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">User Name</label>
                                        </div>
                                        <input class="form-control" name="name" value="" required/>
                                        @if ($errors->has('name'))
                                        <span style="display:initial;" class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Email</label>
                                        </div>
                                        <input class="form-control" type="email" name="email" placeholder="" value="" required/>
                                        @if ($errors->has('email'))
                                        <span style="display:initial;" class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Password</label>
                                        </div>
                                        <input type="password" class="form-control" name="password" required/>
                                        @if ($errors->has('password'))
                                        <span style="display:initial;" class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Address</label>
                                        </div>
                                        <input class="form-control" name="address" required/>
                                        @if ($errors->has('address'))
                                        <span style="display:initial;" class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Zipcode</label>
                                        </div>
                                        <input class="form-control" name="zipcode" required/>
                                        @if ($errors->has('zipcode'))
                                        <span style="display:initial;" class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('zipcode') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Country of citizenship</label>
                                        </div>
                                        <select id="country_citizenship" class="form-control" name="country_citizenship" required>
                                            <option value="">Select citizenship Country</option>
                                            @foreach($countryData as $country)
                                            <option value="{{$country['name']}}">{{$country['name']}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country_citizenship'))
                                        <span style="display:initial;" class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('country_citizenship') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Country of Residence</label>
                                        </div>
                                        <select id="country_residence" class="form-control" name="country_residence" required>
                                            <option value="">Select Residence Country</option>
                                            @foreach($countryData as $country)
                                            <option value="{{$country['name']}}">{{$country['name']}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country_residence'))
                                        <span style="display:initial;" class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('country_residence') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">View Details URL</label>
                                        </div>
                                        <input class="form-control" type="text" name="view_details_url" placeholder="" value="" />
                                        @if ($errors->has('view_details_url'))
                                        <span style="display:initial;" class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('view_details_url') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div> -->

                                <!-- <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Icon</label>
                                        </div>
                                        <input class="form-control" type="file" name="icon" placeholder="" />
                                        @if ($errors->has('icon'))
                                        <span style="display:initial;" class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('icon') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div> -->

                                <!-- <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Plan Valid From</label>
                                        </div>
                                        <input class="form-control" type="date" name="plan_valid_from" placeholder="" />
                                        @if ($errors->has('plan_valid_from'))
                                        <span style="display:initial;" class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('plan_valid_from') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div> -->

                                <!-- <div id="tab_logic" class="col-sm-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">descritpion</label>
                                        </div>
                                        <input class="form-control" type="text" name="descritpion[]" placeholder="" />
                                        @if ($errors->has('descritpion'))
                                        <span style="display:initial;" class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('descritpion') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div> -->

                                <!-- <div class="col-sm-12 more-feilds"></div>

                                <div class="col-sm-12">
                                    <div class="form-group change">
                                        <label for="">&nbsp;</label><br />
                                        <a class="btn btn-success add-more">+ Add More descritpion</a>
                                    </div>
                                </div> -->
                            </div>
                            <button class="btn btn-primary" type="submit">Create User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $("#country").change(function() {
        $('#states').html('');
        var countyid = this.value;
        if (countyid !== '') {
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    country_id: countyid,
                    _token: "{{csrf_token()}}"
                },
                url: "{{url('admin/states')}}",
                success: function(success) {
                    console.log(success);
                    if (success.data.length > 0) {
                        $.each(success.data, function(index, value) {
                            optionText = value.name;
                            optionValue = value.id;
                            $('#states').append(`<option value="${optionValue}">${optionText}</option>`);
                        });
                    }
                }
            });
        }
    });
    $("#states").change(function() {
        $('#cities').html('');
        var id = this.value;
        if (id !== '') {
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    id: id,
                    _token: "{{csrf_token()}}"
                },
                url: "{{url('admin/cities')}}",
                success: function(success) {
                    console.log(success);
                    if (success.data.length > 0) {
                        $.each(success.data, function(index, value) {
                            optionText = value.name;
                            optionValue = value.id;
                            $('#cities').append(`<option value="${optionValue}">${optionText}</option>`);
                        });
                    }
                }
            });
        }
    });
    $(document).ready(function() {
        $(".add-more").click(function() {
            var html = $("#tab_logic").html();
            $(".more-feilds").append(html);
        });
        $("body").on("click", ".remove", function() {
            $(this).parents("#tab_logic").remove();
        });
    });
</script>
@endsection