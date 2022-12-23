@extends('admin.master')

@section('content')
<div class="card">
	<div class="card-body">
	    <form class="px-3" action="#">
	    	<div class="row"> 
	    		<div class="mb-3 col-md-6">
	    			<label  class="form-label">Plan Type</label>
                    <select class="form-control">
                    	<option value="monthly"> Monthly </option>
                        <option value="yearly"> Yearly </option>
                        <option value="custom_date"> Duration </option>
                    </select>
	    		</div>
	    		<div class="mb-3 col-md-6">
	    			<label   class="form-label">Label</label>
                    <input class="form-control" type="text" required="" placeholder="Basic / Standard / Premium ">
	    		</div>
	    		<div class="mb-3 col-md-6">
	    			<label   class="form-label">Ad Limit</label>
                    <input class="form-control" type="number" required="" placeholder=" ">
	    		</div>
	    		<div class="mb-3 col-md-6">
	    			<label   class="form-label"> Price  ($)</label>
                    <input class="form-control" type="number" required="" placeholder=" ">
	    		</div>
	    		<div class="mb-3 col-md-6">
	    			<label   class="form-label">Featured Limit (Featured Ad on Home Page) </label>
                    <input class="form-control" type="number" required="" placeholder=" ">
	    		</div>
	    		<div class="mb-3 col-md-6">
	    			<label   class="form-label">Premium Badge </label>
                    <select class="form-control">
                    	<option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
	    		</div>
	    	</div>
	    	<div class="mb-3 text-center">
                <button class="btn btn-primary" type="submit">Add Plan</button>
            </div>
	    </form>
	</div>
</div>
@endsection