@extends('admin.master')

@section('content')

<div class="row">
    <div class="col-12">
    	<div class="mb-4 text-end">
    		<a class="btn btn-primary" href="{{ route('backend.add-brand.addBrand') }}"><i class="mdi mdi-plus"></i> Add New Category</a>
    	</div>
        <div class="card">
            <div class="card-body table-responsive"> 
                <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Category Name</th>
                        <th>Brand</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
	                    <tr>
	                        <td><img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="image" class="img-fluid avatar-md rounded"></td>
	                        <td>Computers </td>
	                        <td> Iphone </td>
	                        <td> </td>
	                        <td> <span class="badge bg-success"> Active </span> </td>
	                        <td>
	                        	<button type="button" class="btn btn-sm btn-primary waves-effect waves-light"><i class="mdi mdi-square-edit-outline"></i></button> 
	                        	<button type="button" class="btn btn-sm btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
	                        </td>
	                    </tr> 
	                     <tr>
	                        <td><img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="image" class="img-fluid avatar-md rounded"></td>
	                        <td>Laptops </td>
	                        <td> Acear </td>
	                        <td> </td>
	                        <td> <span class="badge bg-success"> Active </span> </td>
	                        <td>
	                        	<button type="button" class="btn btn-sm btn-primary waves-effect waves-light"><i class="mdi mdi-square-edit-outline"></i></button> 
	                        	<button type="button" class="btn btn-sm btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
	                        </td>
	                    </tr>
	                     <tr>
	                        <td><img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="image" class="img-fluid avatar-md rounded"></td>
	                        <td>Electronics  </td>
	                        <td> Head Phone </td>
	                        <td> </td>
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
</div> <!-- end row -->
<div id="addcatagory" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    	
        <div class="modal-content">
        	<div class="modal-header">
	            <h4 class="modal-title" id="standard-modalLabel">Add Category </h4>
	            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	        </div>
            <div class="modal-body">
                <form class="px-3" action="#">
                    <div class="mb-3">
                        <label for="CategoryName" class="form-label">Category Name</label>
                        <input class="form-control" type="text" id="CategoryName" required="" placeholder=" ">
                    </div>

                    <div class="mb-3">
                        <label for="SelectBrand" class="form-label">Select Brand</label>
                        <select class="form-control">
                        	<option value="">Select Brand</option>
                        	<option value="">Iphone</option>
                        	<option value="">Acer</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                         <textarea class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category Image / Icon</label>
                         <input type="file"  class="imageupload" name="">
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Add Category</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection