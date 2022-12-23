@extends('admin.master')

@section('content')
<div class="text-end mb-3">
    <a href="{{ url('/addblog') }}" class="btn btn-primary "><i class="mdi mdi-plus"></i>Add Blog</a>
</div>
<div class="card">
    <div class="card-body">
		<table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th> 
                <th>Category</th> 
                <th>Status</th> 
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                    	<img src="{{ asset('assets/images/gallery/1.jpg') }}" alt="" height="42" class="img-fluid avatar-lg rounded">
                    </td>
                    <td>Hundreds of  benefit</td> 
                    <td class="text-wrap"> Join  students who  from our services to study abroad.</td> 
                    <td class="text-wrap">  <span class="badge bg-light rounded-pill text-primary"> Admission </span> </td> 
                    <td><span class="badge bg-success rounded-pill">Publish</span></td> 
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="mdi mdi-eye-outline"></i></a>
                        <a href="{{ url('/editblog') }}" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                    </td>
                </tr> 
                <tr>
                    <td>
                    	<img src="{{ asset('assets/images/gallery/2.jpg') }}" alt="" height="42" class="img-fluid avatar-lg rounded">
                    </td>
                    <td>Migration and Visa Services</td> 
                    <td class="text-wrap">Easy to follow migration consultation service and make your dream true.</td> 
                    <td class="text-wrap">  <span class="badge bg-light rounded-pill text-primary"> All </span> </td>
                    <td><span class="badge bg-danger rounded-pill">Unpublish</span></td> 
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="mdi mdi-eye-outline"></i></a>
                        <a href="{{ url('/editblog') }}" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                    </td>
                </tr> 
                <tr>
                    <td>
                    	<img src="{{ asset('assets/images/gallery/3.jpg') }}" alt="" height="42" class="img-fluid avatar-lg rounded">
                    </td>
                    <td>Health Insurance Services</td> 
                    <td class="text-wrap">Right health cover with best rate for student and other visa categories.</td> 
                    <td class="text-wrap">  <span class="badge bg-light rounded-pill text-primary"> Admission </span> </td>
                    <td><span class="badge bg-success rounded-pill">Publish</span></td> 
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="mdi mdi-eye-outline"></i></a>
                        <a href="{{ url('/editblog') }}" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                    </td>
                </tr> 
            </tbody>
        </table>
    </div>
</div>

@endsection