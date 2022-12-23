@extends('admin.master')

@section('content')

<div class="card">
	<div class="card-body">
		<form>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group mb-2">
						<label class="form-label"> Site Name </label>
						<input type="text" class="form-control" name="">
					</div>
					<div class="form-group mb-2">
						<label class="form-label"> Meta Title </label>
						<input type="text" class="form-control" name="">
					</div>
					<div class="form-group mb-2">
						<label class="form-label"> Meta Keyword</label>
						<input type="text" class="form-control" name="">
					</div>
					<div class="form-group mb-2">
						<label class="form-label"> Meta Description </label>
						<input type="text" class="form-control" name="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group mb-2">
						<label class="form-label"> Site logo </label>
						<input type="file"  class="imageupload" name="">
					</div>
				</div>
			
			<div class="col-md-6">
				<div class="form-group mb-2">
					<label class="form-label"> Maximum number of ad images </label>
					<input type="number"  class="form-control" name="">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group mb-2">
					<label class="form-label"> Footer Copy Right Text </label>
					<input type="text" class="form-control" value="© 2022 bikroy. All Rights Reserved." placeholder=""  name="">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group mb-2">
					<label class="form-label"> Site Phone Number </label>
					<input type="text" class="form-control" value="" placeholder=""  name="">
				</div>
			</div>
			<div class="col-md-6"> 
				<div class="form-check form-switch mt-4 mb-2">
                    <input type="checkbox" class="form-check-input" id="customSwitch1">
                    <label class="form-check-label" for="customSwitch1">Watermark On Ads Images</label>
                </div>
			</div>
 		 </div> 
			<div class="text-center mt-4">
		        <button class="btn btn-primary" type="submit"> Save Setting </button>
		    </div>
		</form>
	</div>
</div>

@endsection