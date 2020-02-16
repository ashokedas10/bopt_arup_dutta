@extends('masters.layouts.master')

@section('title')
Configuration-Component
@endsection

@section('sidebar')
	@include('masters.partials.sidebar')
@endsection

@section('header')
	@include('masters.partials.header')
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
            <div class="card-header"><strong class="card-title">Add New Component</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('masters/component') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
                  <!--<div class="lv-due-hd">
											<h4>Leave Due as on</h4>
										</div>-->
                  <div class="row form-group lv-due-body">
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Component Name</label><span>(*)</span>
                      <input type="text" class="form-control" name="component_name" value="{{ old('component_name') }}">
					   @if ($errors->has('component_name'))
							<div class="error" style="color:red;">{{ $errors->first('component_name') }}</div>
						   @endif
                    </div>
					<div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Component Type</label><span>(*)</span>
                      <input type="text" class="form-control" name="component_type" value="{{ old('component_type') }}">
					   @if ($errors->has('component_type'))
							<div class="error" style="color:red;">{{ $errors->first('component_type') }}</div>
						   @endif
                    </div>
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Component Unit</label><span>(*)</span>
                      <select class="form-control" id="component_unit" name="unit_id" >
							<option value="" selected="disabled">Select Unit</option>
							@foreach($unit_rs as $unit)
							<option value="{{ $unit->id }}" <?php if(old('unit_id') == $unit->id) echo 'selected'; ?>>{{ $unit->unit_name }}</option>
							@endforeach																			
					</select>
					 @if ($errors->has('component_unit'))
							<div class="error" style="color:red;">{{ $errors->first('component_unit') }}</div>
						   @endif
                    </div>
                   
                  </div>
				  
				  <div class="row form-group lv-due-body">
				   <div class="col-md-4">
						<label>Rate(per unit)</label><span>(*)</span>
						<input type="text" class="form-control" name="rate" value="{{ old('rate') }}">
						 @if ($errors->has('rate'))
							<div class="error" style="color:red;">{{ $errors->first('rate') }}</div>
						   @endif
					</div>
				  <div class="col-md-4">
				  	<label>Min. Stock Level</label><span>(*)</span>
					<input type="text" class="form-control" name="min_stock_level" value="{{ old('min_stock_level') }}">
					 @if ($errors->has('min_stock_level'))
							<div class="error" style="color:red;">{{ $errors->first('min_stock_level') }}</div>
						   @endif
				  </div>
				  <div class="col-md-4">
				  	<label>Details</label>
					<input type="text" class="form-control" name="details" value="{{ old('details') }}">
					
				  </div>
				   </div>
				   <div class="row form-group lv-due-body">
					<div class="col-md-4">
				  	<label>HSN Code</label><span>(*)</span>
					<input type="text" class="form-control" name="hsn_code" value="{{ old('hsn_code') }}">
					 @if ($errors->has('hsn_code'))
							<div class="error" style="color:red;">{{ $errors->first('hsn_code') }}</div>
						   @endif
				  </div>
				  <div class="col-md-4">
				  	<label>SAC Code</label><span>(*)</span>
					<input type="text" class="form-control" name="sac_code" value="{{ old('sac_code') }}">
					 @if ($errors->has('sac_code'))
							<div class="error" style="color:red;">{{ $errors->first('sac_code') }}</div>
						   @endif
				  </div>
				  	<div class="col-md-4">
					<label>Status</label><span>(*)</span>
                      <select class="form-control" name="component_status">
                        <option value="" selected disabled>Select</option>
                        <option value="active" <?php if(old('component_status') == 'active') echo 'selected'; ?>>Active</option>
                        <option value="inactive" <?php if(old('component_status') == 'inactive') echo 'selected'; ?>>Inactive</option>
                      </select>	
					   @if ($errors->has('component_status'))
							<div class="error" style="color:red;">{{ $errors->first('component_status') }}</div>
						   @endif
					</div>
					<div class="col-md-4 btn-up">
					 <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                     <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
					</div>
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
@endsection

@section('scripts')
@include('masters.partials.scripts')

@endsection