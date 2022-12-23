@extends('admin.master')

@section('page')
<h4 class="page-title-main">Template Preview</h4>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <iframe src="http://docs.google.com/gview?url=http://documentremake.test/templetes/{{$templete->template_file}}&amp;embedded=true"></iframe>
    </div>
</div>
@endsection