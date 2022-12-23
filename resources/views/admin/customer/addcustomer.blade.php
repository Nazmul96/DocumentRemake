@extends('admin.master')

@section('content')
<div class="card">
	<div class="card-body">
		<form class="px-3" action="#">
			<div class="row"> 
				<div class="mb-3 col-md-6">
					<label class="form-label">Name</label>
		        	<input type="text" class="form-control" name="">
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Username</label>
		        	<input type="text" class="form-control" name="">
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Password </label>
		        	<input type="password" class="form-control" name="">
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Confirm Password </label>
		        	<input type="password" class="form-control" name="">
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Email</label>
		        	<input type="email" class="form-control" name="">
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Phone</label>
		        	<input type="tel" class="form-control" name="">
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Gender</label>
		        	<select class="form-control">
		        		<option value="1">Male</option>
		        		<option value="">Female</option>
		        	</select>
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Website</label>
		        	<input type="text" class="form-control" name="">
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Country</label>
		        	<input type="text" class="form-control" name="">
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Address</label>
		        	<input type="text" class="form-control" name="">
				</div>
				<div class="mb-3 col-md-12">
					<label class="form-label">Image</label>
		        	<input type="file" class="imageupload" name="">
				</div>
				<div class="mb-3 col-md-6">
					<div class="form-check form-switch">
		                <input type="checkbox" class="form-check-input" id="customSwitch1">
		                <label class="form-check-label" for="customSwitch1">Active</label>
		            </div> 
				</div>
				 
			</div>
			 <div class="mb-3  text-center">
		        <button class="btn btn-primary" type="submit">Add New Customer</button>
		    </div>
		</form>
	</div>
</div>
@endsection