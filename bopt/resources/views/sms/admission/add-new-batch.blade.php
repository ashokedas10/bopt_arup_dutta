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
            <div class="card-header"><strong class="card-title">Add New Batch</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('sms/admission/add-new-batch') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
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
                      <label for="text-input" class=" form-control-label">Batch ID</label><span>(*)</span>
                      <input type="text" class="form-control" name="batch_id" value="{{ old('batch_id') }}">
					  @if ($errors->has('batch_id'))
						<div class="error" style="color:red;">{{ $errors->first('batch_id') }}</div>
					@endif
                    </div>
					  <div class="col-md-4">
					  	<label for="text-input" class=" form-control-label">Batch Name</label><span>(*)</span>
                      <input type="text" class="form-control" name="batch_name" value="{{ old('batch_name') }}">
					  @if ($errors->has('batch_name'))
						<div class="error" style="color:red;">{{ $errors->first('batch_name') }}</div>
					@endif
					  </div>
					  
					  </div>
					  </div>
					  <div class="row form-group">
                     
                    <div class="col-md-4">
					<label>Status</label><span>(*)</span>
                      <select class="form-control" name="status">
                        <option value="" selected disabled>Select</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                      </select>	
					  @if ($errors->has('status'))
						<div class="error" style="color:red;">{{ $errors->first('status') }}</div>
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
@include('sms.admission.partials.scripts')

@endsection
