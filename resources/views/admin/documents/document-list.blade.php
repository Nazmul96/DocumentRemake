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
        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
            <thead>
            <tr>
                <th> SL </th>
                <th> Orginal Document Name </th>
                <th> User Name </th>
                <th> Status</th>
                <th> Date </th>
                <th> Action </th>
            </tr>
            </thead>

            <tbody>
                <?php $i=0;?>
                @foreach($documents as $document)
                <?php $i++;?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$document['orginal_document_name']?></td>
                    <td><?=$document['get_user']['name']?></td>
                    <td><?php 
                        if(!empty($document['document_queue'])){
                            if($document['document_queue']['status'] == 1){ ?>
                                <span class="badge bg-info"><?php echo "Processing";?> </span>
                            <?php }else{ ?>
                                <span class="badge bg-danger"><?php echo "On Process";?> </span>
                            <?php }
                        }else{ ?>
                            <span class="badge bg-success"><?php echo "Processed";?> </span>
                        <?php }
                        ?>
                    </td>
                    <td><?php echo date('d-m-Y', strtotime($document['created_at']));?></td>
                    <td>
                        <a href="{{ asset('documents') }}/<?=$document['update_file']?>" class="btn btn-sm btn-success  waves-effect waves-light" download><i class="mdi mdi-download-circle"></i></a> 
                        <a href="{{route('Pdf.add-words.addWords', $document['id'])}}" class="btn btn-sm btn-primary waves-effect waves-light"><i class="mdi mdi-card-plus"></i></a> 
                        <a href="{{route('Pdf.document-delete.documentDelete', $document['id'])}}" class="btn btn-sm btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></a>
                    </td>
                </tr>  
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>

@endsection