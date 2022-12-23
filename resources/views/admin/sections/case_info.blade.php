@extends('admin.master')

@section('page')
    <h4 class="page-title-main">Case info</h4>
@endsection

@section('content')
<div class="card">
<a href="{{route('backend.sectionwisecase',$case_data->Casesections->id)}}" class="p-2">SECTION {{strtoupper($case_data->Casesections->sections_name)}}</a> 
    <div class="card-body">
         <div class="row">
            <div class="col-md-4">
                <b>Case Name: </b><span>{{$case_data->case_name}}</span><br> 
                <b>Case Number: </b><span>{{$case_data->case_number}}</span><br>
                <b>Email: </b><span>{{$case_data->email}}</span><br>
                <b>Phone: </b><span>{{$case_data->phone}}</span><br>
                <b>Client Name: </b><span>{{$case_data->client_first_name.' '.$case_data->client_last_name}}</span><br>
                <b>Client Address: </b><span>{{$case_data->client_address}}</span>
            </div>
            <div class="col-md-4">
                <b>Jurisdiction: </b><span>{{$case_data->jurisdiction}}</span><br> 
                <b>Parish: </b><span>{{$case_data->parish}}</span><br>
                <b>Company: </b><span>{{$case_data->company}}</span><br>
                <b>Note: </b><span>{{$case_data->note}}</span><br>
            </div>
         </div>
    </div>
</div>
@endsection