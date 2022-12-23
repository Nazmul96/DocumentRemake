@extends('admin.master')
@section('page')
    <h4 class="page-title-main">Edit Section</h4>
@endsection

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
        <form method="POST" action="{{route('backend.updatesections',$section['id'])}}">
            @csrf
          <div class="form-group">
            <label for="section_name">Section Name</label>
            <input type="text" class="form-control" id="section_name" name="sections_name" value="{{ $section['sections_name'] }}"  placeholder="Section Name">
            @error('sections_name')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
            @if(session()->has('section_exist'))
                <strong class="text-danger">
                    {{session()->get('section_exist')}}
                </strong>
            @endif
          </div>
            <div class="form-group">
                <br>
          <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
    </div>
</div>
@endsection