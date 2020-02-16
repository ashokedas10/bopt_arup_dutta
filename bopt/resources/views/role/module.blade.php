@extends('role.layouts.master')

@section('title')
				BOPT - Module
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
              <form action="{{ url('role/module') }}" method="post" enctype="multipart/form-data" class="text-centr form-horizontal" style="width:800px;margin:0 auto;">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row form-group">
					<div class="col col-md-3"><label for="company-name" class="form-control-label">Module Name <span>(*)</span></label></div>
							<div class="col col-md-6" style="padding:0;">
							<input type="text" class="form-control" id="module_name" name="module_name" value="{{ old('module_name') }}">
							@if ($errors->has('module_name'))
								<div class="error" style="color:red;">{{ $errors->first('module_name') }}</div>
							@endif
							</div>
						<div class="col col-md-3" style="text-align:left;"><button type="submit" class="btn btn-danger btn-sm">Submit</button></div>
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
