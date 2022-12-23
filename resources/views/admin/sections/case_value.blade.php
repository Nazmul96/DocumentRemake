@extends('admin.master')

@section('content')

<div class="card">
        @if(session()->has('success'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('success') }}
            </div>
        @endif
    <a href="{{route('backend.sectionwisecase',$section_data->id)}}" class="p-2">{{$section_data->sections_name}}</a>  
    <div class="card-body">
        <form class="px-3" action="{{ route('backend.case-value-save') }}" method="post" enctype="multipart/form-data" id="insert_setting_data">
            <input type="hidden" value="{{$case_id}}" name="case_id">
            @csrf
            <h3 style="text-align:center;">Enter Case Values</h3><br>


              @if(!empty($template_variable))
                
                @foreach($template_variable as $key=>$template_variables)
                    @php
                            $case_value=DB::table('case_values')->where('case_id',$case_id)->where('variable_id',$template_variables['id'])->get()->toArray();
                    @endphp
                <div class="dataInsight" style="margin-top:15px;">
                    <div class="row addSetting" id="itemNo1" data-id="1">
                        <input type="hidden" name="template_variable_id[]" value="{{$template_variables['id']}}">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <span>{{$template_variables['description']}}</span>
                                </div>
                                <div class="col-md-4">
                                    <span>{{$template_variables['variable']}}</span>
                                </div>

                                <div class="col-md-4">
                                    <label for="CategoryName" class="form-label">Value</label>
                                    <input class="form-control" name="value[]" @if(!empty($case_value)) value="{{$case_value[0]->case_value}}" @endif></input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
               <br>
               <div class="mb-3 text-center">
                <button class="btn btn-primary" type="submit">Save</button>
               </div>  
             @else
                <h4>This section has no template variable</h4>   
             @endif   
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

    // $(document).ready(function() {
    //     $('#insert_settings').click(function(e) {
    //         e.preventDefault();

    //         let form = $('#insert_setting_data').serialize();
  
    //         $.ajax({
    //             url: "{{ route('backend.case-value-save',$section_data->id) }}",
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             method: "POST",
    //             data: form,
    //             dataType: 'json',
    //             success: function(data) {
    //                 var error = data.error;
    //                 var success = data.success;
                    
    //                 for(var i=0;i<error.length;i++){
    //                     var error_show = '<p class="errorClass" style="color:red;">This word Already esist !</p>';
    //                    $('#itemNo'+error[i]).append(error_show);
    //                 }
    //                 var success_event = '<p style="color:green;">'+success+' Words Inserted Succesfully !</p>';
    //                 $('.succes_content').html(success_event);
    //                 $('#myModal').modal('show');
    //             }
    //         });

    //     });
    // });
</script>
@endsection