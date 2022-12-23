@extends('admin.master')

@section('content')
 	<div class="card">
 		<div class="card-body">
            <form class="px-3" action="{{ route('backend.save-brand.saveBrand') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                    <label for="CategoryName" class="form-label">Brand Name</label>
                    <input class="form-control" type="text" id="CategoryName" placeholder="" name="brand_name">
                    @error('brand_name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror 
                </div>

                <div class="mb-3">
                    <label for="CategoryName" class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="">--- Select One ---</option>
                        <option value="1">Active</option>
                        <option value="2">In-Active</option>
                    </select>
                    @error('brand_name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Brand Image / Icon</label>
                    <input type="file"  class="imageupload" name="brand_image">
                    @error('brand_name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3 text-center">
                    <button class="btn btn-primary" type="submit">Add Brand</button>
                </div>
            </form>
 		</div>
 	</div>
@endsection
