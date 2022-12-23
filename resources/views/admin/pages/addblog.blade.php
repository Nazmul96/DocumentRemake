@extends('admin.master')

@section('content')
<div class="card">
	<div class="card-body">
		<form>
			<div class="form-group mb-2">
				<label>Blog Title</label>
				<input type="text" class="form-control" name="">
			</div>
            <div class="form-group mb-2">
                <label>Blog Categories</label>
                <select class="form-control">
                    <option value="">Select Categories</option>
                    <option value="1">ইলেকট্রনিক্স</option>
                    <option value="2">কৃষি এবং খাদ্যদ্রব্য</option>
                    <option value="3">চাকরি </option>
                    <option value="4">টপ ও বেস্ট</option>
                </select>
                <span class="badge bg-success rounded-pill" data-bs-toggle="modal" data-bs-target="#standard-modal">Add Categories</span>

            </div> 
			<div class="form-group mb-2">
				<label>Blog Description</label>
				<textarea class="form-control" id="ckeditor"></textarea>
			</div>

			<div class="form-group mb-2">
				<label>Blog Image</label>
				<input type="file" class="imageupload" name="">
			</div>
			
            <div class="form-group mb-2">
                <label>Meta Title</label>
                <input type="text" class="form-control" name="" value="">
            </div>

            <div class="form-group mb-2">
                <label>Meta Keyword</label>
                <input type="text" class="form-control" name="" value="">
            </div>
            <div class="form-group mb-2">
                <label>Meta Description</label>
                <textarea class="form-control"></textarea>
            </div>
            <div class="form-check form-switch mb-2">
                <input type="checkbox" class="form-check-input" id="customSwitch1">
                <label class="form-check-label" for="customSwitch1">Publish</label>
            </div>
			<div class="text-center">
		        <button class="btn btn-primary" type="submit"> Add Blog </button>
		    </div>
		</form>
	</div>
</div>

<!-- Standard modal content -->
<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <form>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Add Categorie </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Categorie Name</label>
                        <input type="text" class="form-control" name="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Categorie</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </form>
    
</div><!-- /.modal -->


@endsection