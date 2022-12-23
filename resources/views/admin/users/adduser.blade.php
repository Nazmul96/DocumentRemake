@extends('admin.master')

@section('page')
    <h4 class="page-title-main">Add User</h4>
@endsection

@section('content')

<div class="card">
	<div class="card-body">
	   
		<form method="post" action="{{route('user.save')}}">
			@csrf
			<div class="form-group mb-2">
				<label>First Name</label>
				<input type="text" class="form-control" name="first_name" placeholder="First Name">
				@error('first_name')
                        <strong class="text-danger">{{ $message }}</strong>
				@enderror
			</div>
			<div class="form-group mb-2">
				<label>Last Name</label>
				<input type="text" class="form-control" name="last_name" placeholder="Last Name">
				@error('last_name')
                        <strong class="text-danger">{{ $message }}</strong>
				@enderror
			</div>
			<div class="form-group mb-2">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email">
				@error('email')
                        <strong class="text-danger">{{ $message }}</strong>
				@enderror
			</div>
            <div class="form-group mb-2">
                <label>User role</label>
                <select class="form-control" name="user_role">
                	<option value="">Select role</option>
                	<option value="2">Admin</option>
                	<option value="3">User</option>
                </select>
				@error('user_role')
                        <strong class="text-danger">{{ $message }}</strong>
				@enderror
            </div>
 			<div class="form-group mb-2">
				<label>Password</label>
				<input type="password" class="form-control" name="password"  placeholder="Password">
				@error('password')
                        <strong class="text-danger">{{ $message }}</strong>
				@enderror
			</div>
			<div class="text-center">
		        <button class="btn btn-primary" type="submit"> Add User </button>
		    </div>
		</form>

	</div>
</div> 

@endsection