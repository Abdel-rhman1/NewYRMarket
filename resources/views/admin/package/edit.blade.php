@extends('admin.layout.main')
@section('content')
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
					<!--begin::Subheader-->
					<div class="subheader py-2 py-lg-6 subheader-solid">
						<div class="container-fluid">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-white mb-0 px-0 py-2">
									<li class="breadcrumb-item " aria-current="page">Packages</li>
								</ol>
							</nav>
						</div>
					</div>
					<!--end::Subheader-->
					<!--begin::Entry-->
					<div class="d-flex flex-column-fluid">
						<!--begin::Container-->
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<div class="row">
										<div class="col-lg-12 col-xl-12">
											<div class="card card-custom gutter-b bg-transparent shadow-none border-0" >
												<div class="card-header align-items-center  border-bottom-dark px-0">
													<div class="card-title mb-0">
														<h3 class="card-label mb-0 font-weight-bold text-body">Edit Package
														</h3>
													</div>
												    <div class="icons d-flex">
														<button  class="btn ml-2 p-0" 
														id="kt_notes_panel_toggle" data-toggle="tooltip" title="" data-placement="right"
																			data-original-title="Check out more demos" >
															<span class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">
															
																<svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-plus white" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																	<path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
																  </svg>
															</span>
														
														</button>
														<a href="language.html#" onclick="printDiv()" class="ml-2">
															<span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
																<svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																	<path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
																	<path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
																	<path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
																  </svg>
															</span>
														
														</a>
														<a href="language.html#" class="ml-2" >
															<span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
																<svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-file-earmark-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																	<path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
																  </svg>
															</span>
														
														</a>
													
													</div>
												</div>
											
											</div>


										</div>
									</div>
												@include('admin.layout.alerts.success')
												@include('admin.layout.alerts.errors')
									<div class="row">
										<div class="col-12 ">
											<div class="card card-custom gutter-b bg-white border-0" >
												<div class="card-body" >
													<div >
														<div class=" table-responsive" id="printableTable">
															<form class="form" action="{{route('packages.update',$package->id)}}" method="POST">
																@csrf
																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																			<label class="text-dark" >Package Name</label>
																			<input type="text" name="package_name" class="form-control" value="{{$package->package_name}}">
																			@error('package_name')
																				<span class="text-danger">{{$message}}</span>
																			@enderror
																		</div>
																		<div class="form-group">
																			<label class="text-dark" >Slug</label>
																			<input type="text" name="slug" class="form-control" value="{{$package->slug}}">
																			<small style="color: red" >Must be in English & Unique</small>
																			@error('slug')
																				<span class="text-danger">{{$message}}</span>
																			@enderror
																		</div>
																		<div class="form-group">
																			<label class="text-dark">Package Type</label>
																			<fieldset class="form-group mb-3">
																				<select class="js-example-basic-single js-states form-control bg-transparent" name="package_type">
																					<option value="trial">trial</option>
																					<option value="monthly">monthly</option>
																				</select>
																			</fieldset>
																		</div>
																		<div class="form-group">
																			<label class="text-dark" >Price</label>
																			<input type="text" name="price" class="form-control" value="{{$package->price}}">
																			@error('price')
																				<span class="text-danger">{{$message}}</span>
																			@enderror
																		</div>
																		<div class="form-group">
																			<label class="text-dark" >Order Limits</label>
																			<input type="text" name="order_limit" class="form-control" value="{{$package->order_limit}}">
																			@error('order_limit')
																				<span class="text-danger">{{$message}}</span>
																			@enderror
																		</div>
																		<div class="form-group">
																			<label class="text-dark" >Product Limits</label>
																			<input type="text" name="product_limit" class="form-control" value="{{$package->product_limit}}">
																			@error('product_limit')
																				<span class="text-danger">{{$message}}</span>
																			@enderror
																		</div>
																		<div class="form-group">
																			<input class="mt-2" type="checkbox" name="status" value="1" checked>
																			<label class="mt-2"><strong>Active</strong></label>
																		</div>
																			<button type="submit" class="btn btn-primary">Update Package</button>
																	</div>
																	<div class="col-md-6">
																		<label class="mt-2"><strong>Features</strong></label>
																		@foreach ( $features as $feature )
																			<div class="form-group">
																				<input class="mt-2" type="checkbox" name="features[]" value="{{$feature->id}}">
																				<label class="mt-2"><strong>{{$feature->features}}</strong></label>
																			</div>
																		@endforeach
																	</div>
																</div>
															</form>
														</div>
													</div>
													
													
												</div>
											</div>

										</div>
									
									</div>
								</div>
							</div>
						</div>
						
						
					</div>
					
				</div>
				<ul class="sticky-toolbar nav flex-column bg-primary">

					<li class="nav-item" id="kt_demo_panel_toggle" data-toggle="tooltip" title="" data-placement="right"
						data-original-title="Check out more demos">
						<a class="btn btn-sm btn-icon text-white" href="language.html#">
							<svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-gear fa-spin" fill="currentColor"
								xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd"
									d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
								<path fill-rule="evenodd"
									d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
							</svg>
						</a>
					</li>
				</ul>

				<div id="kt_color_panel" class="offcanvas offcanvas-right kt-color-panel p-5">
					<div class="offcanvas-header d-flex align-items-center justify-content-between pb-3">
						<h4 class="font-size-h4 font-weight-bold m-0">Theme Config
						</h4>
						<a href="language.html#" class="btn btn-sm btn-icon btn-light btn-hover-primary" id="kt_color_panel_close">
							<svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
								xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd"
									d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
							</svg>
						</a>
					</div>
					<hr>
					<div class="offcanvas-content">
						<!-- Theme options starts -->
						<div id="customizer-theme-layout" class="customizer-theme-layout">
			
							<h5 class="mt-1">Theme Layout</h5>
							<div class="theme-layout">
								<div class="d-flex justify-content-start">
									<div class="my-3">
										<div class="btn-group btn-group-toggle">
											<label class="btn btn-primary p-2 active">
												<input type="radio" name="layoutOptions" value="false" id="radio-light" checked="">
												Light
											</label>
											<label class="btn btn-primary p-2">
												<input type="radio" name="layoutOptions" value="false" id="radio-dark"> Dark
											</label>
			
										</div>
			
									</div>
			
								</div>
							</div>
							<hr>
							<h5 class="mt-1">RTL Layout</h5>
							<div class="rtl-layout">
								<div class="d-flex justify-content-start">
									<div class="my-3 btn-rtl">
										<div class="toggle">
											<span class="circle"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr>
			
						<!-- Theme options starts -->
						<div id="customizer-theme-colors" class="customizer-theme-colors">
							<h5>Theme Colors</h5>
							<ul class="list-inline unstyled-list d-flex">
								<li class="color-box mr-2">
									<div id="color-theme-default" class="d-flex rounded w-20px h-20px" style="background-color: #ae69f5d9;">
									</div>
								</li>
								<li class="color-box mr-2">
									<div id="color-theme-blue" class="d-flex rounded w-20px h-20px" style="background-color: blue;">
									</div>
								</li>
								<li class="color-box mr-2">
									<div id="color-theme-red" class="d-flex rounded w-20px h-20px" style="background-color: red;">
									</div>
								</li>
								<li class="color-box mr-2">
									<div id="color-theme-green" class="d-flex rounded w-20px h-20px" style="background-color: green;">
									</div>
								</li>
								<li class="color-box mr-2">
									<div id="color-theme-yellow" class="d-flex rounded w-20px h-20px" style="background-color: #ffc107;">
									</div>
								</li>
								<li class="color-box mr-2">
									<div id="color-theme-navy-blue" class="d-flex rounded w-20px h-20px" style="background-color: #000080;">
									</div>
								</li>
			
							</ul>
							<hr>
						</div>
			
			
					</div>
				</div>		
				<iframe name="print_frame" width="0" height="0"  src="about:blank"></iframe>
