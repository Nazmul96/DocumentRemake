@extends('admin.master')

@section('content')
<style>
    .fas{
        font-size: 40px;
    }
</style>
<div class="card">
    <div class="card-body">
        <div class="section_name mb-2">
            <b class="">SECTION {{strtoupper($section['sections_name'])}}</b>

            <a class="btn btn-primary btn-sm ms-3" href="{{route('case.add-case',$id)}}">
                <i class="mdi mdi-plus"></i> Add Cases
            </a>
            <a class="btn btn-primary btn-sm" href="{{ route('backend.add-variable',$id)}}">
                <i class="mdi mdi-plus"></i> Add Variables
            </a>

            <a class="btn btn-primary btn-sm" href="{{route('backend.upload-template',$id)}}">
                <i class="mdi mdi-plus"></i> Upload Templates
            </a>
        </div>
    </div>
</div>
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
        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th> SL </th>
                    <th> Case Name </th>
                    <th> Case Number </th>
                    <th> Action</th>

                </tr>
            </thead>

            <tbody>
                @foreach($case as $key=>$cases)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$cases->case_name}}</td>
                    <td>{{$cases->case_number}}</td>
                    <td>
                        <a href="{{route('backend.case-info',$cases->id)}}" class="btn btn-primary btn-sm">Case Info</a>
                        <a href="{{route('backend.enter-case-value',$cases->id)}}" class="btn btn-warning btn-sm">Enter Values</a>
                        <button type="button" class="btn btn-success current_docs" data-bs-toggle="modal" data-bs-target="#standard-modal">Current Docs</button>
                        <a href="" class="btn btn-primary btn-sm create_doc" data-id="{{$cases->id}}">Create Docs</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

<div class="modal fade" id="standard-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="myModal">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Create Docs Modal -->
<div class="modal fade" id="create_docs_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title show_section" id="myLargeModalLabel"></span>>><span class="show_case"></span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <input type="hidden" class="getcase_id">
            <div class="modal-body" id="myModals">
                
            </div>
            <div class="col-md-12 text-end p-2">
              <button type="button" class="btn btn-primary regernate_doc">Regenerate</button>
            </div>    
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<a href="{{asset('/templetes/')}}" alt="">
<script>
    $( document ).ready(function() {
         $('.current_docs').click(function(e){
            var section_id="<?php echo $section['id'];?>";
            $.ajax({
                url: "{{ route('backend.getCurrentDocs')}}",
                method: "get",
                data: {
                    section_id:section_id 
                },
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    var i=0;
                    var html='';
                    var url = $('meta[name="base_url"]').attr('content');
                    if(data.length > 0){
                         for(i=0; i<data.length; i++){
                            var path=url + '/templetes/' + data[i]['template_file'];
        
                            html+='<a class="p-2" title="'+data[i]['description']+'" href="'+path+'" alt=""><i class="fas fa-file-word"></i></a>';
                         }   
                    }
                    $('#myModal').html(html);
                }
            });
         });
         
         $(".create_doc").click(function(e){
                e.preventDefault();
                var case_id=$(this).data('id');
                var section_id="<?php echo $section['id'];?>";
                $.ajax({
                url: "{{route('backend.document-queue') }}",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "get",
                data: {
                    section_id:section_id,
                    case_id:case_id 
                },
                dataType: 'json',
                success: function(data) {
                    if(data.success == true)
                    {   
                        getCaseDocument(data.case_id,data.section_id);
                    }
                   
                }

            })   
         });

         function getCaseDocument(case_id,section_id){
            $.ajax({
                url: "{{route('backend.document-process-queue') }}",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "get",
                data: {
                    section_id:section_id,
                    case_id:case_id 
                },
                dataType: 'json',
                success: function(data) {
                    //console.log(data.case_id);
                    // console.log(data.case_data.casesections.sections_name);
                    // return false;
                    $('.show_section').text(data.case_data.casesections.sections_name);
                    $('.show_case').text(data.case_data.case_name);
                    $("#create_docs_modal").modal("show");
                    $("#myModals").html(data.output);
                    $('.getcase_id').val(data.case_id);
                    if(data.process_template != 0)
                    {
                        createDocument(data.case_data.id);
                    }
                }

            })
            
         }

         //Regernate document-----------------
       $('.regernate_doc').click(function(e){
            var case_id=$('.getcase_id').val();
            var regernerate='regenerate';
            createDocument(case_id,regernerate);
       });


         function createDocument(case_id,regernerate=null){
            $.ajax({
                url: "{{route('backend.create-doc') }}",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "get",
                data: {
                    case_id:case_id,
                    regernerate:regernerate 
                },
                dataType: 'json',
                success: function(data) {
                    
                    if(data.queue_case > 0){
                        $('.success_process').removeClass("text-danger");
                        $('.success_process').addClass("text-success");
                        if(data.regernerate == null)
                        {
                            $('.success_process').text("Process Done");
                            $('.success_process').append('<a type="button" class="btn btn-success btn-sm ms-2 download_doc">Download</a>');
                        }
                        else{ 

                            $('.success_process_new').html("Regernerated");  
                        }
                        
                    }

                    // $("#create_docs_modal").modal("show");
                    // $("#myModals").html(data.output);
                    // createDocument(data.case_id);
                }

            })
          
         }
    });

    //Download document file------------
    $( document ).on("click",".download_doc",function() {
    // $( "body" ).delegate(".download_doc","click", function() {
        // var downloadUrl="{{route('backend.document-download')}}";
        // window.location = downloadUrl;
        var case_id=$(this).parent().data('case');
        var template_id=$(this).parent().data('template')
        $.ajax({
                url: "{{route('backend.document-download') }}",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "get",
                data: {
                    template_id:template_id,
                    case_id:case_id 
                },
                dataType: 'json',
                success: function(response) {
                    var url = $('meta[name="base_url"]').attr('content');
                    var path=url + '/templetes/' + response.file_name;
                    window.open(path);
                 
                }

            })
       });

       

</script>
@endsection