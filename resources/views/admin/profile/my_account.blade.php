@extends('admin.master')

@section('page')
<h4 class="page-title-main">My Account</h4>

@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
       <form action="{{route('backend.myaccountUpdate')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" id="" value="{{$user_data->id}}">
            <div class="row">
                <div class="col-md-6">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{$user_data->first_name}}">
                    @error('first_name')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{$user_data->last_name}}">
                    @error('last_name')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-6 mt-1">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control"  value="{{$user_data->email}}">
                    @error('email')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-6 mt-1">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="col-md-6 mt-1">
                    <label for="">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                    @if(session()->has('do_not_match'))
                        <strong class="text-danger">
                            {{session()->get('do_not_match')}}
                        </strong>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </form> 
    </div>
</div>

<script>
    $('.addSetting').multifield({
        section: '.dataInsight',
        btnAdd: '.addInsight',
        btnRemove: '.removeInsight',
        max: 6,
        locale: 'default'
    });
</script>
@endsection