@extends('admin.layout.main')
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                    <li class="breadcrumb-item " aria-current="page">{{translate('SuperAdmin')}}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{translate('List')}}</li>
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
                                        <h3 class="card-label mb-0 font-weight-bold text-body">{{translate('SuperAdmin')}} 
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
                    <div class="row">
                        
                        <div class="col-12 ">
                            <div class="card card-custom gutter-b bg-white border-0" >
                                <div class="card-body" >
                                    <div >
                                        <div class=" table-responsive" id="printableTable">
                                            <table id="productUnitTable" class="display ">
                                                
                                                <thead class="text-body">
                                                    <tr>
                                                        <th>{{translate('User Name')}}</th>
                                                        <th class="">{{translate('Email')}}</th>
                                                        <th class="">{{translate('Company Name')}}</th>
                                                        <th class="">{{translate('Phone Number')}}</th>
                                                        <th class="">{{translate('Role')}}</th>
                                                        <th class="">{{translate('Status')}}</th>
                                                        <th class="no-sort text-right">{{translate('Action')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">
                                                    @foreach ( $lims_admin_list as $admin_list )
                                                        <tr class="kt-table-row kt-table-row-level-0">
                                                            <td  >{{$admin_list->name}}</td>
                                                            <td class="">
                                                            {{$admin_list->email}}
                                                            </td>
                                                            <td class="">coder</td>
                                                            <td class="">{{$admin_list->phone}}</td>
                                                            <td class="">Admin</td>
                                                                @if($admin_list->is_active)
                                                                <td><span class="mr-0 text-success">Active</span></td>
                                                                @else
                                                                <td><span class="mr-0 text-danger">In Active</span></td>
                                                                @endif
                                                            <td>
                                                                <div class="card-toolbar text-right">
                                                                    <button class="btn p-0 shadow-none" type="button" id="dropdowneditButton122" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span class="svg-icon">
                                                                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-three-dots text-body" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdowneditButton122"  style="position: absolute; transform: translate3d(1001px, 111px, 0px); top: 0px; left: 0px; will-change: transform;">
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