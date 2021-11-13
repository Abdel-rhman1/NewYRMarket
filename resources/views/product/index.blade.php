@extends('layout.main')
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                    <li class="breadcrumb-item " aria-current="page">Products</li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
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
                                        <h3 class="card-label mb-0 font-weight-bold text-body">Products
                                        </h3>
                                    </div>
                                    <div class="icons d-flex">
                                        <a href="admin-list.html#" onclick="printDiv()" class="ml-2">
                                            <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                                                <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                                                    <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                                    <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                  </svg>
                                            </span>
                                        
                                        </a>
                                        <a href="admin-list.html#" class="ml-2" >
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
                                            <table id="productUnitTable" class="display ">
                                                
                                                <thead class="text-body">
                                                    <tr>
                                                        <th><input type="checkbox" class="not-exported no-sort" id="ida"></th>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Code</th>
                                                        <th>Brand</th>
                                                        <th>Category</th>
                                                        <th>Quantity</th>
                                                        <th>Unit</th>
                                                        <th>Price</th>
                                                        <th class="no-sort">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">
                                                    @foreach ( $product_list as $product )
                                                        <tr class="kt-table-row kt-table-row-level-0">
                                                            <td><input type="checkbox" name="idp" class="blabla" value="{{$product->id}}"></td>
                                                            @if($product->image)
                                                                <td><img src="{{url('public/images/product', $product->image)}}" class="h-70px w-70px rounded-sm mr-3"></td>
                                                            @else
                                                                <td><img src="{{url('public/images/product/zummXD2dvAtI.png')}}" class="h-70px w-70px rounded-sm mr-3"></td>
                                                            @endif
                                                            <td>{{$product->name}}</td>
                                                            <td>{{$product->code}}</td>
                                                            <?php 
                                                                $brand = App\Models\Brand::find($product->brand_id);
                                                                $category = App\Models\Category::find($product->category_id);
                                                                $unit = App\Models\Unit::find($product->unit_id);
                                                            ?>
                                                            <td>{{$brand->title}}</td>
                                                            <td>{{$category->name}}</td>
                                                            <td>{{$product->qty}}</td>
                                                            <td>{{$unit->unit_code}}</td>
                                                            <td>{{$product->price}}</td>
                                                            <td>
                                                                <div class="card-toolbar text-centre">
                                                                    <button class="btn p-0 shadow-none" type="button" id="dropdowneditButton122" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                        <span class="svg-icon">
                                                                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-three-dots text-body" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdowneditButton122"  style="display: block; position: absolute; transform: translate3d(840px, 20px, 0px); x-placement=top-end">
                                                                        <a href="javascript:void(0)" class="dropdown-item click-edit" id="click-edit98" data-toggle="tooltip" title="" data-placement="right"
                                                                        data-original-title="Check out more demos">Edit</a>
                                                                        <a class="dropdown-item confirm-delete" title="Delete" href="admin-list.html#">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        
                                                        </tr>
                                                    @endforeach
                                
                                                </tbody>
                                            </table>
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
		
<iframe name="print_frame" width="0" height="0"  src="about:blank"></iframe>

<script src="assets/js/plugin.bundle.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/api/jqueryvalidate/jquery.validate.min.js"></script>
	<script src="assets/api/apexcharts/apexcharts.js"></script>
	<script src="assets/api/apexcharts/scriptcharts.js"></script> 
	<script src="assets/api/pace/pace.js"></script>
	<script src="assets/api/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/api/quill/quill.min.js"></script>
	<script src="assets/api/datatable/jquery.dataTables.min.js"></script>
	<script src="assets/api/multiple-select/multiple-select.min.js"></script>
	<script src="assets/js/sweetalert.js"></script>
	<script src="assets/js/sweetalert1.js"></script>
	<script src="assets/js/script.bundle.js"></script>
	<script>
		jQuery(function() {
			jQuery('.english-select').multipleSelect({
		  filter: true,
		  filterAcceptOnEnter: true
		})
	  });
	  jQuery(function() {
			jQuery('.arabic-select').multipleSelect({
		  filter: true,
		  filterAcceptOnEnter: true
		})
	  });
	jQuery(document).ready( function () {
		jQuery('#productUnitTable').dataTable( {
		"pagingType": "simple_numbers",
	  
		"columnDefs": [ {
		  "targets"  : 'no-sort',
		  "orderable": false,
		}]
	});
	});
	
	
	</script>

@endsection