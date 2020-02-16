@extends('sms.admission.layouts.master')

@section('title')
Admission Management
@endsection

@section('sidebar')
	@include('sms.admission.partials.sidebar')
@endsection

@section('header')
	@include('sms.admission.partials.header')
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
            <div class="card-header"><strong class="card-title">Add Batch Configuration</strong></div>
            <div class="card-body card-block">
            <form action="{{ url('sms/admission/add-batch-config') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
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
                    <label for="text-input" class=" form-control-label">Institute Name</label>
                    <input type="text" class="form-control" readonly="" placeholder="RICE" name="institute_name" value="RICE">
                  </div>
                 
                  <div class="col-md-4">
                    <label for="text-input" class=" form-control-label">Batch Name</label><span>(*)</span>
                    <select class="form-control" name="batch_id">
						<option value="" selected disabled>Select</option>
						@foreach($batch_rs as $batch)
						<option value="{{ $batch->batch_id }}" <?php if(old('batch_id') == $batch->batch_id) echo 'selected'; ?>>{{ $batch->batch_name }}</option>
						@endforeach
					</select>
					@if ($errors->has('batch_id'))
						<div class="error" style="color:red;">{{ $errors->first('batch_id') }}</div>
					@endif
                  </div>
				  <div class="col-md-4">
                  <label>Batch Start</label><span>(*)</span>
                  <select class="form-control" name="batch_start">
                    <option value="" selected disabled>Select Start</option>
					<?php
					for($i=2016;$i<=2050;$i++)
					{
					?>
                    <option value="<?php echo $i; ?>" <?php if(old('batch_start') == $i) echo 'selected'; ?>><?php echo $i; ?></option>
					<?php
					}
					?>
                    
                  </select>
				  @if ($errors->has('batch_start'))
						<div class="error" style="color:red;">{{ $errors->first('batch_start') }}</div>
					@endif
                </div>
                </div>
              </div>
              <div class="row form-group">
                
				
				<div class="col-md-4">
                  <label>Batch End</label><span>(*)</span>
                  <select class="form-control" name="batch_end">
                    <option value="" selected disabled>Select End</option>
                    <?php
					for($i=2016;$i<=2050;$i++)
					{
					?>
                    <option value="<?php echo $i; ?>" <?php if(old('batch_end') == $i) echo 'selected'; ?>><?php echo $i; ?></option>
					<?php
					}
					?>
                  </select>
				  @if ($errors->has('batch_end'))
						<div class="error" style="color:red;">{{ $errors->first('batch_end') }}</div>
					@endif
                </div>
                <div class="col-md-4">
                  <label>No. of Seat</label><span>(*)</span>
				  <input type="text" class="form-control" name="no_of_seat" value="{{ old('no_of_seat') }}">
				  <input type="hidden" class="form-control" name="seat_allocation" value="0">
				  @if ($errors->has('no_of_seat'))
						<div class="error" style="color:red;">{{ $errors->first('no_of_seat') }}</div>
					@endif
                </div>
                <div class="col-md-4">
			  	<label>Status</label><span>(*)</span>
                  <select class="form-control" name="batch_config_status">
                    <option value="" selected disabled>Select</option>
                    <option value="active" <?php if(old('batch_config_status') == 'active') echo 'selected'; ?>>Active</option>
                    <option value="inactive" <?php if(old('batch_config_status') == 'inactive') echo 'selected'; ?>>Inactive</option>
                  </select>
				  @if ($errors->has('batch_config_status'))
						<div class="error" style="color:red;">{{ $errors->first('batch_config_status') }}</div>
					@endif
			  </div>
              </div>
			  
			 
				<button type="submit" class="btn btn-danger btn-sm">Submit</button>
                <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
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
@include('sms.admission.partials.scripts')

@endsection