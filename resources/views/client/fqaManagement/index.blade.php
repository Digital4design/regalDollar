@extends('client.master')
@section('css')
@endsection
@section('breadcrumb')
<div class="col-sm-6">
   <h4 class="page-title">{{ $pageName }}</h4>
</div>
@endsection
@section('content')
<div class="content">
    
    <!-- end row -->
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
                                @foreach($fqageneralData as $generalData)
                                <?php // dd($generalData['fqaHeadding']);?>
                                <div class="card mb-0">
                                    <a data-toggle="collapse" href="#collapseOne" class="faq collapsed" aria-expanded="false" aria-controls="collapseOne">
                                        <div class="card-header text-dark" id="headingOne">
                                            <h6 class="m-0 faq-question">{{ $generalData['fqaHeadding'] }}</h6>
                                        </div>
                                    </a>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                        <div class="card-body">
                                            <p class="text-muted mb-0 faq-ans">{{ $generalData['fqaAnswer'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
                            </div>
                             <!--end accordian -->
                        </div>
                        <div class="col-lg-5 offset-lg-1">
                            <h5 class="mt-0 font-18 mb-4"><i class="ti-bookmark-alt text-primary mr-2"></i> Investments &amp; Plans</h5>
                            <div class="accordion" id="accordionExample2">
                                @foreach($fqamembersData as $membersData)
                                <?php // dd($membersData['fqaHeadding']);?>
                                <div class="card mb-0">
                                    <a data-toggle="collapse" href="#collapseFive" class="faq" aria-expanded="true" aria-controls="collapseFive">
                                        <div class="card-header text-dark" id="headingFive">
                                            <h6 class="m-0 faq-question">{{ $membersData['fqaHeadding']}}</h6>
                                        </div>
                                    </a>
                                    <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordionExample2">
                                        <div class="card-body">
                                            <p class="text-muted mb-0 faq-ans">{{ $membersData['fqaAnswer']}}</p>
                                        </div>
                                    </div>
                                </div>
                                 @endforeach
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
    <!-- end row -->
</div>
</div>
<!-- end row -->
@endsection

@section('script')


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>  -->
<script>
//$('#myTable').DataTable();
 
$(function() {
    $('#myTable').DataTable({
        processing : true,
        serverSide: true,
        lengthMenu: [10,25,50,100],
        order: [[1,'desc']],
        ajax: '{!! url("/client/documents/documents-data") !!}',
        columns: [
            //{ data: 'plan_name', name: 'plan_name', orderable: true },
            // { data: 'name', name: 'name', orderable: true , searchable: true},
            { data: 'documents_title', name: 'documents_title', orderable: true , searchable: true},
            // { data: 'documents_path', name: 'documents_path', orderable: true , searchable: true},
            { data: 'message', name: 'message', orderable: true , searchable: true},            
            { data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        dom: 'Blfrptip',
        buttons: [
                {
                     extend: 'colvis',text: 'Show/Hide Columns'
                }
        ],
        oLanguage: {
                sProcessing: "<img height='80' width='80' src='{{ url('public/images/loading.gif') }}' alt='loader'/>"
        },
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                .on('change', function () {
                    column.search($(this).val(), false, false, true).draw();
                });
            });
        }
	});

});

 $(document).on('click','.delete',function(){
    var id = $(this).data('id');
    swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          buttons: true,
          buttonsStyling: false
         }).then(function (actionButton) {
			
		    if (actionButton) {
                $('#sawyer-nursery-table_processing').show();
                $.ajax({
                    url:'{{ url("/admin/documents-management/delete") }}'+'/'+id,
                    type: 'GET',
                    success:function(){
						$('#sawyer-nursery-table_processing').hide();
                        swal(
                            'Deleted!',
                            'Record has been deleted successfully.',
                            'success'
                        ).then(function(){
                           location.reload();
                        });                        
                    }
                });  
            }
            else{
                swal("Record is safe!");
            }
        });
});
</script>
@endsection

