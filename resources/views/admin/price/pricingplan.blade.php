@extends('admin.master')

@section('content')
<div class="mb-4 text-end">
	<a class="btn btn-primary" href="{{ url('/addplan') }}">
		<i class="mdi mdi-plus"></i> Add Plan
	</a>
</div>
 <div class="row mt-2 justify-content-center">
    <div class="col-lg-10">
        <div class="row">
        	<article class="pricing-column col-md-4">
            <div class="card">
                <div class="inner-box card-body">
                    <div class="plan-header p-3 text-center">
                        <h3 class="plan-title">Basic</h3>
                        <h2 class="plan-price fw-normal">$19</h2>
                        <div class="plan-duration">Per Month</div>
                    </div>
                    <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                        <li>5 Ads Limit</li>
                        <li>2 Featured Ads Limit</li>
                        <li>No Premium Badge</li> 
                    </ul>

                    <div class="text-center">
                        <a href="#" class="btn btn-success btn-bordered-success rounded-pill waves-effect waves-light">Edit</a>
                        <a href="#" class="btn btn-danger btn-bordered-danger rounded-pill waves-effect waves-light">Delete</a>
                    </div>
                    </div>
                </div>
            </article>


            <!--Pricing Column-->
            <article class="pricing-column col-md-4">
                <div class="ribbon"><span>POPULAR</span></div>
                <div class="card">
                <div class="inner-box card-body">
                    <div class="plan-header p-3 text-center">
                        <h3 class="plan-title">Premium</h3>
                        <h2 class="plan-price fw-normal">$29</h2>
                        <div class="plan-duration">Per Month</div>
                    </div>
                    <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                        <li>15 Ads Limit</li>
                        <li>5 Featured Ads Limit</li>
                        <li>Premium Badge</li> 
                    </ul>

                    <div class="text-center">
                        <a href="#" class="btn btn-success btn-bordered-success rounded-pill waves-effect waves-light">Edit</a>
                        <a href="#" class="btn btn-danger btn-bordered-danger rounded-pill waves-effect waves-light">Delete</a>
                    </div>
                    </div>
                </div>
            </article>


            <!--Pricing Column-->
            <article class="pricing-column col-md-4">
                <div class="card">
                <div class="inner-box card-body">
                        <div class="plan-header p-3 text-center">
                            <h3 class="plan-title">Standard</h3>
                            <h2 class="plan-price fw-normal">$39</h2>
                            <div class="plan-duration">Per Month</div>
                        </div>
                        <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                            <li>60 Ads Limit</li>
                            <li>20 Featured Ads Limit</li>
                            <li>Premium Badge</li> 
                        </ul>

                        <div class="text-center">
                            <a href="#" class="btn btn-success btn-bordered-success rounded-pill waves-effect waves-light">Edit</a>
                            <a href="#" class="btn btn-danger btn-bordered-danger rounded-pill waves-effect waves-light">Delete</a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
@endsection