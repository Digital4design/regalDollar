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
                                            <div class="col-lg-5">
                                                <div class="text-center faq-title pt-4 pb-4">
                                                    <div class="pt-3 pb-3">
                                                        <i class="ti-comments text-primary h3"></i>
                                                    </div>
                                                    <h5>Have a question? We may have an answer!</h5>
                                                    <p class="text-muted">If you don't find what you're looking for, reach out to us using one of the buttons below:</p>
                                                    <button type="button" class="btn btn-primary m-t-10 mr-1 waves-effect waves-light">Email Us</button>
                                                    <button type="button" class="btn btn-success m-t-10 waves-effect waves-light">Tweet Us</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row justify-content-center">
                                            <div class="col-lg-5">
                                                <h5 class="mt-0 font-18 mb-4"><i class="ti-agenda text-primary mr-2"></i> General Questions</h5>
                                                <div class="accordion" id="accordionExample">
                                                    <div class="card mb-0">
                                                        <a data-toggle="collapse" href="#collapseOne" class="faq" aria-expanded="true" aria-controls="collapseOne">
                                                            <div class="card-header text-dark" id="headingOne">
                                                                <h6 class="m-0 faq-question">Question 1?</h6>
                                                            </div>
                                                        </a>

                                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <p class="text-muted mb-0 faq-ans">Content goes here</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- collapse one end -->

                                                    <div class="card mb-0">
                                                        <a data-toggle="collapse" href="#collapseTwo" class="faq collapsed" aria-expanded="false" aria-controls="collapseTwo">
                                                            <div class="card-header text-dark" id="headingTwo">
                                                                <h6 class="m-0 faq-question">Question 2?</h6>
                                                            </div>
                                                        </a>
                                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <p class="text-muted mb-0 faq-ans">Content goes here</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- collapse two end -->

                                                    <div class="card mb-0">
                                                        <a data-toggle="collapse" href="#collapseThree" class="faq collapsed" aria-expanded="false" aria-controls="collapseThree">
                                                            <div class="card-header text-dark" id="headingThree">
                                                                <h6 class="m-0 faq-question">Question 3?</h6>
                                                            </div>
                                                        </a>
                                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <p class="text-muted mb-0 faq-ans">Content goes here</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- collapse three end -->

                                                    <div class="card">
                                                        <a data-toggle="collapse" href="#collapseFour" class="faq collapsed" aria-expanded="false" aria-controls="collapseFour">
                                                            <div class="card-header text-dark" id="headingFour">
                                                                <h6 class="m-0 faq-question">Question 4?</h6>
                                                            </div>
                                                        </a>
                                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <p class="text-muted mb-0 faq-ans">Content goes here</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- collapse four end -->
                                                </div>
                                                <!-- end accordian -->
                                            </div>

                                            <div class="col-lg-5 offset-lg-1">
                                                <h5 class="mt-0 font-18 mb-4"><i class="ti-bookmark-alt text-primary mr-2"></i> Investments &amp; Plans</h5>
                                                <div class="accordion" id="accordionExample2">
                                                    <div class="card mb-0">
                                                        <a data-toggle="collapse" href="#collapseFive" class="faq" aria-expanded="true" aria-controls="collapseFive">
                                                            <div class="card-header text-dark" id="headingFive">
                                                                <h6 class="m-0 faq-question">Question 1?</h6>
                                                            </div>
                                                        </a>

                                                        <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordionExample2">
                                                            <div class="card-body">
                                                                <p class="text-muted mb-0 faq-ans">Content goes here</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- collapse one end -->

                                                    <div class="card mb-0">
                                                        <a data-toggle="collapse" href="#collapseSix" class="faq collapsed" aria-expanded="false" aria-controls="collapseSix">
                                                            <div class="card-header text-dark" id="headingSix">
                                                                <h6 class="m-0 faq-question">Question 2?</h6>
                                                            </div>
                                                        </a>
                                                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample2">
                                                            <div class="card-body">
                                                                <p class="text-muted mb-0 faq-ans">Content goes here</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- collapse two end -->

                                                    <div class="card mb-0">
                                                        <a data-toggle="collapse" href="#collapseSeven" class="faq collapsed" aria-expanded="false" aria-controls="collapseSeven">
                                                            <div class="card-header text-dark" id="headingSeven">
                                                                <h6 class="m-0 faq-question">Question 3?</h6>
                                                            </div>
                                                        </a>
                                                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample2">
                                                            <div class="card-body">
                                                                <p class="text-muted mb-0 faq-ans">Content goes here</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- collapse three end -->

                                                    <div class="card">
                                                        <a data-toggle="collapse" href="#collapseEight" class="faq collapsed" aria-expanded="false" aria-controls="collapseEight">
                                                            <div class="card-header text-dark" id="headingEight">
                                                                <h6 class="m-0 faq-question">Question 4?</h6>
                                                            </div>
                                                        </a>
                                                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample2">
                                                            <div class="card-body">
                                                                <p class="text-muted mb-0 faq-ans">Content goes here</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- collapse four end -->
                                                </div>
                                                <!-- end accordian -->
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            $('#cities').append(`<option value="${optionValue}">${optionText}</option>`);
                           });
   			        }
   			       }
   	             });
              }
           });

</script>
@endsection