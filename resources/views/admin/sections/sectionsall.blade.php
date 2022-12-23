@extends('admin.master')

@section('content')
<div class="card">
    @if(session()->has('success'))
    <div class="alert alert-danger" style="text-align: center;">
        {{ session()->get('message') }}
    </div>
    @endif
    @if(session()->has('done'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('message') }}
    </div>
    @endif

    <div class="card-body">
        <div class="row mb-2">
            <form method="POST" action="{{route('backend.savesections')}}">
                @csrf
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="section_name">Section Name</label>
                        <div class="d-flex g-3">
                                <input type="text" class="form-control" id="section_name" name="sections_name" placeholder="Section Name">
                               <div class="ms-2 w-100">
                                    <button type="submit" class="btn btn-primary">Add Section</button>
                               </div>
                        </div>
                        @error('sections_name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        @if(session()->has('section_exist'))
                            <strong class="text-danger">
                                {{session()->get('section_exist')}}
                            </strong>
                        @endif
                    </div>

                </div>
            </form>
        </div>
        <!-- <a href="{{route('backend.addsections')}}" class="btn btn-primary float-end mb-2">Add Section</a> -->
        <table id="datatable" class="table table-bordered table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th> SL </th>
                    <th> Sections Name </th>
                    <th> Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php $i = 0; ?>
                @foreach($sections as $section)
                <?php $i++; ?>
                <tr>
                    <td><?= $i ?></td>
                    <td> <a href="{{route('backend.sectionwisecase',$section['id'])}}">{{strtoupper($section['sections_name'])}}</a></td>
                    <td>
                        <a href="{{route('backend.editsections',$section['id'])}}" class="btn btn-sm btn-success  waves-effect waves-light"><i class="mdi mdi-tooltip-edit"></i></a>
                        <a href="{{route('backend.deletesections',$section['id'])}}" class="btn btn-sm btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></a>
                        <a href="{{route('backend.sectionwisecase',$section['id'])}}" class="btn btn-sm btn-info waves-effect waves-light">cases</a>
                        <!-- <a href="{{route('backend.all-template',$section['id'])}}" class="btn btn-sm btn-primary waves-effect waves-light">Templates</a> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection