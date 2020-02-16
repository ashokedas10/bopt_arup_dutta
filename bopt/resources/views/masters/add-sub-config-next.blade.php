@extends('masters.layouts.master')

@section('title')
Configuration-Faculty
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
            <div class="card-header"><strong class="card-title">Add Subject Configuration</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('masters/add-sub-config-next') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
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
					<?php
					if(empty($branch_rs))
					{
					?>
                        <label for="text-input" class=" form-control-label">School Name</label>
						<input type="hidden" name="institute_code" id="institute_code" value="{{ $ins_code }}">
						<!--<input type="text" name="institute_name" value="{{ $ins_name }}">-->
                        <select class="form-control" name="faculty_id" onchange="getcourse(this.value);">
							<option value="" selected disabled>Select</option>
							@foreach($faculty_rs as $faculty)
							<option value="{{ $faculty->faculty_id }}">{{ $faculty->faculty_name }}</option>
							@endforeach
                        </select>
					<?php
					}
					else
					{
					?>
					    <label for="text-input" class=" form-control-label">Branch Name</label>
						<input type="hidden" name="institute_code" id="institute_code" value="{{ $ins_code }}">
						<!--<input type="text" name="institute_name" value="{{ $ins_name }}">-->
                        <select class="form-control" name="rice_branch_code" onchange="getcourserice(this.value);">
							<option value="" selected disabled>Select</option>
							@foreach($branch_rs as $branch)
							<option value="{{ $branch->branch_code }}">{{ $branch->branch_name }}</option>
							@endforeach
                        </select>
					<?php
					}
					?>
					    @if ($errors->has('faculty_id'))
						<div class="error" style="color:red;">{{ $errors->first('faculty_id') }}</div>
					    @endif
                    </div>
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Course Name</label>
						<select class="form-control" name="course_code" id="course">
							
                        </select>
						@if ($errors->has('course_code'))
							<div class="error" style="color:red;">{{ $errors->first('course_code') }}</div>
						@endif
                    </div>
					<div class="col-md-4">
					<label>Subject</label>
						<!--<select placeholder="Select Subject.." multiple="" class="standardSelect" name="subject_code[]">
                            
                            @foreach($subject_rs as $subject)
                            <option value="{{ $subject->subject_code }}">{{ $subject->subject_name }}</option>
							@endforeach
                        </select>-->
						<input type="text" class="form-control" id="subject_name" name="subject_name" value="{{ old('subject_name') }}" autocomplete="off">
					</div>
					</div>
					<div class="row form-group">
					
                    <div class="col-md-4">
                      <label>Status</label>
                      <select class="form-control" name="status">
                         <option value=""  selected disabled>Select</option>
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
    </div>
    <!-- /Widgets -->
  </div>
  <!-- .animated -->
</div>
<!-- /.content -->
@endsection

@section('scripts')
@include('masters.partials.scripts')

<script>
function getcourse(val)
{
	var ins_id = $('#institute_code').val();
	var school_id = val;
	//alert(ins_id);alert(school_id);
	$.ajax({
				type:'GET',
				url:'{{url('masters/get-course')}}/'+ins_id+'/'+school_id,			
				success: function(response){
				console.log(response); 
				
				//$("#ins_code").val(response);
				$("#course").html(response);
				
				}
				
			});
}

function getcourserice(val)
{
	var ins_id = $('#institute_code').val();
	var school_id = val;
	//alert(ins_id);alert(school_id);
	$.ajax({
				type:'GET',
				url:'{{url('masters/get-course-rice')}}/'+ins_id+'/'+school_id,			
				success: function(response){
				console.log(response); 
				
				//$("#ins_code").val(response);
				$("#course").html(response);
				
				}
				
			});
}
</script>

@endsection