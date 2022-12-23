@extends('admin.master')

@section('content')
<div class="card">
    <div class="card-body">
        <form class="px-3" action="{{ route('Pdf.gloval-setting-save.saveGlovalSetting') }}" method="post" enctype="multipart/form-data" id="insert_setting_data">
            @csrf
            <h3 style="text-align:center;">Global Settings</h3>
            <div class="dataInsight">
                <div class="row addSetting" id="itemNo1" data-id="1">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="CategoryName" class="form-label">Name</label>
                                <input class="form-control" type="text" id="word_name" placeholder="" name="word_name[]">
                                @error('brand_name')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="CategoryName" class="form-label">Value</label>
                                <input class="form-control" type="text" id="word_value" placeholder="" name="word_value[]">
                                @error('brand_name')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="CategoryName" class="form-label">Type</label>
                                <select name="type[]" class="form-control" required>
                                    <option value="">--- Select One ---</option>
                                    <option value="1">All-Caps</option>
                                    <option value="2">Spouse Name In Caps</option>
                                    <option value="3">Never Changes Unless Signing Date</option>
                                </select>
                                @error('brand_name')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div style="margin-top:30px;display:flex;gap:5px;">
                            <button class="btn btn-primary addInsight" type="button">Add More</button>
                            <button class="btn btn-danger removeInsight" type="button">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="mb-3 text-center">
                <button class="btn btn-primary" type="button" id="insert_settings">Save</button>
            </div>
        </form>
    </div>
</div>

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="text-align:center;">Insert Status</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body succes_content" style="text-align:center">
  
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<script>
    $('.dataInsight').multifield({
        section: '.addSetting',
        btnAdd: '.addInsight',
        btnRemove: '.removeInsight',
        max: 6,
        locale: 'default'
    });

    $(document).ready(function() {
        $('#insert_settings').click(function(e) {
            // alert('hello');
            e.preventDefault();

            let form = $('#insert_setting_data').serialize();

            $.ajax({
                url: "{{ route('Pdf.gloval-setting-save.saveGlovalSetting') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                data: form,
                dataType: 'json',
                success: function(data) {
                    var error = data.error;
                    var success = data.success;
                    
                    for(var i=0;i<error.length;i++){
                        var error_show = '<p class="errorClass" style="color:red;">This word Already esist !</p>';
                       $('#itemNo'+error[i]).append(error_show);
                    }
                    var success_event = '<p style="color:green;">'+success+' Words Inserted Succesfully !</p>';
                    $('.succes_content').html(success_event);
                    $('#myModal').modal('show');
                }
            });

        });
    });
</script>
@endsection