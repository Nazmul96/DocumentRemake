@extends('admin.master')

@section('content')
 	<div class="card">
 		<div class="card-body table-responsive">
		   <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                <thead>
	                <tr>Reason						Action
	                    <th> Reason </th>
	                    <th> Reporters Email </th>
	                    <th> Message </th>
	                    <th> Reported On </th>
	                    <th> Ads Info </th>
	                    <th> Report Count </th> 
	                    <th> Action </th>
	                </tr>
                </thead>  
                <tbody>
                    <tr> 
                        <td> Spam </td>
                        <td> quantiklab@gmail.com </td> 
                        <td>  Test message report </td>
                        <td> 11/19/2020 2:45 PM </td>
                        <td><a href="#" class="badge btn-success">View Ads</a></td>
                        <td>  
                        	3
                        </td>
                        <td> 
                        	<button type="button" class="btn btn-sm btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
                        </td>
                    </tr>  
                    <tr> 
                        <td> Fraud </td>
                        <td> dsds@gmail.com </td> 
                        <td>    Maessage report </td>
                        <td> 12/19/2020 1:33 PM </td>
                        <td><a href="#" class="badge btn-success">View Ads</a></td>
                        <td>  
                        	44
                        </td>
                        <td> 
                        	<button type="button" class="btn btn-sm btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
                        </td>
                    </tr> 
                    
                </tbody>
            </table>
 		</div>
 	</div>
@endsection
