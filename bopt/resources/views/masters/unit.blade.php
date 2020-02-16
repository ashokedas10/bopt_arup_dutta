@extends('masters.layouts.master')

@section('title')
Configuration-Unit
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
            <div class="card-header"><strong class="card-title">Add New Unit</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('masters/unit') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!--<div class="emp-descp-main">   
								<div class="col-md-4 emp-desc">Employee Id: <span>1234</span></div>
								<div class="col-md-4 emp-desc">Employee Name: <span>Dibyendu Paul</span></div>
								<div class="col-md-4 emp-desc">Designation: <span>Manager</span></div>
								<div class="col-md-4 emp-desc">Grade: <span>1234</span></div>
								<div class="col-md-4 emp-desc">Date of Application: <span>13.10.2018</span></div>
								</div>-->
                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
                  <!--<div class="lv-due-hd">
											<h4>Leave Due as on</h4>
										</div>-->
                  <div class="row form-group lv-due-body">
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Unit Name</label><span>(*)</span>
                      <input type="text" class="form-control" name="unit_name" value="{{ old('unit_name') }}">
					  @if ($errors->has('unit_name'))
							<div class="error" style="color:red;">{{ $errors->first('unit_name') }}</div>
						   @endif
                    </div>
                   <div class="col-md-4">
					<label>Status</label><span>(*)</span>
                      <select class="form-control" name="unit_status">
                        <option value="" selected disabled>Select</option>
                        <option value="active" <?php if(old('unit_status') == 'active') echo 'selected'; ?>>Active</option>
                        <option value="inactive"<?php if(old('unit_status') == 'inactive') echo 'selected'; ?>>Inactive</option>
                      </select>	
					  @if ($errors->has('unit_status'))
							<div class="error" style="color:red;">{{ $errors->first('unit_status') }}</div>
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