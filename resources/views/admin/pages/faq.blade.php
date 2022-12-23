@extends('admin.master')

@section('content')
<div class="mb-4 text-end">
	<a class="btn btn-primary" href="{{ url('/addfaq') }}"><i class="mdi mdi-plus"></i> Add New Faq</a>
</div>
<div class="card">
    <div class="card-body">
        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Answare</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
               <tr>
					<td class="text-wrap">
						I would like to change my course/ university. What should I do?
					</td>
					<td class="text-wrap">
						Please keep in mind that the process involved in changing a course or a university has to strictly meet the standards that apply to your Student Visa to avoid the apparent risks of Visa Cancellation.
					</td>

					<td>
                        <a href="#" class="btn btn-sm btn-success"><i class="mdi mdi-file-edit-outline"></i></a>
						<a href="#" id="delete" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
					</td>
				</tr>
                				 
            </tbody>
        </table>
    </div>
</div>

@endsection