@extends('layout.main')
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                    <li class="breadcrumb-item " aria-current="page">Categories</li>
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
                                        <h3 class="card-label mb-0 font-weight-bold text-body">Categories
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
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th class="no-sort">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">
                                                    @foreach ( $category_list as $category )
                                                    <tr class="kt-table-row kt-table-row-level-0">
                                                        <td><input type="checkbox" name="idp" class="blabla" value="{{$category->id}}"></td>
                                                        @if ($category->image)
                                                            <td><img src="{{url('public/images/category', $category->image)}}" class="h-70px w-70px rounded-sm mr-3"></td>
                                                        @else
                                                            <td><img src="{{url('public/images/category/zummXD2dvAtI.png')}}" class="h-70px w-70px rounded-sm mr-3"></td>
                                                        @endif
                                                            <td>{{$category->name}}</td>
                                                        @if($category->is_active)
                                                            <td><span class="mr-0 text-success">Active</span></td>
                                                        @else
                                                            <td><span class="mr-0 text-danger">In Active</span></td>
                                                        @endif
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
                                                                        <button type="button" class="open-EditCategoryDialog btn btn-link dropdown-item click-edit" data-toggle="tooltip" data-attr="{{$category->id}}" data-target="#editModal" data-placement="right">Edit</button>
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
        <h4 class="font-size-h4 font-weight-bold m-0">Add Category 
        </h4>
        <a href="#" class="btn btn-sm btn-icon btn-light btn-hover-primary" id="kt_notes_panel_close">
            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
            </svg>
        </a>
    </div>
    <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
    <form class="form" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="text-dark" >Name *</label>
                    <input type="text" name="name" class="form-control" id="name" >
                </div>
                <div class="form-group">
                    <label class="text-dark">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
               {{-- <table border="0" class="col-lg-12 " id="meal-option" style="overflow: scroll;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th><a href="javascript:void(0)" class="btn btn-success addRow">+</a></th>
                        </tr>
                    </thead>
                    <tbody id="variantbody">
                    <tr>
                        <td><input type="text" name="VariantName[]" class='form-control'></td>
                        <td><a href="javascript:void(0)" class="btn btn-danger deleteRow text-center">-</a></td>

                    </tr>
                    </tbody>
                </table>   --}}             
                <div class="form-group">
                    <input class="mt-2" type="checkbox" name="is_active" value="1" checked>
                    <label class="mt-2"><strong>Active</strong></label>
                </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
            </div>
        </div>
    </form>
</div>	
<div id="editModal" class="editpopup offcanvas offcanvas-right kt-color-panel p-5">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-3">
        <h4 class="font-size-h4 font-weight-bold m-0">Edit Category
        </h4>
        <a href="#" class="btn btn-sm btn-icon btn-light btn-hover-primary kt_notes_panel_close" id="kt_notes_panel_close1">
            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
            </svg>
        </a>
    </div>
    <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
    <form class="form" action="{{route('category.update',1)}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="text-dark" >Name *</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                </div>
                <input type="hidden" name="category_id" value="{{$category->id}}">
                <div class="form-group">
                    <label class="text-dark">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <input class="mt-2" type="checkbox" name="is_active" value="1">
                    <label class="mt-2"><strong>Active</strong></label>
                </div>
                    <button type="submit" class="btn btn-primary">Edit Category</button>
            </div>
        </div>
    </form>
</div>	
<iframe name="print_frame" width="0" height="0"  src="about:blank"></iframe>

<script src="{{asset('assets/js/plugin.bundle.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/api/jqueryvalidate/jquery.validate.min.js')}}"></script>
	<script src="{{asset('assets/api/apexcharts/apexcharts.js')}}"></script>
	<script src="{{asset('assets/api/apexcharts/scriptcharts.js')}}"></script> 
	<script src="{{asset('assets/api/pace/pace.js')}}"></script>
	<script src="{{asset('assets/api/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script src="{{asset('assets/api/quill/quill.min.js')}}"></script>
	<script src="{{asset('assets/api/datatable/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/api/multiple-select/multiple-select.min.js')}}"></script>
	<script src="{{asset('assets/js/sweetalert.js')}}"></script>
	<script src="{{asset('assets/js/sweetalert1.js')}}"></script>
	<script src="{{asset('assets/js/script.bundle.js')}}"></script>
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

    $(document).on("click", ".open-EditCategoryDialog", function(){
          var url ="category/";
          var id  = $(this).attr("data-attr");	
          url = url.concat(id).concat("/edit");

          $.get(url, function(data){
            $("#editModal input[name='name']").val(data['name']);
            $("#editModal input[name='category_id']").val(data['id']);
            if(data['is_active'])
            $("#editModal input[name='is_active']").prop('checked', true);
            else
            $("#editModal input[name='is_active']").prop('checked', false);
            $('.selectpicker').selectpicker('refresh');
          });
    });
    
	
	</script>

@endsection