@extends('admin.master')

@section('content')
 	<div class="card">
 		<div class="card-body">
		    <form class="px-3" action="#">
		    	<div class="row">
		    		<div class="mb-3 col-md-12">
		    			<h4>Product Info</h4>
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<label class="form-label">Category</label>
	                	<select class="form-control select2">
	                		<option value="">Select A Category</option>
	                		<option value="1">Mobiles</option>
	                		<option value="2">Electronics</option>
	                		<option value="3">Home & Living</option>
	                		<option value="4">Vehicles</option>
	                		<option value="5">Pets & Animals</option>
	                		<option value="6">Property</option>
	                		<option value="7">Hobbies, Sports & Kids</option>
	                		<option value="8">Women's Fashion & Beauty</option>
	                		<option value="9">Men's Fashion & Grooming</option>
	                		<option value="10">Business & Industry</option>
	                		<option value="11">Education</option> 
	                	</select>
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<label class="form-label">Brand</label> 
	                	<select class="form-control select2">
	                		<option value="">Select A Brand</option>
	                		<option value="1">Acer</option>
	                		<option value="2">Apple</option>
	                		<option value="3">Haier</option>
	                		<option value="4">Samsung</option>
	                		<option value="5">Panasonic</option>
	                		<option value="6">Walton</option>
	                		<option value="7">Blackberry</option>
	                		<option value="8">Grameenphone</option>
	                		<option value="9">Huawei</option>
	                		<option value="10">Xiaomi</option>
	                		<option value="11">Nokia</option>   
	                	</select>
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<label class="form-label">Ads Title</label> 
	                	<input type="text" class="form-control" name="">
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<label class="form-label"> Ads Price </label> 
	                	<input type="text" class="form-control" name="">
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<label class="form-label">Author </label> 
	                	<select class="form-control select2">
	                		<option value="">Select Customer</option>
	                		<option value="1">Customer 1</option>
	                		<option value="2">Customer 2</option>
	                		<option value="3">Customer 3</option>
	                		<option value="4">Customer 4</option>
	                		<option value="5">Customer 5</option>
	                		<option value="6">Customer 6</option>
	                		<option value="7">Customer 7</option>
	                		<option value="8">Customer 8</option>
	                		<option value="9">Customer 9</option>
	                		<option value="10">Customer 10</option>
	                		<option value="11">Customer 11</option>   
	                	</select>
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<label class="form-label"> Condition </label> 
	                	<select class="form-control select2"> 
	                		<option value="1">Used</option>
	                		<option value="2">New</option>  
	                	</select>
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<label class="form-label"> Description </label> 
	                	<textarea class="form-control" id="ckeditor"></textarea>
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<label class="form-label"> Images </label> 
	                	<input type="file" name="" class="imageupload">
		    		</div>
		    		<div class="mb-3 col-md-12">
		    			<h4>Contact Info</h4>
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<label class="form-label"> Phone Number </label> 
	                	<input type="tel" name="" class="form-control">
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<label class="form-label"> Email Address </label> 
	                	<input type="email" name="" class="form-control">
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<label class="form-label"> Country </label> 
	                	<input type="text" name="" class="form-control">
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<label class="form-label"> State </label> 
	                	<input type="text" name="" class="form-control">
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<label class="form-label"> City </label> 
	                	<input type="text" name="" class="form-control">
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<label class="form-label"> Address </label> 
	                	<input type="text" name="" class="form-control">
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<label class="form-label"> Video Url </label> 
	                	<input type="text" name="" class="form-control">
		    		</div>
		    		<div class="mb-3 col-md-6">
		    			<div class="form-check ">
                            <input type="checkbox" class="form-check-input" id="urgent">
                            <label class="form-check-label" for="urgent"> Mark as urgent </label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="Featured">
                            <label class="form-check-label" for="Featured"> Featured</label>
                        </div>
		    		</div>

		    	</div>  
	            <div class="mb-3  ">
	                <button class="btn btn-primary" type="submit">Add New Ads</button>
	            </div>

        	</form>
 		</div>
 	</div>
@endsection
