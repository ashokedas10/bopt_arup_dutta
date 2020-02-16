@extends('sms.routine-management.layouts.master')

@section('title')
		Routine Management-Semester
@endsection

@section('sidebar')
	@include('sms.routine-management.partials.sidebar')
@endsection

@section('header')
	@include('sms.routine-management.partials.header')
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
            <div class="card-header"><strong class="card-title">Add New Semester</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('sms/routine-management/semester') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
               
                  <div class="row form-group lv-due-body">
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Semester Name</label>
                      <input type="text" class="form-control" name="semester_name" value="{{ old('semester_name') }}">
						@if ($errors->has('semester_name'))
							<div class="error" style="color:red;">{{ $errors->first('semester_name') }}</div>
						@endif
                    </div>
                    
                     <div class="col-md-4">
					<label>Status</label>
						<select class="form-control" name="semester_status">
							<option value=""  selected disabled>Select</option>
							<option value="active">Active</option>
							<option value="inactive">Inactive</option>
						</select>
						@if ($errors->has('semester_status'))
						<div class="error" style="color:red;">{{ $errors->first('semester_status') }}</div>
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
<div class="clearfix"></div>


@endsection

@section('scripts')
	@include('sms.routine-management.partials.scripts')
	
@endsection