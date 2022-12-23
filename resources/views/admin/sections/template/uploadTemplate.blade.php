@extends('admin.master')

@section('page')
<h4 class="page-title-main">Add Template</h4>

@endsection

@section('content')
<div class="card">
    <div class="card-body">

        <div class="section_name mb-3">
            @if(Session::has('section_id'))
            <b class="me-5">SECTION {{strtoupper(Session::get('section_name'))}}</b>
            @endif
            <a class="btn btn-primary btn-sm" href="{{route('backend.allsections',$data['id'])}}">
                <i class="mdi mdi-skip-backward-outline"></i> Back To Section
            </a>
            <a class="btn btn-primary btn-sm" href="{{route('backend.all-template',$data['id'])}}">
                Section Templates
            </a>

            <a class="btn btn-primary btn-sm active" href="">
                <i class="mdi mdi-plus"></i> Upload Section Templates
            </a>
        </div>
        <form action="" method="post" enctype="multipart/form-data" id="upload_template">
            @csrf  
            <div class="addSetting">
                <div class="row dataInsight ml-2" id="itemNo1" data-id="1">
                    <div class="col-md-9">
                        <div class="row">
                            <input type="hidden" name="section_id" value="{{$data['id']}}">
                            <div class="col-md-6 description_error">
                                <label for="">Description</label>
                                <input type="text" name="description[]" class="form-control description" placeholder="description">
                                @error('description')
                                 <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div><br>
                            <div class="col-md-5 template_file_error">
                                <label for="">Upload</label>
                                <input type="file" name="templatefiles[]" class="form-control template_file" accept=".docx">
                                @error('template_file')
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
            <button type="button" class="btn btn-primary template_upload">Submit</button>
        </form>
    </div>
</div>

<script>
    $('.addSetting').multifield({
        section: '.dataInsight',
        btnAdd: '.addInsight',
        btnRemove: '.removeInsight',
        max: 6,
        locale: 'default'
    });

    $('.template_upload').click(function(e){
        var check_submit=0;
        $(".description").each(function( index ) {
              if($(this).val() == ''){
                check_submit+=1;
                $(this).parent().find('span').html('');
                $(this).parent().append('<span class="text-danger">The descripton field is required</span>');
              }
              else{
                $(this).parent().find('span').remove();
              }
        });

        $(".template_file").each(function( index ) {
              if($(this).val() == ''){
                check_submit+=1;
                $(this).parent().find('span').html('');
                $(this).parent().append('<span class="text-danger">The template file field is required</span>');
              }
              else{
                 $(this).parent().find('span').remove();
              }
        });

        if(check_submit != 0){
            return false;
        }
        else
        {
            var fromData = new FormData(document.getElementById("upload_template"));
            $.ajax({
                url: "{{route('backend.template-uploads')}}",
                type: "POST",
                data: fromData,
                cache: false,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(response) {
                    if(response.success == true){
                        let url = "{{ route('backend.all-template',':id')}}";
                        url = url.replace(':id',response.section_id);
                        document.location.href=url;
                    }
                    $(".error_show").text('');
                    var i=0;
                    var description=[];
                    var templatefiles=[];
                    if(response.keys.length > 0){
                        for(i=0; i<response.keys.length; i++){

                            var splits_array=response.keys[i].split(".");
                            if(splits_array[0] == 'description')
                            {
                                description.push(splits_array[1]);
                            }
                            else
                            {
                                templatefiles.push(splits_array[1])
                            }
                            // 
                        }
                    }
                    // console.log(description);
                    // console.log(templatefiles);
                    // return false;
                    if(description.length > 0){
                        var j=0;
                        for(j=0; j<description.length; j++){

                            $(".description").each(function( index ) {
                            
                                if(index == description[j])
                                {
                                    $(this).parent().find('span').html('');
                                    $(this).parent().append('<span class="text-danger error_show">The descripton field is required</>');
                                }
                            });
                        }
                    }

                    if(templatefiles.length > 0){
                        var j=0;
                        for(j=0; j<templatefiles.length; j++){

                            $(".template_file").each(function( index ) {
                            
                                if(index == templatefiles[j])
                                {
                                    $(this).parent().find('span').html('');
                                    $(this).parent().append('<span class="text-danger error_show">The templatefiles field is required docx extenson file</>');
                                }
                            });
                        }
                    }
                   
                    //console.log(description);
                    // $('#updateTask').modal("hide");
                    // window.location.reload();
                },
                error: function(response) {
                    
                    //console.log(response.responseJSON.errors);
                    // $('.titleError').text(response.responseJSON.errors.title);
                    // $('.categoryError').text(response.responseJSON.errors.category_id);
                }
            });  
        }

    });

</script>
@endsection