@extends('admin.master')

@section('content')

<div class="row">
    <div class="col-12">
    	<div class="mb-4 text-end">
    		<a class="btn btn-primary" href="{{ route('backend.add-brand.addBrand') }}"><i class="mdi mdi-plus"></i> Add New Brand</a>
    	</div>
        @if(Session::has('message'))
        <div class="alert alert-success" style="text-align: center;">
            {{ Session::get('message') }}
        </div>
        @endif
        <div class="card">
            <div class="card-body table-responsive"> 
                <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Brand Name</th> 
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach($brands as $brand)
	                    <tr>
	                        <td><img src="{{ asset('images/brands/thumbnail') }}/<?=$brand['brand_image']?>" alt="image" class="img-fluid avatar-md rounded"></td> 
	                        <td><?=$brand['brand_name']?></td> 
	                        <td> 
                                <?php 
                                if($brand['status'] ==1 ){
                                ?>
                                    <span class="badge bg-success"> Active </span>
                                <?php }else{?>
                                    <span class="badge bg-danger"> Active </span>
                                <?php }?>
                            </td>
	                        <td>
	                        	<a href="{{route('backend.brand-edit.brandEdit', $brand['id'])}}" class="btn btn-sm btn-primary waves-effect waves-light"><i class="mdi mdi-square-edit-outline"></i></a> 
	                        	<button type="button" class="btn btn-sm btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
	                        </td>
	                    </tr> 
	                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       
    </div>
</div> <!-- end row -->
<div id="addcatagory" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    	
        <div class="modal-content">
        	<div class="modal-header">
	            <h4 class="modal-title" id="standard-modalLabel">Add Brand </h4>
	            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	        </div>
            <div class="modal-body">
                <form class="px-3" action="#">
                    <div class="mb-3">
                        <label for="CategoryName" class="form-label">Brand Name</label>
                        <input class="form-control" type="text" id="CategoryName" required="" placeholder=" ">
                    </div>
 
                    <div class="mb-3">
                        <label class="form-label">Brand Image / Icon</label>
                         <input type="file"  class="imageupload" name="">
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Add Brand</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection