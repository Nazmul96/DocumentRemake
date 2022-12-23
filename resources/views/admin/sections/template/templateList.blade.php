@extends('admin.master')

@section('page')
<h4 class="page-title-main">Template List</h4>

@endsection

@section('content')
<div class="card">
    @if(session()->has('success'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('success') }}
    </div>
    @endif
    @if(session()->has('template_delete'))
    <div class="alert alert-danger" style="text-align: center;">
        {{ session()->get('template_delete') }}
    </div>
    @endif
    <div class="section_name mb-3 p-3">
        @if(Session::has('section_id'))
        <b class="me-5">SECTION {{strtoupper(Session::get('section_name'))}}</b>
        @endif

        <a class="btn btn-primary btn-sm" href="{{route('backend.allsections',$section_id)}}">
            <i class="mdi mdi-skip-backward-outline"></i> Back To Section
        </a>
        <a class="btn btn-primary btn-sm active" href="">
            Section Templates
        </a>
        <a class="btn btn-primary btn-sm" href="{{route('backend.upload-template',$section_id)}}">
            <i class="mdi mdi-plus"></i> Upload Section Templates
        </a>
    </div>
    <div class="card-body table-responsive">
        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th> SL </th>
                    <th> Description </th>
                    <th> Templete </th>
                    <th> Date Added</th>
                    <th> Action </th>
                </tr>
            </thead>

            <tbody>

                @foreach($templetes as $key=>$templete)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$templete['description']}}</td>
                    <td>{{$templete['template_file']}}</td>
                    <td>{{date('d/m/Y',strtotime($templete['created_at']))}}</td>
                    <td>
                        <!-- <a class="btn btn-primary" href="{{asset('/templetes/'.$templete['template_file'])}}" target="_blank"><i class="far fa-file-pdf"></i>
                        </a> -->
                        <a class="btn btn-primary" href="{{route('backend.templete-preview', $templete['id'])}}"><i class="far fa-file-pdf"></i>
                        </a>
                        <a class="btn btn-danger" href="{{route('backend.templete-delete.templeteDelete', $templete['id'])}}"><i class="mdi mdi-trash-can-outline"></i>
                        </a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection