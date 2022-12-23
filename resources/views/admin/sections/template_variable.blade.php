@extends('admin.master')

@section('page')
    <h4 class="page-title-main">Template Variable</h4>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
  @if(session()->has('success'))
        <div class="alert alert-success" style="text-align: center;">
            {{ session()->get('success') }}
        </div>
  @endif
  @if(session()->has('variable_delete'))
        <div class="alert alert-danger" style="text-align: center;">
            {{ session()->get('variable_delete') }}
        </div>
  @endif 
  @if(Session::has('section_id'))
    <div class="section_name mb-3">
        <b class="">SECTION {{strtoupper(Session::get('section_name'))}}</b>
    </div>
  @endif
 
  <form class="px-3"  method="post" id="update_template_variable">
    @csrf
    @if(!empty($template_variable))
    
      @foreach($template_variable as $template_variables)
                
        <div class="dataInsight" style="margin-top:15px;">
            <div class="row addSetting" id="itemNo1" data-id="1">
            <input type="hidden" name="id[]" value="<?=$template_variables['id']?>">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="CategoryName" class="form-label">Description</label>
                            <textarea cols="30" rows="2" class="form-control" type="text" name="description[]">{{$template_variables['description']}}</textarea>
                           
                        </div>
                        <div class="col-md-5">
                            <label for="CategoryName" class="form-label">Variable</label>
                            <input class="form-control" type="text" name="variable[]" value="{{$template_variables['variable']}}">
                            <span class="word_errors word_error<?=$template_variables['id']?>" style="display:none;"> 
                                <p style="color:red;" colspan="4">This Variable found duplicate!</p> 
                             </span>
                        </div>
                        <div class="col-md-1 mt-1">
                               <label for="">&nbsp;</label>
                                <a class="btn btn-danger" href="{{route('backend.variable-delete',$template_variables['id'])}}">X</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
            <input type="hidden" name="section_id" value="{{$section_id}}">
            <div class="addSetting">
                <div class="row dataInsight ml-2" id="itemNo1" data-id="1">
                    <input type="hidden" name="id[]" value="">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="CategoryName" class="form-label">Description</label>
                                <textarea required="" class="form-control" name="description[]" id="" cols="30" rows="2"></textarea>
                            </div>
                            <div class="col-md-5">
                                <label for="CategoryName" class="form-label">Variable</label>
                                <input required="" class="form-control" type="text" name="variable[]">
                                @error('variable')
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
                <button class="btn btn-primary" type="button" id="update_variable">Save</button>
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
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
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

    $(document).ready(function(){
       $('#update_variable').click(function(e){
          
        e.preventDefault();
        $('.remove_text').text('');
        let form = $('#update_template_variable').serialize();

        $.ajax({
            url: "{{route('backend.save-template-variable') }}",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            data: form,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var error = data.error;
                var success = data.success;
       
                for(var i=0;i<error.length;i++){
                    $('.word_error'+error[i]).show();
                }
                var x=0;
                var html='';
                $(".dataInsight").each(function( index ) {
                    if(data.insert_error)
                    {
                        for(x=0; x<data.insert_error.length; x++){
                            if(data.insert_error[x] == index){
                                console.log(index);
                                console.log(data.insert_error[x]);
                                $(this).append('<p class="text-danger text-center remove_text">This Variable found duplicate!</p>');
                            }
                        }
                    }
                });

                if((data.success) && (data.error.length == 0) && (data.insert_error.length == 0)){
                    var success_event = '<p style="color:green;">Some Variable Updated Succesfully !</p>';
                    $('.succes_content').html(success_event);
                    $('#myModal').modal('show'); 
                }


                
            }
        });

       });
    });
</script>
@endsection