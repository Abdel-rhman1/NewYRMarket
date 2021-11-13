@extends('layout.main')
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                    <li class="breadcrumb-item " aria-current="page">Warehouses</li>
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
                                        <h3 class="card-label mb-0 font-weight-bold text-body">Warehouse
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
                                                        <th><input type="checkbox" class="not-exported" id="ida"></th>
                                                        <th>Warehouse</th>
                                                        <th>Phone Number</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>Number Of Product</th>
                                                        <th>Stock Quantity</th>
                                                        <th class="no-sort">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">
                                                    @foreach ( $warehouse_list as $warehouse )
                                                    <tr class="kt-table-row kt-table-row-level-0">
                                                        <td><input type="checkbox" name="idp" class="blabla" value="{{$warehouse->id}}"></td>
                                                            <td>{{$warehouse->name}}</td>
                                                            <td>{{$warehouse->phone}}</td>
                                                            <td>{{$warehouse->email}}</td>
                                                            <td>{{$warehouse->address}}</td>
                                                            <?php
                                                                $number_of_product = App\Models\Product_Warehouse::
                                                                join('products', 'product_warehouse.product_id', '=', 'products.id')
                                                                ->where([ ['product_warehouse.warehouse_id', $warehouse->id],
                                                                        ['products.is_active', true]
                                                                ])->count();

                                                                $stock_qty = App\Models\Product_Warehouse::
                                                                join('products', 'product_warehouse.product_id', '=', 'products.id')
                                                                ->where([ ['product_warehouse.warehouse_id', $warehouse->id],
                                                                        ['products.is_active', true]
                                                                ])->sum('product_warehouse.qty');
                                                            ?>
                                                            <td>{{$number_of_product}}</td>
                                                            <td>{{$stock_qty}}</td>
                                                            <td>
                                                                <div class="card-toolbar text-right">
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

<div id="kt_notes_panel" class="offcanvas offcanvas-right kt-color-panel p-5">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-3">
        <h4 class="font-size-h4 font-weight-bold m-0">Add Warehouse 
        </h4>
        <a href="#" class="btn btn-sm btn-icon btn-light btn-hover-primary" id="kt_notes_panel_close">
            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
            </svg>
        </a>
    </div>
    <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
    <form class="form" action="{{route('warehouses.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="text-dark" >Name *</label>
                    <input type="text" name="name" placeholder="Type WareHouse Name..." class="form-control" >
                </div>
                <div class="form-group">
                    <label class="text-dark">Phone Number *</label>
                    <input type="text" name="phone" class="form-control" >
                </div>
                <div class="form-group">
                    <label class="text-dark" >Email</label>
                    <input type="email" name="email" placeholder="example@example.com" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Address *</label>
                    <textarea class="form-control" rows="3" name="address"></textarea>
                </div>
                    <button type="submit" class="btn btn-primary">Add Warehouse</button>
            </div>
        </div>
    </form>
</div>	
<div id="editpopup" class="editpopup offcanvas offcanvas-right kt-color-panel p-5">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-3">
        <h4 class="font-size-h4 font-weight-bold m-0">Edit Language
        </h4>
        <a href="language.html#" class="btn btn-sm btn-icon btn-light btn-hover-primary kt_notes_panel_close" id="kt_notes_panel_close1">
            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
            </svg>
        </a>
    </div>
    <form id="myform1">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="text-dark" >Name</label>
                    <input type="text" name="text" class="form-control" >
                    <small  class="form-text text-muted">Language name such as "English"</small>
                </div>
                <div class="form-group">
                    <label class="text-dark" >Code</label>
                    <input type="text" name="text" class="form-control" >
                    <small  class="form-text text-muted">Language code such as "en" for english.</small>
                </div>
                <div class="form-group">
                    <label class="text-dark" >Direction</label>
                    <fieldset class="form-group mb-3">
                        <select class="js-example-basic-single js-states form-control bg-transparent" name="state">
                            <option value="yr">Right to left</option>
                            
                            <option value="mn">Left to Right</option>
                            
                        </select>
                    </fieldset>
                    <small  class="form-text text-muted">Language Direction</small>
                </div>
                    <button type="submit" class="btn btn-primary">Edit Language</button>
            </div>
        </div>
    </form>
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

    $('#kt_notes_panel_toggle').on('click', function() {
        $("operator").hide();
        $("operation_value").hide();
        
    });
    
	$('#base_unit_create').on('change', function() {
        if($(this).val()){
            $("#kt_notes_panel .operator").show();
            $("#kt_notes_panel .operation_value").show();
        }
        else{
            $("#kt_notes_panel .operator").hide();
            $("#kt_notes_panel .operation_value").hide();
        }
    });
	
	</script>

@endsection