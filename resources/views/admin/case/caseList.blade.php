@extends('admin.master')

@section('content')

<div class="card">
    <div class="card-body">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
           @endif
           @if(Session::has('danger'))
                <div class="alert alert-danger">
                    {{ Session::get('danger') }}
                </div>
           @endif 
          <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Case Name</th>
                    <th>Date Created</th>
                    <th>Client Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                   @foreach($case as $cases) 
                    <tr>
                        <td>{{$cases->email}}</td>
                        <td>{{$cases->phone}}</td>
                        <td>{{$cases->case_name}}</td>
                        <td>{{date('d/m/Y',strtotime($cases->created_at))}}</td>
                        <td>{{$cases->client_first_name.' '.$cases->client_last_name}}</td>
                        <td>
                            <a href="{{ route('case.edit-case',$cases->id)}}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ route('case.case-delete',$cases->id)}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                  @endforeach  
                </tbody>
           </table>

    </div>
</div>    

@endsection