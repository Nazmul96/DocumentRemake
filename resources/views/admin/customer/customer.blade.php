@extends('admin.master')

@section('content')

<div class="row">
    <div class="col-12">
    	<div class="mb-4 text-end">
    		<a href="{{ url('/addcustomer') }}" class="btn btn-primary"  ><i class="mdi mdi-plus"></i> Add New Customer</a>
    	</div>
        <div class="card">
            <div class="card-body table-responsive"> 
                <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th> Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
	                    <tr>
	                        <td><img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="image" class="img-fluid avatar-md rounded"></td>
	                        <td>Customer </td>
	                        <td> customer@mail.com </td>
	                        <td> + 12345678 </td>
	                        <td> <span class="badge bg-success"> Active </span> </td>
	                        <td>
	                        	<a href="{{ url('/customerdetails') }}" class="btn btn-sm btn-success waves-effect waves-light"><i class="mdi mdi-eye-outline"></i></a> 
	                        	<button type="button" class="btn btn-sm btn-primary waves-effect waves-light"><i class="mdi mdi-square-edit-outline"></i></button> 
	                        	<button type="button" class="btn btn-sm btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
	                        </td>
	                    </tr>
	                    <tr>
	                        <td><img src="{{ asset('assets/images/users/user-3.jpg') }}" alt="image" class="img-fluid avatar-md rounded"></td>
	                        <td>Customer2 </td>
	                        <td> customer2@mail.com </td>
	                        <td> + 98765432 </td>
	                        <td> <span class="badge bg-success"> Active </span> </td>
	                        <td>
	                        	<a href="{{ url('/customerdetails') }}" class="btn btn-sm btn-success waves-effect waves-light"><i class="mdi mdi-eye-outline"></i></a> 
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

@endsection