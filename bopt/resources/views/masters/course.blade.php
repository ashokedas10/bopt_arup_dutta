@extends('masters.layouts.master')

@section('title')
Configuration-Course
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
            <div class="card-header"><strong class="card-title">Add New Course</strong></div>
			@if(Session::has('message'))										
					<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
			@endif	
            <div class="card-body card-block">
              <form action="{{ url('masters/course') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
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
						<label>Institute</label>
						<select class="form-control" name="institute_code" id="institute_code" onchange="getSchools(this.value);">
							<option value="" selected disabled>Select</option>
							@foreach($institute_rs as $institute)
							<option value="{{ $institute->institute_code }}">{{ $institute->institute_name }}</option>
							@endforeach
						</select>
						@if ($errors->has('institute_code'))
							<div class="error" style="color:red;">{{ $errors->first('institute_code') }}</div>
						@endif
					</div>
					
					<div class="col-md-4">
						<label>Location</label>
						<select class="form-control" name="location_code" id="location_code" >
							<option value="" selected disabled>Select</option>
							@foreach($location_rs as $location)
							<option value="{{ $location->branch_code }}">{{ $location->branch_name }}</option>
							@endforeach
						</select>
						@if ($errors->has('location_code'))
							<div class="error" style="color:red;">{{ $errors->first('location_code') }}</div>
						@endif
					</div>
					
					<div class="col-md-4">
						<label>School</label>
						<select class="form-control" name="school_code" id="school_id" >
							<option value="" selected disabled>Select</option>
							
						</select>
						@if ($errors->has('school_code'))
							<div class="error" style="color:red;">{{ $errors->first('school_code') }}</div>
						@endif
					</div>
					
					<div class="col-md-4">
						<label>Session</label>
						<select class="form-control" name="session" id="session" >
							<option value="" selected disabled>Select</option>
							<?php for($i=2019; $i <= 2030; $i++){ ?>
							<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
							<?php } ?>
						</select>
						@if ($errors->has('session'))
							<div class="error" style="color:red;">{{ $errors->first('session') }}</div>
						@endif
					</div>
					
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Duration in (Months)</label>
						<select class="form-control" name="duration" id="duration" >
							<option value="" selected disabled>Select</option>
							<?php for($i=1; $i <= 72; $i++){ ?>
							<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
							<?php } ?>
						</select>
					  @if ($errors->has('duration'))
						<div class="error" style="color:red;">{{ $errors->first('duration') }}</div>
					  @endif
                    </div>
					
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">No. of Semester</label>
						<select class="form-control" name="semester" id="semester" >
							<option value="" selected disabled>Select</option>
							<?php
							for($i=4; $i <= 8; $i=$i+2){  ?>
							<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
							<?php } ?>
						</select>
					   @if ($errors->has('semester'))
						<div class="error" style="color:red;">{{ $errors->first('semester') }}</div>
					   @endif
                    </div>
					
					<div class="col-md-4">
                      <label>Course Family</label>
                      <select class="form-control" name="course_family">
                        <option value='' selected disabled>Select</option>
                        <option value="UG" >UG</option>
                        <option value="PG" >PG</option>
                      </select>
					   @if ($errors->has('course_family'))
						<div class="error" style="color:red;">{{ $errors->first('course_family') }}</div>
					   @endif
                    </div>
					
					<div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Capacity</label>
						<select class="form-control" name="capacity" id="capacity" >
							<option value="" selected disabled>Select</option>
							<?php for($i=20; $i <= 100; $i++){ ?>
							<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
							<?php } ?>
						</select>
					  @if ($errors->has('capacity'))
						<div class="error" style="color:red;">{{ $errors->first('capacity') }}</div>
					  @endif
                    </div>
					
					<div class="col-md-4">
					<label for="text-input" class=" form-control-label">Effective Start Date</label>
					<input type="date" class="form-control" name="effective_start_date">
					 @if ($errors->has('effective_start_date'))
						<div class="error" style="color:red;">{{ $errors->first('effective_start_date') }}</div>
					  @endif
					</div>
					
					<div class="col-md-4">
					<label for="text-input" class=" form-control-label">Effective End Date</label>
					<input type="date" class="form-control" name="effective_end_date">
					 @if ($errors->has('effective_end_date'))
						<div class="error" style="color:red;">{{ $errors->first('effective_end_date') }}</div>
					  @endif
					</div>
                    
					<div class="col-md-4">
                      <label>Status</label>
                      <select class="form-control" name="course_status">
                        <option value='' selected disabled>Select</option>
                        <option value="active" <?php if(old('course_status') ==  "active"){ echo "selected"; } ?> >Active</option>
                        <option value="inactive" <?php if(old('course_status') ==  "inactive"){ echo "selected"; } ?> >Inactive</option>
                      </select>
					   @if ($errors->has('course_status'))
						<div class="error" style="color:red;">{{ $errors->first('course_status') }}</div>
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
<div class="clearfix"></div>
@endsection

@section('scripts')
@include('masters.partials.scripts')
<script>
	function getSchools(institute_id)
	{
		//alert(institute_id);
		$.ajax({
			type:'GET',
			url:'{{url('masters/get-schools')}}/'+institute_id,				
			success: function(response){
			console.log(response); 
			//alert(response);
			$("#school_id").html(response);
			
			}
			
		});
	}
</script>
@endsection