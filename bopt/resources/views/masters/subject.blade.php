@extends('masters.layouts.master')

@section('title')
Configuration-Subject
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
            <div class="card-header"><strong class="card-title">Add New Subject</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('masters/subject') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
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
                       <label for="text-input" class=" form-control-label">Subject Id</label>
                      <input type="text" class="form-control" name="subject_code" value="{{ old('subject_code') }}">
					   @if ($errors->has('subject_code'))
							<div class="error" style="color:red;">{{ $errors->first('subject_code') }}</div>
						   @endif
                    </div>
                    <div class="col-md-4">
                       <label for="text-input" class=" form-control-label">Subject Name</label>
                      <input type="text" class="form-control" id="cname" name="subject_name" value="{{ old('subject_name') }}" >
					   @if ($errors->has('subject_name'))
							<div class="error" style="color:red;">{{ $errors->first('subject_name') }}</div>
						   @endif
                    </div>
					
					<div class="col-md-4">
                      <label>Subject Type</label>
                      <select class="form-control" name="subject_type">
                        <option value='' selected disabled>Select</option>
							<option value="Lab"  >Lab</option>
							<option value="Theory"  >Theory</option>
						  </select>
						   @if ($errors->has('subject_type'))
							<div class="error" style="color:red;">{{ $errors->first('subject_type') }}</div>
						   @endif
                    </div>
					
					
					
					<div class="col-md-4">
                       <label for="text-input" class=" form-control-label">Max Lab Marks</label>
                      <input type="text" class="form-control" name="max_lab_marks" value="">
						@if ($errors->has('max_lab_marks'))
							<div class="error" style="color:red;">{{ $errors->first('max_lab_marks') }}</div>
						@endif
                    </div>
					
					<div class="col-md-4">
                       <label for="text-input" class=" form-control-label">Max Theory Marks</label>
                      <input type="text" class="form-control" name="max_theory_marks" value="">
						@if ($errors->has('max_theory_marks'))
							<div class="error" style="color:red;">{{ $errors->first('max_theory_marks') }}</div>
						@endif
                    </div>
					
					<div class="col-md-4">
                       <label for="text-input" class=" form-control-label">Max Project Marks</label>
                      <input type="text" class="form-control" name="max_project_marks" value="">
						@if ($errors->has('max_project_marks'))
							<div class="error" style="color:red;">{{ $errors->first('max_project_marks') }}</div>
						@endif
                    </div>
					
					<div class="col-md-4">
                       <label for="text-input" class=" form-control-label">Max Credit</label>
                      <input type="text" class="form-control" name="max_credit" value="">
						@if ($errors->has('max_credit'))
							<div class="error" style="color:red;">{{ $errors->first('max_credit') }}</div>
						@endif
                    </div>
					
					<div class="col-md-4">
                       <label for="text-input" class=" form-control-label">Max Total</label>
                      <input type="text" class="form-control" name="max_total" value="">
						@if ($errors->has('max_total'))
							<div class="error" style="color:red;">{{ $errors->first('max_total') }}</div>
						@endif
                    </div>
				  
                    
                    <div class="col-md-4">
                      <label>Status</label>
                      <select class="form-control" name="subject_status">
                        <option value='' selected disabled>Select</option>
							<option value="active" <?php if(old('subject_status') ==  "active"){ echo "selected"; } ?> >Active</option>
							<option value="inactive" <?php if(old('subject_status') ==  "inactive"){ echo "selected"; } ?> >Inactive</option>
						  </select>
						   @if ($errors->has('subject_status'))
							<div class="error" style="color:red;">{{ $errors->first('subject_status') }}</div>
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