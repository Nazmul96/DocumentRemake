@extends('admin.master')

@section('content')

<div class="card">
    <div class="card-body">
    <form action="{{ route('Pdf.save-document-upload.saveDocumentUpload') }}" class="dropzone" id="upload-widget">
    @csrf
        <div id="img_upload_msg">
        </div>
        <div class="fallback">
            <input name="file" type="file"/>

        </div>
        
    </form>

    <br>
    <div class="mb-3 text-center">
        <button class="btn btn-primary" type="button" id="dropzone_submit_btn">Save</button>
    </div>
    </div>
</div>
<!-- <form action="{{ route('Pdf.save-document-upload.saveDocumentUpload') }}" method="POST">
    @csrf
    <input type="file" multiple name="files[]">
    <input type="submit" value="Submit">
</form> -->

<script>
    Dropzone.options.uploadWidget = {
    paramName: 'file',
    maxFilesize: 50, //MB 
    maxFiles: 50, //photo quantity
    autoProcessQueue: false,
    dictDefaultMessage: 'Drag an image here to upload, or click to select one',
    acceptedFiles: '.doc,.docx,',
    init: function () {

        var xxx = this;
        $("#dropzone_submit_btn").on("click", function (e) {
            e.preventDefault();
            var filesInQueue = xxx.getQueuedFiles().length;
            console.log(filesInQueue);
           // return;
            if (filesInQueue == 0) {
                $('#img_upload_error_msg').html('please select at least one file');
            } else {
            
                xxx.processQueue();
            }
        });
        this.on('success', function (file, resp) {
            if (resp == 0) {
                $('#img_upload_error_msg').html('image not uploaded');
            } else {
                //location.reload(true);
              //  var url = "{{ route('Pdf.document-list.documentList') }}";
               // window.location.href = url;
            }
            
        });
        // this.on('error', function (file, resp) {
        //     $('#img_upload_msg').html('The image width minimum  50px and height minimum 50px');
        // });
        
        // this.on('thumbnail', function (file) {
        //     if (file.width < 50 || file.height < 50) {
        //         file.rejectDimensions();
        //     }
        //     else {
        //         file.acceptDimensions();
        //     }
        // });
    },
    // accept: function (file, done) {
    //     file.acceptDimensions = done;
    //     file.rejectDimensions = function () {
    //         done('The image width minimum 50px and height minimum 50px');
    //     };
    // }
    };
</script>

@endsection