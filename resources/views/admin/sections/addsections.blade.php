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
        <form method="POST" action="{{route('backend.savesections')}}">
            @csrf
          <div class="form-group">
            <label for="section_name">Section Name</label>
            <input type="text" class="form-control" id="section_name" name="section_name"  placeholder="Section Name">
          </div>
            <div class="form-group">
                <br>
          <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
    </div>
</div>
@endsection