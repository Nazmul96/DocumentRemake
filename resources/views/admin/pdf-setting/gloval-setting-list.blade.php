@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-12">
    	<div class="mb-4 text-end">
    		<a class="btn btn-primary" href="{{ route('Pdf.gloval-setting.glovalSetting') }}">
    			<i class="mdi mdi-plus"></i> Add New Words
    		</a>
    	</div>
        <div class="card">
            <div class="card-body table-responsive"> 
            <form class="px-3" method="post" enctype="multipart/form-data" id="update_setting_data">
            <!-- @csrf	 -->
                <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th> Sl </th>
                        <th> Variable Name </th>
                        <th> Value </th>
                        <th> Type </th>
                    </tr>
                    </thead>


                    <tbody>
                        <?php $i=0;
                          //echo "<pre>";print_r($words_details);die();
                        ?>
                        @foreach($words_details as $words)
                        <?php $i++;?>
	                    <tr>
	                        <td> <?=$i?> <input type="hidden" name="ids[]" value="<?=$words['id']?>"></td>
	                        <td> <input class="form-control" type="text" value="<?=$words['name']?>" name="word_name[]"></td>
	                        <td><input class="form-control" type="text" value="<?=$words['value']?>" name="word_value[]"></td>
	                        <td>
                                <select name="type[]" class="form-control">
                                    <option value="">--- Select One ---</option>
                                    <option value="1" <?php if($words['type']==1){echo "selected";}?>>All-Caps</option>
                                    <option value="2" <?php if($words['type']==2){echo "selected";}?>>Spouse Name In Caps</option>
                                    <option value="3" <?php if($words['type']==3){echo "selected";}?>>Never Changes Unless Signing Date</option>
                                </select>
                            </td>
	                    </tr>

                        <tr class="word_errors word_error<?=$words['id']?>" style="display:none;"> 
                            <td style="color:red;" colspan="4">This Word found duplicate !</td> 
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                <br>
                <div class="mb-3 text-right">
                    <button class="btn btn-primary" type="button" id="update_settings">Update</button>
                </div>
            </form>
            </div>
        </div>
       
    </div>
</div> <!-- end row -->

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
    $(document).ready(function(){
       $('#update_settings').click(function(e){
          
        e.preventDefault();
        
        let form = $('#update_setting_data').serialize();

        $.ajax({
            url: "{{ route('Pdf.gloval-setting-update.updateGlovalSetting') }}",
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
                var success_event = '<p style="color:green;">'+success+' Words Updated Succesfully !</p>';
                $('.succes_content').html(success_event);
                $('#myModal').modal('show');
            }
        });

       });
    });

    
</script>
@endsection
