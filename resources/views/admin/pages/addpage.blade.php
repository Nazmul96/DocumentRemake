@extends('admin.master')

@section('content')
<div class="card">
	<div class="card-body">
		<form class="px-3" action="#"> 
			<div class="mb-2 form-group">
				<label class="form-label">Page Name</label>
	        	<input type="text" class="form-control" name="">
			</div>
			<div class="form-group mb-2">
                <label class="form-label">Page Description</label>
                <textarea class="form-control" name="page_description" id="ckeditor" value=""></textarea>
        	</div>
			<div class="form-group mb-2">
                <label class="form-label">Meta Title</label>
                <input type="text" class="form-control" name="meta_title" value="">
            </div>
        	<div class="form-group mb-2">
                <label class="form-label">Meta Key Word</label>
                <input type="text" class="form-control" name="meta_key_word" value="">
            </div>
        	<div class="form-group mb-2">
                <label class="form-label">Meta Description</label>
                <textarea class="form-control" name="meta_description" value=""></textarea>
        	</div> 
        	<div class="mb-3 mt-4 text-center">
                <button class="btn btn-primary" type="submit">Add Page</button>
            </div>
		</form>
	</div>
</div>

@endsection