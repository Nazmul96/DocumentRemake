@extends('admin.master')

@section('content')
<div class="card">
	<div class="card-body">
		<form class="px-3" action="#"> 
			<div class="mb-2 form-group">
				<label class="form-label">Question</label>
	        	<input type="text" class="form-control" name="">
			</div>
			<div class="form-group mb-2">
                <label class="form-label">Answare</label>
                <textarea class="form-control" id="ckeditor" value=""></textarea>
        	</div>
			 
        	<div class="mb-3 mt-4 text-center">
                <button class="btn btn-primary" type="submit">Add Page</button>
            </div>
		</form>
	</div>
</div>

@endsection