@extends('admin.master')

@section('page')
    <h4 class="page-title-main">User List</h4>
@endsection

@section('content')
<div class="text-end mb-3">
    <a href="{{ route('add.user') }}" class="btn btn-primary "><i class="mdi mdi-plus"></i>Add User</a>
</div>
<div class="card">
    <div class="card-body">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if(Session::has('delete'))
        <div class="alert alert-danger">
            {{ Session::get('delete') }}
        </div>
    @endif
		<table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th> 
                <th>Role</th>  
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
              @foreach($users as $user) 
                <tr>
                    <td>{{$user->name}}</td> 
                    <td class="text-wrap">{{$user->email}}</td> 
                    <td class="text-wrap"> 
                        @if($user->user_role == 2)
                            <span class="badge bg-light rounded-pill text-primary"> Admin </span> 
                        @else
                            <span class="badge bg-light rounded-pill text-success"> User </span>        
                        @endif
                    </td> 
                    <td>
                        <a href="{{ route('user.edit',$user->id)}}" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i>
                        </a>
                        <a href="{{ route('user.delete',$user->id)}}" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                    </td>
                </tr> 
             @endforeach 
            </tbody>
        </table>
       
    </div>
</div>
@endsection