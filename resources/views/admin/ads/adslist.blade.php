@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-12">
    	<div class="mb-4 text-end">
    		<a class="btn btn-primary" href="{{ url('/addads') }}">
    			<i class="mdi mdi-plus"></i> Add New Ads
    		</a>
    	</div>
        <div class="card"> 
            <div class="card-body table-responsive"> 
            	<form class="row mb-3" id="formSubmit" action="" method="GET">
				  <div class="col-sm-12 col-md-4">
				    <select name="category" class="form-control">
				      <option value="" selected=""> All Category </option>
				      <option value="electronics"> Electronics </option>
				      <option value="mobile-phone"> Mobile Phone </option>
				      <option value="vehicles"> Vehicles </option>
				      <option value="sports-&amp;-kids"> Sports &amp; Kids </option>
				      <option value="fashion"> Fashion </option>
				      <option value="essentials"> Essentials </option>
				      <option value="real-estate"> Real Estate </option>
				    </select>
				  </div>
				  <div class="col-sm-12 col-md-4">
				    <select name="brand" class="form-control">
				      <option value="" selected=""> All Brand </option>
				      <option value="kaya-franecki"> Kaya Franecki </option>
				      <option value="alexandro-deckow-jr"> Alexandro Deckow Jr. </option>
				      <option value="eleanora-sawayn"> Eleanora Sawayn </option>
				      <option value="miss-viva-luettgen-iv"> Miss Viva Luettgen IV </option>
				      <option value="laverna-lynch-iv"> Laverna Lynch IV </option>
				    </select>
				  </div>
				  <div class="col-sm-12 col-md-4">
				    <select name="filter_by" class="form-control w-100-p">
				      <option value="" class="d-none">Filter By</option>
				      <option value="active"> Active</option>
				      <option value="sold"> Sold</option>
				      <option value="featured"> Featured</option>
				      <option value="most_viewed">Most Viewed</option>
				      <option value="all"> All</option>
				    </select>
				  </div>
 
				</form>
                <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th> Image </th>
                        <th>  Name </th>
                        <th> Price </th>
                        <th> Category </th>
                        <th> Brand </th>
                        <th> Condition </th>
                        <th> Author </th>
                        <th> Status </th> 
                        <th> Action </th>
                    </tr>
                    </thead>


                    <tbody>
	                    <tr>
	                        <td><img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="image" class="img-fluid avatar-md rounded"></td>
	                        <td>Apple iPhone 7 Plus 128 gb <span class="badge btn-warning">Featured</span> </td>
	                        <td> $231 </td>
	                        <td> Mobile Phone </td>
	                        <td>  iPhone </td>
	                        <td> <span class="badge btn-success">Used</span> </td>
	                        <td><a href="#">Alex Brod</a> </td>
	                        <td>  
	                        	<span class="badge btn-danger">Pending</span>
	                        </td>
	                        <td>
	                        	<a href="#" class="btn btn-sm btn-success  waves-effect waves-light"><i class="mdi mdi-eye-outline"></i></a> 
	                        	<button type="button" class="btn btn-sm btn-primary waves-effect waves-light"><i class="mdi mdi-square-edit-outline"></i></button> 
	                        	<button type="button" class="btn btn-sm btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
	                        </td>
	                    </tr>  
	                    <tr>
	                        <td><img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="image" class="img-fluid avatar-md rounded"></td>
	                        <td>Apple iPhone 7 Plus 128 gb <span class="badge btn-warning">Featured</span> </td>
	                        <td> $231 </td>
	                        <td> Mobile Phone </td>
	                        <td>  iPhone </td>
	                        <td> <span class="badge btn-success">Used</span> </td>
	                        <td><a href="#">Alex Brod</a> </td>
	                        <td>  
	                        	<span class="badge btn-success">Active</span>
	                        </td>
	                        <td>
	                        	<a href="#" class="btn btn-sm btn-success  waves-effect waves-light"><i class="mdi mdi-eye-outline"></i></a> 
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
@endsection
