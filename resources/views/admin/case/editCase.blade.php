@extends('admin.master')

@section('page')
    <h4 class="page-title-main">Edit Case</h4>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{route('case.case-update',$case_edit->id)}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Case Name</label>
                        <input type="text" placeholder="Case Name" name="case_name" class="form-control" value="{{$case_edit->case_name}}">
                    </div>
                    @error('case_name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Jurisdiction</label>
                        <input type="text" placeholder="Jurisdiction" name="jurisdiction"  class="form-control" value="{{$case_edit->jurisdiction}}">
                    </div>
                </div>
                
            </div><br>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Parish</label>
                        <input type="text" placeholder="Parish" name="parish" class="form-control" value="{{$case_edit->parish}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Case Number</label>
                        <input type="number" placeholder="Case Number" name="case_number"  class="form-control" value="{{$case_edit->case_number}}">
                        @error('case_number')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
            </div><br>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Client First Name</label>
                        <input type="text" placeholder="Client First Name" name="client_first_name" class="form-control" value="{{$case_edit->client_first_name}}">
                    </div>
                    @error('client_first_name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Client Last Name</label>
                        <input type="text" placeholder="Client Last Name" name="client_last_name"  class="form-control" value="{{$case_edit->client_last_name}}">
                    </div>
                    @error('client_last_name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div><br>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Client Address</label>
                        <input type="text" placeholder="Client Address" name="client_address" class="form-control" value="{{$case_edit->client_address}}">
                    </div>
                    @error('client_address')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Company</label>
                        <input type="text" placeholder="Company" name="company"  class="form-control" value="{{$case_edit->company}}">
                    </div>
                    @error('company')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div><br>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Email</label>
                        <input type="email" placeholder="Email" name="email" class="form-control" value="{{$case_edit->email}}">
                    </div>
                    @error('email')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Phone</label>
                        <input type="number" placeholder="Phone" name="phone"  class="form-control" value="{{$case_edit->phone}}">
                    </div>
                </div>
            </div><br>
           <div class="row">
                <div class="col-md-6">
                    <label for="">Case Section</label>
                    <input type="text" name="section_name" id="case_section" class="form-control" autocomplete="off" value="{{$case_edit->Casesections->sections_name}}">
                    <input type="hidden" id="section_id" name="section_id" value="{{$case_edit->Casesections->id}}">
                    <div id="section_list"></div>
                </div>
                <div class="col-md-6">
                        <div class="form-froup">
                            <label for="">Notes</label>
                            <textarea name="note" id="" cols="30" rows="5" class="form-control">{{$case_edit->note}}</textarea>
                        </div>
                </div>
           </div><br>
            <div class="mb-3 text-center">
                <button class="btn btn-primary" type="submit" id="dropzone_submit_btn">Save</button>
            </div>
                
        </form>  
    </div>
</div>
<script>
      $(document).ready(function(){
          $('#case_section').on('keyup',function () {
                var query = $(this).val();
                $.ajax({
                    url:"{{route('case.section_search')}}",
                    type:'GET',
                    data:{'section_name':query},
                    success:function (data) {
                        $('#section_list').html(data);
                    }
                })
            });

            $(document).on('click', 'li', function(){
                var value = $(this).text();
                var id = $(this).attr('data-id');
                $('#case_section').val(value);
                $('#section_id').val(id);
                $('#section_list').html("");
            });
      });
</script>
@endsection