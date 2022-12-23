@extends('admin.master')

@section('content')

<div class="card">
    <div class="card-body">
<form class="" method="POST" action="{{ route('Pdf.image.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="col-md-12">
            <div class="position-relative form-group">
                <label for="details" class="">Images</label>
                <div class="needsclick dropzone" id="document-dropzone"></div>
            </div>
        </div>
    </div>
    <div id="images"></div>
    <button class="mt-2 btn btn-primary">Submit</button>
</form>
 </div>
</div>

<script>
    let uploadedDocumentMap = {};
    Dropzone.autoDiscover = false;
    let myDropzone = new Dropzone("div#document-dropzone",{
        url: "{{ route('Pdf.uploadImageViaAjax') }}",
        autoProcessQueue: true,
        uploadMultiple: true,
        addRemoveLinks: true,
        parallelUploads: 10,
        acceptedFiles: '.doc,.docx,',
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        successmultiple: function(data, response) {
        let newname = response.name;
            if(newname.length > 0){
                for(var i = 0; i < newname.length; i++ ){
                    document.getElementById("images").innerHTML += '<input type="hidden" name="files[]" value="' + newname[i] + '"><input type="hidden" name="original_name[]" value="' + response.original_name[i] + '">'
                    uploadedDocumentMap[data[i].name] = newname[i]; 
                }
            }
        },
        removedfile: function (file) {
            file.previewElement.remove()
            let name = '';
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name;
            } else {
                name = uploadedDocumentMap[file.name];
            }
            $('form').find('input[name="files[]"][value="' + name + '"]').remove()
        }
    });
</script>

@endsection