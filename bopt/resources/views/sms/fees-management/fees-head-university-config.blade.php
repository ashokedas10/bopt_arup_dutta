@extends('sms.fees-management.layouts.master')

@section('title')
Student Management System-Fees Head Configuration
@endsection

@section('sidebar')
	@include('sms.fees-management.partials.sidebar')
@endsection

@section('header')
	@include('sms.fees-management.partials.header')
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
            <div class="card-header"><strong class="card-title">Add Fees Configuration</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('sms/fees-management/fees-head-university-config') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<?php if(old('institute_code')==''){ $institute=$institute_code; }else{ $institute=old('institute_code');} ?>
				<input type="hidden" name="institute_code" id="institute_code" value="{{ $institute }}" >
				
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
						    <label for="text-input" class=" form-control-label">Select School</label>
						    <select class="form-control" name="faculty_code" onchange="getcourse(this.value);">
							<option value='' selected disabled>Select</option>
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
							<select class="form-control" name="rice_branch_code" onchange="getcourserice(this.value);">
							<option value="" selected disabled>Select</option>
							@foreach($branch_rs as $branch)
							<option value="{{ $branch->branch_code }}">{{ $branch->branch_name }}</option>
							@endforeach
							</select>
						<?php
						}
						?>
						  @if ($errors->has('faculty_code'))
							<div class="error" style="color:red;">{{ $errors->first('faculty_code') }}</div>
						@endif
						</div>
						
					  <div class="col-md-4">
					  	<label for="text-input" class=" form-control-label">Course Name</label>
						<select class="form-control" name="course_code" id="course" >
                            
                        </select>
						@if ($errors->has('course_code'))
							<div class="error" style="color:red;">{{ $errors->first('course_code') }}</div>
						@endif
					  </div>
					  
					  <div class="col-md-4">
					 	<label>Fees Head</label>
						 <select data-placeholder="Fees Head" multiple="" class="standardSelect" name="fees_head_code[]" >
								@foreach($fees_head_rs as $fees_head)
									<option value="{{ $fees_head->fees_head_code }}"  >{{ $fees_head->fees_head_name }}</option>
								@endforeach
						</Select>
						@if ($errors->has('fees_head_code'))
							<div class="error" style="color:red;">{{ $errors->first('fees_head_code') }}</div>
						@endif
					 </div>
					 
					  </div>
					  <div class="row form-group">
                     
                    <div class="col-md-4">
					<label>Status</label>
                       <select class="form-control" name="fees_head_config_status">
                        <option value="" selected disabled>Select</option>
                        <option value="Active" <?php if(old('fees_head_config_status') =='Active') { echo "selected"; } ?>>Active</option>
                        <option value="Inactive" <?php if(old('fees_head_config_status') =='Inactive') { echo "selected"; } ?> >Inactive</option>
                      </select>	
					  @if ($errors->has('fees_head_config_status'))
							<div class="error" style="color:red;">{{ $errors->first('fees_head_config_status') }}</div>
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