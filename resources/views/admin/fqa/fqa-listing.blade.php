@extends('admin.master')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title">{{ $pageName }}</h4>
    </div>

@endsection

@section('content')
 
    <div class="row">
        <div class="col-md-12 text-right my-3">
        @if(Session::has('status'))
            <div class="alert alert-{{ Session::get('status') }} clearfix">{{ Session::get('message') }}</div>
        @endif 
        <a href="{{ url('/admin/fqa-management/add-FQA') }}"><button class="btn btn-xs btn-primary" type="button">Create FQA</button></a>
    </div>
		<div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-8">
                            <h4>{{ $pageName }}</h4>
                        </div>
                        <div class="table-responsive m-t-40">
                        <table class="table table-striped table-bordered table-hover dataTable  dtr-inline " id="myTable">
					<!--	<table id="myTable" class="table table-bordered table-striped"> -->
							<thead>
								<tr>
									<!-- <th>Sr.No</th> -->
									<th>FQA Heading</th>
									<th>FQA Answer </th>
                                    <th>FQA Type </th>
									<th>Action</th>
								</tr>
							</thead>
						<tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="remove_input"></th>
                            </tr>
                        </tfoot>
                    </table>
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
<!--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>  -->
<script>
//$('#myTable').DataTable();
 
$(function() {

    $('#myTable').DataTable({
        processing : true,
        serverSide: true,
        lengthMenu: [10,25,50,100],
        order: [[1,'desc']],
        ajax: '{!! url("/admin/fqa-management/fqa-data") !!}',
        columns: [
            { data: 'fqaHeadding', name: 'fqaHeadding', orderable: true , searchable: true},
            { data: 'fqaAnswer', name: 'fqaAnswer', orderable: true , searchable: true},
            { data: 'fqa_type', name: 'fqa_type', orderable: true , searchable: true},
            
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
                    url:'{{ url("/admin/fqa-management/delete") }}'+'/'+id,
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
