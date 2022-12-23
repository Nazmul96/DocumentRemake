@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-12">
    	<div class="mb-4 text-end">
    		<a class="btn btn-primary" href="{{ url('/addpage') }}"><i class="mdi mdi-plus"></i> Add New Page</a>
    	</div>
        <div class="card">
            <div class="card-body table-responsive"> 
                <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                    <thead>
                    <tr> 
                        <th>Title</th>
                        <th>Created date</th> 
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
	                    <tr> 
	                        <td>About Us </td>
	                        <td> 01/01/2021 10:38 PM </td> 
	                        <td> <span class="badge bg-success"> Active </span> </td>
	                        <td>
	                        	<a href="#" class="btn btn-sm btn-success waves-effect waves-light"><i class="mdi mdi-eye-outline"></i></a>
	                        	<button type="button" class="btn btn-sm btn-primary waves-effect waves-light"><i class="mdi mdi-square-edit-outline"></i></button> 
	                        	<button type="button" class="btn btn-sm btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
	                        </td>
	                    </tr> 
	                    <tr> 
	                        <td>Terms and Conditions</td>
	                        <td> 01/01/2021 10:38 PM </td> 
	                        <td> <span class="badge bg-success"> Active </span> </td>
	                        <td>
	                        	<a href="#" class="btn btn-sm btn-success waves-effect waves-light"><i class="mdi mdi-eye-outline"></i></a>
	                        	<button type="button" class="btn btn-sm btn-primary waves-effect waves-light"><i class="mdi mdi-square-edit-outline"></i></button> 
	                        	<button type="button" class="btn btn-sm btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
	                        </td>
	                    </tr> 
	                    <tr> 
	                        <td>Privacy policy</td>
	                        <td> 01/01/2021 10:38 PM </td> 
	                        <td> <span class="badge bg-success"> Active </span> </td>
	                        <td>
	                        	<a href="#" class="btn btn-sm btn-success waves-effect waves-light"><i class="mdi mdi-eye-outline"></i></a>
	                        	<button type="button" class="btn btn-sm btn-primary waves-effect waves-light"><i class="mdi mdi-square-edit-outline"></i></button> 
	                        	<button type="button" class="btn btn-sm btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
	                        </td>
	                    </tr> 
	                     
                    </tbody>
                </table>
            </div>
        </div>
       
    </div>
</div> 
<!-- end row -->
@endsection