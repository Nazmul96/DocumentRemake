@extends('admin.master')

@section('content')

<div class="row justify-content-center">
	<div class="col-md-6">
        <div class="card">
            <div class="text-center card-body"> 
                <div>
                    <img src="{{ asset('assets/images/users/user-1.jpg') }}" class="rounded-circle avatar-xl img-thumbnail mb-3" alt="profile-image"> 

                    <div class="text-start">
                        <p class="text-muted font-13"><strong>Full Name :</strong> <span class="ms-2">Johnathan Deo</span></p>

                        <p class="text-muted font-13"><strong>Mobile :</strong><span class="ms-2">(123) 123 1234</span></p>

                        <p class="text-muted font-13"><strong>Email :</strong> <span class="ms-2">coderthemes@gmail.com</span></p>

                        <p class="text-muted font-13"><strong>Website :</strong> <span class="ms-2">https://www.website.com</span></p>

                        <p class="text-muted font-13 m-b-5"><strong>Registered At :</strong> <span class="ms-2">AUG 04, 2022 </span></p>

                    </div>

                </div>

            </div>
        </div> 
    </div>
    <div class="col-12">
    	
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