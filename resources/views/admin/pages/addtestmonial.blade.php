@extends('admin.master')

@section('content')
<div class="card">
	<div class="card-body">
		<form>
			<div class="form-group mb-2">
				<label class="form-label">User Name </label>
				<input type="text" class="form-control" name="">
			</div>
			<div class="form-group mb-2">
				<label class="form-label">Comments</label>
				 <textarea class="form-control" id="ckeditor"></textarea>
			</div>
			<div class="form-group mb-2">
				<label class="form-label">User Image</label>
				<input type="file" class="imageupload" name="">
			</div>
            <div class="form-group mb-2">
                <label class="form-label">User rating</label>
                <input type="number" class="form-control" name="">
            </div>
			<div class="form-check form-switch mb-2">
                <input type="checkbox" class="form-check-input" id="customSwitch1">
                <label class="form-check-label" for="customSwitch1">Publish</label>
            </div>
			<div class="text-center">
		        <button class="btn btn-primary" type="submit"> Add Testmonial </button>
		    </div>
		</form>
	</div>
</div>

@endsection