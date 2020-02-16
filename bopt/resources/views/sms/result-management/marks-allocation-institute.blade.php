@extends('sms.result-management.layouts.master')

@section('title')
Result Management-Marks Allocation
@endsection

@section('sidebar')
	@include('sms.result-management.partials.sidebar')
@endsection

@section('header')
	@include('sms.result-management.partials.header')
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
						<div class="card-header"><strong class="card-title">Add Marks Allocation</strong></div>
						<div class="card-body card-block">
						  <form action="{{ url('sms/result-management/institute-config-marks') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<?php if(old('institute_code')==''){ $institute=$institute_code; }else{ $institute=old('institute_code');} ?>
								<input type="hidden" name="institute_code" id="institute_code" value="{{ $institute }}" >
							  <div class="row form-group lv-due-body">
								
								<div class="col-md-3">
									<label>Select School</label>
									<select class="form-control" name="faculty_id" onchange="getCourse(this.value);">
									<option value="" selected disabled>Select</option>
									@foreach($faculty_rs as $faculty)
										<option value="{{ $faculty->faculty_id }}" >{{ $faculty->faculty_name }}</option>
									@endforeach
								  </select>
								</div>
								<div class="col-md-3">
								  <label for="text-input" class=" form-control-label">Course Name</label>
								 <select class="form-control" name="course_code" id="course_code" >
										<option value="" selected disabled >Select</option>
									</select>	
								</div>
								<div class="col-md-3">
								<label>Semester</label>
									<select class="form-control" name="semester_code" >
										<option value="" selected disabled >Select</option>
										@foreach($semester_rs as $semester)
											<option value="{{ $semester->semester_code }}">{{ $semester->semester_name }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-3 btn-up">
									<button type="submit" class="btn btn-danger btn-sm">Go</button>
								</div>
								</div>
								
							  </div>
							  
							
						  </form>
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
	@include('sms.room-management.partials.scripts')
	<script>
	
		function getInstituteName()
		{
			var institute_name=$("#institute_code :selected").text();
			//alert(institute_name);
			$("#institute_name").val(institute_name);
		}
		
	</script>
	
	<script>
		
		function getCourse(faculty_id)
		{
			var institute_code=$("#institute_code").val();
			//alert("institute_code"+institute_code);
			//alert("faculty_id"+faculty_id);
			$.ajax({
				type:'GET',
				url:'{{url('sms/admission/get-course')}}/'+institute_code+'/'+faculty_id,				
				success: function(response){
					console.log(response); 
				
					$("#course_code").html(response);
				
				}
				
			});
		}
		
	</script>
	
@endsection