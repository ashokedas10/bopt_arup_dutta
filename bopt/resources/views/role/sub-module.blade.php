@extends('role.layouts.master')

@section('title')
				Rice-Sub Module
@endsection

@section('sidebar')
	@include('role.partials.sidebar')
@endsection

@section('header')
	@include('role.partials.header')
@endsection



@section('scripts')
	@include('role.partials.scripts')
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
              <form action="{{ url('role/sub-module') }}" method="post" enctype="multipart/form-data" class="text-centr form-horizontal" style="width:800px;margin:0 auto;">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row form-group">
						<div class="col-md-4">
								<label>Module</label>
								<select class="form-control" name="module_id" >
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
							<input type="text" class="form-control" name="sub_module_name" value="{{ old('sub_module_name') }}" >
							@if ($errors->has('sub_module_name'))
								<div class="error" style="color:red;">{{ $errors->first('sub_module_name') }}</div>
							@endif
						</div>
							
						<div class="col-md-4 btn-up">
							<button type="submit" class="btn btn-danger btn-sm">Submit</button>
							<button type="reset" class="btn btn-danger btn-sm"> Reset</button>
						</div>
					</div>
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
