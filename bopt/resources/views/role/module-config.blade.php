@extends('role.layouts.master')

@section('title')
				BOPT - Sub Module
@endsection

@section('sidebar')
	@include('role.partials.sidebar')
@endsection

@section('header')
	@include('role.partials.header')
@endsection





@section('content')

         <!-- Content -->
  <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
      <!-- Widgets  -->
      <div class="row">
        <div class="main-card">
          <div class="card">
            <div class="card-header"><strong class="card-title">Add New Module</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('role/module-config') }}" method="post" enctype="multipart/form-data" class="text-centr form-horizontal" style="width:800px;margin:0 auto;">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row form-group">
						<div class="col-md-4">
								<label>Module</label>
								<select class="form-control" name="module_id" onchange="getSubModules(this.value);">
									<option value='' selected disabled>Select</option>
									@foreach($modules as $module)
									<option value="{{ $module->id }}">{{ $module->module_name }}</option>
									@endforeach
								</select>
								@if ($errors->has('module_id'))
									<div class="error" style="color:red;">{{ $errors->first('module_id') }}</div>
								@endif
						</div>
							
						<div class="col-md-4">
							<label>Sub Module</label>
							<select class="form-control" name="sub_module_id" onchange="getMenu(this.value);" id="sub_module_id" >
								<option value='' selected disabled>Select</option>
							</select>
						
						</div>
							
						<div class="col-md-4">
							<label>Menu</label>
                                                        <select class="form-control" name="menu_name"  id="menu_name" >
								<option value='' selected disabled>Select</option>
							</select>
							
								@if ($errors->has('menu_name'))
								<div class="error" style="color:red;">{{ $errors->first('menu_name') }}</div>
							@endif
						</div>
					</div>
						<button type="submit" class="btn btn-danger btn-sm">Submit</button>
						<button type="reset" class="btn btn-danger btn-sm"> Reset</button>
				</form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Widgets -->
  </div>
  <!-- .animated -->
</div>
<!-- /.content -->
<div class="clearfix"></div>


@endsection

@section('scripts')
	@include('role.partials.scripts')
	
	
@endsection

<script>
		function getSubModules(module_id)
		{	
			//var company_id=$("#company_id option:selected").val();
			//alert("Company"+company_id);
			//alert("module_id"+module_id);
			$.ajax({
				type:'GET',
				url:'{{url('role/get-sub-modules')}}/'+module_id,				
				success: function(response){
				console.log(response); 
				
				$("#sub_module_id").html(response);
				
				}
				
			});
		}
                
 function getMenu(sub_module) 
{
    //alert("module_id"+module_id);
			$.ajax({
				type:'GET',
				url:'{{url('role/get-menu')}}/'+sub_module,				
				success: function(response){
				//console.log(response); 
				
				$("#menu_name").html(response);
				
				}
				
			});
}     
</script>