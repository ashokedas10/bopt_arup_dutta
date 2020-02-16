@extends('sms.fees-management.layouts.master')

@section('title')
Payroll Information System-Company
@endsection

@section('sidebar')
	@include('sms.fees-management.partials.sidebar')
@endsection

@section('header')
	@include('sms.fees-management.partials.header')
@endsection



@section('scripts')
	@include('sms.fees-management.partials.scripts')
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
            <div class="card-header"><strong class="card-title">Add New Fees Head</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('sms/fees-management/fees-head') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
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
                      <label for="text-input" class=" form-control-label">Fees Id.</label>
                      <input type="text" class="form-control" name="fees_head_code" value="{{ old('fees_head_code') }}">
						@if ($errors->has('fees_head_code'))
							<div class="error" style="color:red;">{{ $errors->first('fees_head_code') }}</div>
						@endif
                    </div>
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Fees Name</label>
                      <input type="text" class="form-control" id="fees_head_name" name="fees_head_name" value="{{ old('fees_head_name') }}">
					  @if ($errors->has('fees_head_name'))
							<div class="error" style="color:red;">{{ $errors->first('fees_head_name') }}</div>
						@endif
                    </div>
                    <div class="col-md-4">
					<label>Status</label>
                      <select class="form-control" name="fees_head_status">
                        <option value="" selected disabled>Select</option>
                        <option value="Active" <?php if(old('fees_head_status') =='Active') { echo "selected"; } ?>>Active</option>
                        <option value="Inactive" <?php if(old('fees_head_status') =='Inactive') { echo "selected"; } ?> >Inactive</option>
                      </select>	
					  @if ($errors->has('fees_head_status'))
							<div class="error" style="color:red;">{{ $errors->first('fees_head_status') }}</div>
						@endif
					</div>
                  </div>
				  
				 
					 
				 
                </div>
					 <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                     <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
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
