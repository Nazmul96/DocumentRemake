@extends('admin.master')

@section('content')
 	<div class="card">
 		<div class="card-body">
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
 	</div>
@endsection
