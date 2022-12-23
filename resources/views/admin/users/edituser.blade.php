@extends('admin.master')

@section('page')
    <h4 class="page-title-main">Edit User</h4>
@endsection

@section('content')

<div class="card">
	<div class="card-body">
	   
		<form method="post" action="{{route('user.update',$user_edit->id)}}">
			@csrf
			<div class="form-group mb-2">
				<label>First Name</label>
				<input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{$user_edit->first_name}}">
				@error('first_name')
                        <strong class="text-danger">{{ $message }}</strong>
				@enderror
			</div>
			<div class="form-group mb-2">
				<label>Last Name</label>
				<input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{$user_edit->last_name}}">
				@error('last_name')
                        <strong class="text-danger">{{ $message }}</strong>
				@enderror
			</div>
			<div class="form-group mb-2">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email" value="{{$user_edit->email}}">
				@error('email')
                        <strong class="text-danger">{{ $message }}</strong>
				@enderror
			</div>
            <div class="form-group mb-2">
                <label>User role</label>
                <select class="form-control" name="user_role">
                	<option value="">Select role</option>
                	<option value="2" {{($user_edit->user_role == 2) ? "selected" : " "}}>Admin</option>
                	<option value="3" {{($user_edit->user_role == 3) ? "selected" : " "}}>User</option>
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
            <div class="form-group mb-2">
				<label>Confirm Password</label>
				<input type="password" class="form-control" name="confirm_password"  placeholder="Confirm Password">
                @if(session()->has('do_not_match'))
                        <strong class="text-danger">
                            {{session()->get('do_not_match')}}
                        </strong>
                @endif
			</div>
			<div class="text-center">
		        <button class="btn btn-primary" type="submit"> Add User </button>
		    </div>
		</form>

	</div>
</div> 

@endsection