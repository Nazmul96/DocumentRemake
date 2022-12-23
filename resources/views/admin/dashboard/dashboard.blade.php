@extends('admin.master')

@section('content')
<div class="row"> 

    @foreach($sections as $section)
    <div class="col-md-4 col-sm-3">
        <div class="card">
            <div class="card-body">  
                <h4 class="header-title mt-0 mb-4"><a href="{{route('backend.sectionwisecase',$section['id'])}}">{{ $section['sections_name'] }}</a></h4> 
                <div class="widget-chart-1">
                    <div class="  float-start " dir="ltr">
                       <div class="btn btn-soft-primary waves-effect waves-light fs-40">
                           <i class="mdi mdi-cash-multiple"></i>
                       </div>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> {{ $section['count'] }}</h2>
                        <p class="text-muted mb-1">Total Cases</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
       @endforeach
    <!-- end col
    
    <div class="col-md-4 col-sm-3">
        <div class="card">
            <div class="card-body">  
                <h4 class="header-title mt-0 mb-4">Customers</h4> 
                <div class="widget-chart-1">
                    <div class="  float-start " dir="ltr">
                       <div class="btn btn-soft-success waves-effect waves-light fs-40">
                           <i class="mdi mdi-account-group-outline"></i>
                       </div>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> 340 </h2>
                        <p class="text-muted mb-1">Total Customers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-3">
        <div class="card">
            <div class="card-body">  
                <h4 class="header-title mt-0 mb-4">Ads</h4> 
                <div class="widget-chart-1">
                    <div class="  float-start " dir="ltr">
                       <div class="btn btn-soft-info waves-effect waves-light fs-40">
                           <i class="mdi mdi-cash-multiple"></i>
                       </div>
                    </div> 
                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> 541 </h2>
                        <p class="text-muted mb-1">Total Ads</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-3">
        <div class="card">
            <div class="card-body">  
                <h4 class="header-title mt-0 mb-4">Pending</h4> 
                <div class="widget-chart-1">
                    <div class="  float-start " dir="ltr">
                       <div class="btn btn-soft-warning waves-effect waves-light fs-40">
                           <i class="mdi mdi-cash-multiple"></i>
                       </div>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> 223 </h2>
                        <p class="text-muted mb-1">Pending Ads</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="col-md-4 col-sm-3">
        <div class="card">
            <div class="card-body">  
                <h4 class="header-title mt-0 mb-4">Active</h4> 
                <div class="widget-chart-1">
                    <div class="  float-start " dir="ltr">
                       <div class="btn btn-soft-pink waves-effect waves-light fs-40">
                           <i class="mdi mdi-cash-multiple"></i>
                       </div>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> 321</h2>
                        <p class="text-muted mb-1">Active Ads</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-3">
        <div class="card">
            <div class="card-body">  
                <h4 class="header-title mt-0 mb-4">Featured</h4> 
                <div class="widget-chart-1">
                    <div class="  float-start " dir="ltr">
                       <div class="btn btn-soft-danger waves-effect waves-light fs-40">
                           <i class="mdi mdi-cash-multiple"></i>
                       </div>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> 43 </h2>
                        <p class="text-muted mb-1">Featured Ads</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  end col -->

    <!-- end col --> 
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">  
                <h4 class="header-title mt-0 mb-4">Case List</h4> 
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Case Name</th>
                            <th>Date Created</th>
                            <th>Client Name</th>
                        </tr>
                        </thead>
                        <tbody>
                           @foreach($cases as $case) 
                            <tr>
                                <td>{{$case->email}}</td>
                                <td>{{$case->phone}}</td>
                                <td>{{$case->case_name}}</td>
                                <td>{{date('d/m/Y',strtotime($case->created_at))}}</td>
                                <td>{{$case->client_first_name.' '.$case->client_last_name}}</td>
                            </tr>
                           @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
 

</div>
<!-- end row -->
@endsection