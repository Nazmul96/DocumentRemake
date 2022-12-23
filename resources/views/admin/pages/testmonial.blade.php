@extends('admin.master')

@section('content') 
<div class="text-end mb-3">
    <a href="{{ url('/addtestmonial') }}" class="btn btn-primary "><i class="mdi mdi-plus"></i>Add testmonial</a>
</div>
<div class="card">
    <div class="card-body">
		<table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Comments</th>
                <th>Rating</th>  
                <th>Status</th> 
                <th>Action</th>
            </tr>
            </thead>


            <tbody>
                <tr>
                    <td>
                    	<img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="" height="32" width="32"  class="img-fluid avatar-lg rounded">
                    </td>
                    <td>Hundreds of  benefit</td> 
                    <td class="text-wrap">Join  students who  from our services to study abroad.</td> 
                    <td> 
                        <span class="ratting">
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                        </span> 
                    </td> 
                    <td><span class="badge bg-success rounded-pill">Publish</span></td> 
                    <td> 
                        <a href="{{ url('/edittestmonial') }}" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="{{ asset('assets/images/users/user-2.jpg') }}" alt="" height="32" width="32"  class="img-fluid avatar-lg rounded">
                    </td>
                    <td>Hundreds of  benefit</td> 
                    <td class="text-wrap">Join  students who  from our services to study abroad.</td> 
                    <td> 
                        <span class="ratting">
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                        </span> 
                    </td> 
                    <td><span class="badge bg-success rounded-pill">Publish</span></td> 
                    <td> 
                        <a href="{{ url('/edittestmonial') }}" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="{{ asset('assets/images/users/user-3.jpg') }}" alt="" height="32" width="32"  class="img-fluid avatar-lg rounded">
                    </td>
                    <td>Hundreds of  benefit</td> 
                    <td class="text-wrap">Join  students who  from our services to study abroad.Join  students who  from our services to study abroad.</td> 
                    <td> 
                        <span class="ratting">
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                        </span> 
                    </td> 
                    <td><span class="badge bg-success rounded-pill">Publish</span></td> 
                    <td> 
                        <a href="{{ url('/edittestmonial') }}" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                    </td>
                </tr> 
                
            </tbody>
        </table>
    </div>
</div>


@endsection