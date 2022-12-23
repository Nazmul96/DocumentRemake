@extends('admin.master')

@section('page')
    <h4 class="page-title-main">Add Case</h4>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        @if(Session::has('section_id'))
            <div class="section_name mb-3">
                <b class="">SECTION {{strtoupper(Session::get('section_name'))}}</b>
            </div>
        @endif
        
        <form action="{{ route('case.save-case')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{session()->get('user_id')}}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Case Name</label>
                        <input type="text" placeholder="Case Name" name="case_name" class="form-control">
                    </div>
                    @error('case_name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Jurisdiction</label>
                        <input type="text" placeholder="Jurisdiction" name="jurisdiction"  class="form-control">
                    </div>
                </div>
                
            </div><br>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Parish</label>
                        <input type="text" placeholder="Parish" name="parish" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Case Number</label>
                        <input type="number" placeholder="Case Number" name="case_number"  class="form-control">
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
                        <input type="text" placeholder="Client First Name" name="client_first_name" class="form-control">
                    </div>
                    @error('client_first_name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Client Last Name</label>
                        <input type="text" placeholder="Client Last Name" name="client_last_name"  class="form-control">
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
                        <input type="text" placeholder="Client Address" name="client_address" class="form-control">
                    </div>
                    @error('client_address')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Company</label>
                        <input type="text" placeholder="Company" name="company"  class="form-control">
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
                        <input type="email" placeholder="Email" name="email" class="form-control">
                    </div>
                    @error('email')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Phone</label>
                        <input type="number" placeholder="Phone" name="phone"  class="form-control">
                    </div>
                </div>
            </div><br>
           <div class="row">
             @if(isset($section_data))
              <div class="col-md-6"> 
                    <input type="text" name="section_name" class="form-control" autocomplete="off" value="{{$section_data->sections_name}}" readonly>
                    <input type="hidden" name="section_id" value="{{$section_data->id}}">
                    <input type="hidden" name="casewise_section" value="1">
              </div>
             @else
                <div class="col-md-6">
                    <label for="">Case Section</label>
                    <input type="text" name="section_name" id="case_section" class="form-control" autocomplete="off">
                    <input type="hidden" id="section_id" name="section_id">
                    <div id="section_list"></div>
                </div>
             @endif   
            <div class="col-md-6">
                    <div class="form-froup">
                        <label for="">Notes</label>
                        <textarea name="note" id="" cols="30" rows="5" class="form-control"></textarea>
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