<script src="{{asset('assets/js/plugin.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="assets/js/slick.min.js"></script>
<script src="assets/api/jqueryvalidate/jquery.validate.min.js"></script>
<script src="assets/api/apexcharts/apexcharts.js"></script>
<script src="assets/api/apexcharts/scriptcharts.js"></script> 
<script src="assets/api/pace/pace.js"></script>
<script src="assets/api/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/api/quill/quill.min.js"></script>
<script src="assets/api/editor/classic.ckeditor.js"></script>
<script src="assets/api/editor/inline.ckeditor.js"></script>
<script src="assets/api/datatable/jquery.dataTables.min.js"></script>
<script src="assets/api/select2/select2.min.js"></script>
<script src="assets/api/multiple-select/multiple-select.min.js"></script>
<script src="assets/js/sweetalert.js"></script>
<script src="assets/js/sweetalert1.js"></script>
<script src="assets/js/script.bundle.js"></script>
<script src="assets/js/script-slick.js"></script>

<script>
	
	jQuery('.addproduct-js').slick('refresh');
	    jQuery(document).ready(function() {
		jQuery('.js-Select').select2();
    });
	jQuery('.addproduct-js').slick('refresh');
	    jQuery(document).ready(function() {
		jQuery('.js-example-basic-single').select2();
		
    });
	jQuery(document).ready(function() {
        jQuery('.js-example-basic-multiple').select2();
	});
	jQuery(document).ready(function() {
        jQuery('.js-size-multiple').select2();
	});
	
	var options = {
  debug: 'info',
  modules: {
    toolbar: '#toolbar'
  },
  placeholder: 'Compose an epic',
  readOnly: true,
  theme: 'snow'
};
var editor = new Quill('#editor', options);



jQuery(document).ready( function () {
	jQuery('#languageTable').dataTable( {
    "pagingType": "simple_numbers",
  
    "columnDefs": [ {
      "targets"  : 'no-sort',
      "orderable": false,
    }]
});
});


jQuery(function() {
        jQuery('.single-select').multipleSelect({
      filter: true,
      filterAcceptOnEnter: true
    })
  })

  $("#addModal").modal().close();

</script>
@endsection
