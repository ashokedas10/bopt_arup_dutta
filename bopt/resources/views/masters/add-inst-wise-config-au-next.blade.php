@extends('masters.layouts.master')

@section('title')
Configuration-Course Configuration
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
            <div class="card-header"><strong class="card-title">Add Course Configuration</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('masters/add-inst-wise-config-au-next') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
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
					<!--<input type="hidden" name="institute_name" value="{{ $ins_name }}">-->
					<input type="hidden" name="institute_code" value="{{ $ins_code }}">
					<?php
					if(empty($branch_rs))
					{
					?>
						<label for="text-input" class=" form-control-label">School Name</label>
						<select class="form-control" name="faculty_id">
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
						<select class="form-control" name="rice_branch_code">
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
						<!--<select data-placeholder="Select..." multiple="" class="standardSelect" name="course_code[]">
                           
                            @foreach($course_rs as $course)
                            <option value="{{ $course->course_code }}">{{ $course->course_name }}</option>
							@endforeach
                        </select>-->
						<input type="text" class="form-control" id="course_name" name="course_name" value="{{ old('course_name') }}" autocomplete="off">
						@if ($errors->has('course_name'))
							<div class="error" style="color:red;">{{ $errors->first('course_name') }}</div>
						@endif
                    </div>
					
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
@include('masters.partials.scripts')


<!-- Scripts -->
<!--<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/lib/chosen/chosen.jquery.min.js') }}"></script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>-->
@endsection
