 
 @include('admin.include.header');
 @include('admin.include.sidebar');
  
 

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<div class="content-page">
  <div class="content">
    <!-- Start Content-->
    <div class="container-fluid"> 
		@yield('content')
	</div>
  </div>
</div>
@include('admin.include.footer');
 